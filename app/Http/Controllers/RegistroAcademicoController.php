<?php

namespace App\Http\Controllers;
use App\Models\Alumno;
use App\Models\Matricula;
use App\Models\Seccion;
use App\Models\Periodo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegistroAcademicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('registroAcademico.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function editarMatricula($numMatricula)
    {
        $matricula = Matricula::with(['seccion.grado.nivel','periodo','alumno'])
            ->where('numMatricula','=',$numMatricula)->firstOrFail();
        
        $secciones = Seccion::with(['grado.nivel'])->get();
        $periodo = Periodo::where('estado','=',1)->firstOrFail();

        
        return view('registroAcademico.editarMatricula',compact('matricula','secciones','periodo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateMatricula(Request $request, $numMatricula)
    {
        $matricula = Matricula::findOrFail($numMatricula);

        $request->validate([
            'periodo' => 'nullable|exists:PERIODO_ESCOLAR,idPeriodo',
            'seccion' => 'required|exists:SECCION,idSeccion'
        ]);

        
        if($request->has('periodo')){
            $matricula->idPeriodo = $request->input('periodo');
        }

        $matricula->idSeccion = $request->input('seccion');
        $matricula->fechaMatricula = now();
        $matricula->save();
         
        return redirect()->route('editarMatricula', $matricula->numMatricula)
        ->with('success', 'La matrícula ha sido actualizada correctamente.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    const PAGINATION = 4;
    //Editar Matricula
    public function buscaMatricula(Request $request){
        //No se muestran los datos hasta que yo busque algo primero
        //$request->hasAny(['nombreCompleto','dni','anioPeriodo'])
        if($request->filled('nombreCompleto')||($request->filled('anioPeriodo') && $request->filled('seccion') && $request->filled('grado') && $request->filled('nivel'))||$request->filled('dni')){
            //$query = Alumno::where('estado',1)->with(['matricula.seccion.grado.nivel', 'matricula.periodo']);
            $query = Alumno::with(['matricula.seccion.grado.nivel', 'matricula.periodo']);


            // Agregamos filtros basados en el parámetro de búsqueda
            if ($request->filled('nombreCompleto')) {
                $search = $request->input('nombreCompleto');
                
                //$query->where('apellido_paterno', 'like', "%{$search}%");
                $query->where(function($query) use ($search){
                    $query->where(DB::raw("CONCAT(apellido_paterno, ' ', apellido_materno,' ',primer_nombre, ' ', otros_nombre)"), 'like', "%{$search}%")
                      ->orWhere(DB::raw("CONCAT(apellido_paterno, ' ', apellido_materno,' ',primer_nombre)"), 'like', "%{$search}%"); // También permitir la búsqueda sin otros nombres
                });
            }

            if ($request->filled('dni')) {
                $search = $request->input('dni');
                
                $query->where('dni', 'like', "%{$search}%");
            }

            //Filtrar por año de un determinado periodo
            if($request->filled('anioPeriodo') && $request->filled('seccion') && $request->filled('grado') && $request->filled('nivel')){
                $anioPeriodo = $request->input('anioPeriodo');
                $nivel = $request->input('nivel');
                $grado = $request->input('grado');
                $seccion = $request->input('seccion');
                
                //Filtrar por las relaciones que tienen las tablas 
                $query->whereHas('matricula.periodo', function($query) use ($anioPeriodo){
                    if($anioPeriodo){
                        $query->whereYear('inicioPeriodo',$anioPeriodo);
                    }
                })->whereHas('matricula.seccion.grado',function($query) use ($grado,$nivel){
                    if ($grado) {
                        $query->where('grado', 'like', "%{$grado}%"); // Filtrar por grado
                    }
                    if ($nivel) {
                        $query->whereHas('nivel', function ($query) use ($nivel) {
                            $query->where('nivel', 'like', "%{$nivel}%"); // Filtrar por nivel
                        });
                    }
                })->whereHas('matricula.seccion', function ($query) use ($seccion) {
                    if ($seccion) {
                        $query->where('seccion', 'like', "%{$seccion}%"); // Filtrar por seccion
                    }
                });
            }

            $alumno=$query->paginate($this::PAGINATION);
            
        }else{
            $alumno = collect();
        }
        
        return view('registroAcademico.buscarMatricula',compact('alumno'));
    }

    
}
