<?php

namespace App\Http\Controllers;

use App\Models\Preinscripcion;
use Illuminate\Http\Request;
use App\Models\Interesado;

class PreinscripcionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($idPreinscripcion)
    {
        $preinscripcion = Preinscripcion::with('interesado')->where('idPreinscripcion', 'like',$idPreinscripcion)->first();
        
        return view('preinscripcion.index',compact('preinscripcion'));
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

    public function entrevista($idInteresado)
    {
        $interesado = Interesado::with('preinscripcion')->where('idInteresado', 'like',$idInteresado)->first();
        $idPreinscripcion = $interesado->preinscripcion->idPreinscripcion;
        return view('preinscripcion.entrevista',compact('interesado'))->with('idPreinscripcion',$idPreinscripcion);
    }

    public function observacion($idInteresado)
    {
        $interesado = Interesado::with('preinscripcion')->where('idInteresado', 'like',$idInteresado)->first();
        $idPreinscripcion = $interesado->preinscripcion->idPreinscripcion;
        return view('preinscripcion.observaciones',compact('interesado'))->with('idPreinscripcion',$idPreinscripcion);;
    }

    public function expedienteAdmision($idInteresado)
    {
        $interesado = Interesado::with('preinscripcion')->where('idInteresado', 'like',$idInteresado)->first();
        $idPreinscripcion = $interesado->preinscripcion->idPreinscripcion;
        return view('preinscripcion.expedienteAdmision',compact('interesado'))->with('idPreinscripcion',$idPreinscripcion);;
    }

    public function subirExpedienteAdmision($idInteresado){
        
    }
}
