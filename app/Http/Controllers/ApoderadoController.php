<?php

namespace App\Http\Controllers;

use App\Models\Apoderado;
use App\Models\Preinscripcion;
use Illuminate\Http\Request;
use App\Models\Escala;
use App\Models\Alumno;
use App\Models\Matricula;
use App\Models\Periodo;
use App\Models\Pago;
use App\Models\Seccion;

class ApoderadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($dniApoderado)
    {
        //Obtener el apoderado por su dniApoderado
        $apoderado = Apoderado::with('estudiantes')->where('dniApoderado',$dniApoderado)->firstOrFail();

        //Tieniendo al apoderado accedemos al estudiante
        //$estudiantes = $apoderado->estudiantes;

        //Retornar la vista con los datos del apoderado y los estudiantes (hijos)
        return view('mantenedores.apoderados.index',compact('apoderado'));
    }

    public function hijoNotas($codigoEstudiante)
    {
        $hijo = Alumno::with(['matricula.seccion.grado.nivel','matricula'=>function($query){
            $query->whereHas('periodo',function($query){
                $query->orderByRaw('finPeriodo DESC');
            });
        }])->where('codigoEstudiante',$codigoEstudiante)->firstOrFail();

        $apoderado = Alumno::with(['apoderadoEstudiantes'])->where('codigoEstudiante',$codigoEstudiante)->firstOrFail();
        $dniApoderado = $apoderado->apoderadoEstudiantes->first()->dniApoderado;
        
        //dd($hijo->matricula->first()->periodo->inicioPeriodo);
        return view('mantenedores.apoderados.hijoNota',compact('codigoEstudiante','hijo'))->with('dniApoderado',$dniApoderado);
    }

    public function hijoMatriculaRenovacion($codigoEstudiante)
    {
        /*$estudiante = Alumno::with(['escala','matricula'=>function($query){
            $query->whereHas('periodo',function($query){
                $query->where('estado',1);
            });
        }, 'matricula.seccion.grado.nivel','matricula.periodo','matricula.alumno.apoderados'])
        ->where('codigoEstudiante',$codigoEstudiante)
        ->firstOrFail();*/

        $estudiante = Alumno::with(['escala','matricula'=>function($query){
            $query->whereHas('periodo',function($query){
                $query->orderByRaw('finPeriodo DESC');
            });
        }, 'matricula.seccion.grado.nivel','matricula.periodo','matricula.alumno.apoderados'])
        ->where('codigoEstudiante',$codigoEstudiante)
        ->firstOrFail();

        $apoderado = Alumno::with(['apoderadoEstudiantes'])->where('codigoEstudiante',$codigoEstudiante)->firstOrFail();
        $dniApoderado = $apoderado->apoderadoEstudiantes->first()->dniApoderado;

        $matricula = $estudiante->matricula->first();

        //Revisamos que se haya iniciado un nuevo periodo
        $periodoActivo = Periodo::where('estado',1)
                        ->firstOrFail();
        
        $renovar = false;
        
        if($periodoActivo->idPeriodo != $matricula->periodo->idPeriodo){
            
            //Revisamos que no tenga deudas
            $deudas = Pago::where('numMatricula',$matricula->numMatricula)
                            ->orderByRaw('periodoPago DESC')
                            ->get();
            
            if($deudas->isNotEmpty() && $deudas->first()->periodoPago==10){
                $renovar=true;
            }
            
        }
        
        return view('mantenedores.apoderados.hijoMatricula',compact('codigoEstudiante','estudiante','matricula','renovar'))->with('dniApoderado',$dniApoderado);;
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
    public function show(Apoderado $apoderado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Apoderado $apoderado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Apoderado $apoderado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Apoderado $apoderado)
    {
        //
    }


    public function storeApoderadoPreinscripcion(Request $request){
        $request -> validate([
            'nombreApoderado' => 'required|string|max:255',
            'apellidoApoderado' => 'required|string|max:255',
            'dni' => 'required|numeric|digits:8',
            'celular' => 'required',
            'correo' => 'required|email'
        ]);

        $apoderado = Preinscripcion::create([
            'nombreApoderado' => $request->nombreApoderado,
            'apellidoApoderado' => $request->apellidoApoderado,
            'dni' => $request->dni,
            'fechaPreInscripcion' => now(),
            'numTelefono' => $request->celular,
            'correo' => $request->correo,
            'estado' => 1
        ]);

        $idApoderado = $apoderado->idPreinscripcion;
        //dd($idApoderado);
        return redirect()->route('addPreinscripciones')
                        ->with('success', 'Apoderado Registrado con éxito')
                        ->with('idApoderado', $idApoderado);
    }
}
