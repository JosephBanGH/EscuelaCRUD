<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periodo;

class PeriodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $periodoActivo = Periodo::where('estado',1)->first();
        return view('mantenedores.periodo.index',compact('periodoActivo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mantenedores.periodo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validamos el request

        $validateData =  $request->validate([
            'inicioPeriodo' => 'required|date',
            'finPeriodo' => 'required|date|after:inicioPeriodo'
        ]);



        //Desactivamos el periodo activo
        $periodoActivo = Periodo::where('estado',1)->first();

        $periodoActivo->update([
            'estado'=>0
        ]);

        //Creamos el nuevo periodo
        Periodo::create([
            'inicioPeriodo'=> $request->get('inicioPeriodo'),
            'finPeriodo'=>$request->get('finPeriodo'),
            'estado'=>1
        ]);

        return redirect()->route('myPeriodo.index');
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
