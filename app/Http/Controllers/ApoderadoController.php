<?php

namespace App\Http\Controllers;

use App\Models\Apoderado;
use Illuminate\Http\Request;

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
