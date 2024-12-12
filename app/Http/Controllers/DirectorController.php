<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Interesado;
use App\Models\Entrevista;
use Psy\Readline\Hoa\Console;

class DirectorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('director.index');
    }

    public function programar($idPreinscripcion)
    {
        $interesado = Interesado::where('idPreinscripcion', 'like',$idPreinscripcion)->first();
        return view('director.programar',compact('interesado'))->with('interesado',$interesado);
    }
    public function updateEntrevista(Request $request)
    {
        // //imprimir en consola
        // $request->validate([
        //     'lugarEntrevista' => 'required|string|max:255',
        //     'fechaEntrevista' => 'required|date',
        //     'horaEntrevista' => 'required|date_format:H:i',
        // ]);

        $entrevista = new Entrevista();
        $entrevista->idInteresado = $request->idInteresado;
        
        $entrevista->lugarEntrevista = $request->lugarEntrevista;
        // Combine fecha and hora into a single datetime field
        $fechaHora = $request->fechaEntrevista . ' ' . $request->horaEntrevista;
        $entrevista->fechaEntrevista = date('Y-m-d H:i:s', strtotime($fechaHora));
        
        $entrevista->idComiteAdmision = 1;
        $entrevista->save();

        return redirect()->route('evaluarPreinscripciones');
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
}
