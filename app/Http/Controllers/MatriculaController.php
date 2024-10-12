<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Models\Grado;
use App\Models\Periodo;
use App\Models\Nivel;
use App\Models\Matricula;
use DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;


class MatriculaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    CONST PAGINATION = 4;

    public function index(Request $request)
    {
        
        $query = Matricula::whereHas('periodo',function ($query){
            $query->where('estado',1);
        })->with(['alumno','seccion.grado.nivel']);//cargar las relaciones necesarias
    
        if ($request->filled('buscarpor')) {
            $search = $request->input('buscarpor');
            
            $query->where('grado', 'like', "%{$search}%");
        }
        $matricula=$query->paginate($this::PAGINATION);
        
        return view('mantenedores.matriculas.index', compact('matricula'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $nivel = Nivel::all();
        $añoEscolar =Periodo::where('estado','=','1')->first(); 
        $alumnoDni = null;
        $alumnoApe = null;

        if ($request->filled('buscarPorDni')) {
            $search = $request->input('buscarPorDni');
            $alumnoDni = Alumno::where('dni', 'like', "%{$search}%")->first();
        }

        if($request->filled('buscarApellidos')){
            $search = $request->input('buscarApellidos');

            $alumnoApe= Alumno::where(function($query) use ($search){
                $query->where(DB::raw("LOWER(CONCAT(apellido_paterno,' ',apellido_materno,' ',primer_nombre,' ',otros_nombre))"),'like',"% {strtolower($search)} %")
                ->orWhere(DB::raw("CONCAT(apellido_paterno,' ',apellido_materno,' ',primer_nombre)"),'like',"% {strtolower($search)} %");
            })->get();
        }
        //$grado = Grado::all();
        //dd($añoEscolar);
        return view('mantenedores.matriculas.create',compact('alumnoApe','alumnoDni','nivel','añoEscolar'));
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=request()->validate([
            'fecha'=>'required|date',
            'codigoEstudiante'=>'required',
            'apellidoPaterno'=>'required',
            'apellidoMaterno'=>'required',
            'primerNombre'=>'required',
            'grado'=>'required',
            'seccion'=>'required'
        ],
        [   
            'codigoEstudiante.required'=>'Ingrese codigo',
            'apellidoPaterno.required'=>'Ingrese apellido Paterno',
            'apellidoMaterno.required'=>'Ingrese apellido Materno',
            'primerNombre.required'=>'Ingreso Primer nombre',
            'fecha.required' => 'Ingrese una fecha correcta',
            'grado.required'=>'Ingrese Grado',
            'seccion.required'=>'Ingreso Seccion'
        ]);

        $seccion = DB::table('SECCION')
        ->join('GRADO', 'SECCION.idGrado', '=', 'GRADO.idGrado')
        ->join('NIVEL', 'GRADO.idNivel', '=', 'NIVEL.idNivel')
        ->where('NIVEL.idNivel', $request->nivel)
        ->where('GRADO.grado', $request->grado)
        ->where('SECCION.seccion', $request->seccion)
        ->select('SECCION.idSeccion')
        ->first();

        if (!$seccion) {
            return back()->withErrors(['combinacion' => 'La combinación de Nivel, Grado y Sección no es válida.'])
                ->withInput();
        }


        $matricula = new Matricula();
        $matricula->fechaMatricula = $request->fecha;
        $matricula->codigoEstudiante = $request->codigoEstudiante;
        $matricula->idSeccion = $seccion->idSeccion;
        $matricula->idPeriodo = Periodo::where('estado','=','1')->first()->idPeriodo;
        $matricula->estado = '1';
        $matricula->save();
        return redirect()->route('matricula.index')->with('datos','Matricula Guardada..!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $matricula = Matricula::with(['alumno.escala', 'seccion.grado.nivel'])->findOrFail($id);
        $niveles = Nivel::all();
        return view('mantenedores.matriculas.edit',compact('matricula', 'niveles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function generarPDF(){
//        $buscarpor=$request->get('buscarpor');
        $matricula=Matricula::where('estado','=','1')->get();
        $pdf = PDF::loadView('mantenedores.matriculas.pdf',compact('matricula'));
        return $pdf->stream('reporte_matricula.pdf');
    }

}
