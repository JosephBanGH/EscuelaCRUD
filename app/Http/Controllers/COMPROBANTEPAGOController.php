<?php

namespace App\Http\Controllers;

use App\Models\COMPROBANTE_PAGO;
use Illuminate\Http\Request;

class COMPROBANTEPAGOController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $request->validate([
            'numeroOperacion' => 'required',
            'conceptoPago' => 'required',
            'monto' => 'required|numeric',
            'fechaPago' => 'required|date',
            'archivo' => 'required|mimes:pdf,jpeg,png,jpg'
        ]);

        //Guardamos el archivo
        if($request->hasFile('archivo')){
            $archivo = $request->file('archivo');

            //Guardamos en public/comprobantes
            $rutaArchivo = $archivo->store('comprobantes','public');
        }else{
            return back()->withErrors(['archivo' => 'El archivo es obligatorio']);
        }
        

        //FORMA 1 para guardar datos
        /*$comprobantePago = new COMPROBANTE_PAGO;
        $comprobante->dniApoderado = $request->input('dniApoderado');
        $comprobante->codigoEstudiante = $request->input('codigoEstudiante');
        $comprobante->numOperacion = $request->input('numeroOperacion');
        $comprobante->concepto = $request->input('conceptoPago');
        $comprobante->monto = $request->input('monto');
        $comprobante->fechaPago = $request->input('fechaPago');
        $comprobante->urlCDP = $rutaArchivo; // Ruta donde se guardó el archivo

        $comprobante->save();*/


        //FORMA 2 para guardar datos
        COMPROBANTE_PAGO::create([
            'dniApoderado' => $request->input('dniApoderado'),
            'codigoEstudiante' => $request->input('codigoEstudiante'),
            'numOperacion' => $request->input('numeroOperacion'),
            'concepto' => $request->input('conceptoPago'),
            'monto' => $request->input('monto'),
            'fechaPago' => $request->input('fechaPago'),
            'urlCDP' => $rutaArchivo, // La ruta donde se guardó el archivo
            'verificado' => 0,
        ]);
        

        /*
        protected $fillable = [
            'dniApoderado',
            'codigoEstudiante',
            'concepto',
            'monto',
            'fechaPago',
            'numOperacion',
            'urlCDP'
        ];
        */


        return redirect()->back()->with('success', 'Comprobante de pago subido correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(COMPROBANTE_PAGO $cOMPROBANTE_PAGO)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(COMPROBANTE_PAGO $cOMPROBANTE_PAGO)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, COMPROBANTE_PAGO $cOMPROBANTE_PAGO)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(COMPROBANTE_PAGO $cOMPROBANTE_PAGO)
    {
        //
    }
}
