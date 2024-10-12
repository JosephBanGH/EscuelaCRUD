<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Escala;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PAGINATION = 4;
    public function index(Request $request)
    {       
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
                    $query->where(DB::raw("CONCAT(primer_nombre, ' ', otros_nombre, ' ', apellido_paterno, ' ', apellido_materno)"), 'like', "%{$search}%")
                      ->orWhere(DB::raw("CONCAT(primer_nombre, ' ', apellido_paterno, ' ', apellido_materno)"), 'like', "%{$search}%"); // También permitir la búsqueda sin otros nombres
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
            //dd($alumno);
        }else{
            $alumno = collect();
        }
        return view('mantenedores.alumnos.index',compact('alumno'));
    }

    public function edit($codigoEstudiante)
    {
        $alumno = Alumno::findOrFail($codigoEstudiante);
        return view('mantenedores.alumnos.edit', compact('alumno'));
    }

    public function update(Request $request, $codigoEstudiante)
    {
        $validatedData = $request->validate([
            'primer_nombre' => 'required|max:255',
            'apellido_paterno' => 'required|max:255',
            'apellido_materno' => 'required|max:255',
            'otros_nombre' => 'nullable|max:255',
        ]);
        
        //dd($request->all());
        
        $alumno = Alumno::findOrFail($codigoEstudiante);
        $alumno->primer_nombre = $request->primer_nombre;
        $alumno->apellido_paterno = $request->apellido_paterno;
        $alumno->apellido_materno = $request->apellido_materno;
        $alumno->otros_nombre = $request->otros_nombre;
        $alumno->estado = $request->input('estado', 1);
        $alumno->save();

        return redirect()->route('alumno.index')->with('datos', 'Registro Actualizado...!');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $escala = Escala::all();
        $fromMatricula = $request->query('from') == 'matricula'; //Verificar si viene de matricula
        return view('mantenedores.alumnos.create',compact('escala','fromMatricula')); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'dni' => 'required|max:8',
            'primer_nombre' => 'required|max:255',
            'apellido_paterno' => 'required|max:255',
            'apellido_materno' => 'required|max:255',
            'otros_nombre' => 'nullable|max:255'
        ]);
    
        $alumno = new Alumno;
        $alumno->dni = $request->dni;
        $alumno->primer_nombre = $request->primer_nombre;
        $alumno->apellido_paterno = $request->apellido_paterno;
        $alumno->apellido_materno = $request->apellido_materno;
        $alumno->otros_nombre = $request->otros_nombre;
        $alumno->estado = 1; // Estado activo por defecto
        $alumno->idEscala =$request->idEscala;
        $alumno->save();

        if ($request->query('from') == 'matricula') {
            // Redirige de vuelta a matricula.create con el DNI del nuevo alumno
            return redirect()->route('matricula.create', ['buscarPorDni' => $alumno->dni])
                ->with('datos', 'Alumno creado y retornado a Matrícula');
        }
    
        return redirect()->route('alumno.index')->with('datos', 'Registro Nuevo Guardado...!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function confirmar($id)
    {
        $alumno = Alumno::findOrFail($id);
        return view('mantenedores.alumnos.confirmar', compact('alumno'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $alumno = Alumno::findOrFail($id);
        $alumno->estado = 0; // Cambia el estado a inactivo
        $alumno->save();
        return redirect()->route('alumno.index')->with('datos', 'Registro Eliminado...!');
    }
}
