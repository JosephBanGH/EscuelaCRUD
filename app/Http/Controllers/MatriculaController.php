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
    public function create()
    {
        $nivel = Nivel::all();
        $añoEscolar =Periodo::where('estado','=','1')->first(); 
        $alumno = Alumno::where('estado','=','1')->get();
        //$grado = Grado::all();
        //dd($añoEscolar);
        return view('mantenedores.matriculas.create',compact('alumno','nivel','añoEscolar'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=request()->validate([
            'fecha'=>'required'
        ],
        [
            'fecha.required' => 'Ingrese una fecha correcta'
        ]);
        $matricula = new Matricula();
        $matricula->fecha = $request->fecha;
        $matricula->codigo_estudiante = $request->codigo_estudiante;
        $matricula->id_grado = $request->id_grado;
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
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
