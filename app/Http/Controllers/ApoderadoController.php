<?php

namespace App\Http\Controllers;

use App\Models\Apoderado;
use Illuminate\Http\Request;
use App\Models\Escala;
use App\Models\Alumno;
use App\Models\Matricula;
use App\Models\Periodo;
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
        $estudiantes = $apoderado->estudiantes;

        //Retornar la vista con los datos del apoderado y los estudiantes (hijos)
        return view('mantenedores.apoderados.index',compact('apoderado','estudiantes'));
    }

    public function hijoNotas($codigoEstudiante)
    {
        return view('mantenedores.apoderados.hijoNota',compact('codigoEstudiante'));
    }

    public function hijoMatriculaRenovacion($codigoEstudiante)
    {
        $estudiante = Alumno::with(['escala','matricula'=>function($query){
            $query->whereHas('periodo',function($query){
                $query->where('estado',1);
            });
        }, 'matricula.seccion.grado.nivel','matricula.periodo','matricula.alumno.apoderados'])
        ->where('codigoEstudiante',$codigoEstudiante)
        ->firstOrFail();

        $matricula = $estudiante->matricula->first();
        
        return view('mantenedores.apoderados.hijoMatricula',compact('codigoEstudiante','estudiante','matricula'));
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
}
