<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periodo;
use App\Models\Notas;
use App\Services\MatriculaService;
use App\Models\COMPROBANTE_PAGO;
use Carbon\Carbon;

class TesoreriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $periodoActivo = Periodo::where('estado',1)->first();

        if (!$periodoActivo) {
            // Si no hay un período activo, regresamos un mensaje de error
            return back()->with('error', 'No hay un período escolar activo.');
        }

        $anioActivo = Carbon::parse($periodoActivo->inicioPeriodo)->year;

        //Traer las del periodo activo, y que aun no han
        //sido verificadas
        $comprobantes = COMPROBANTE_PAGO::where('verificado',0)
            ->whereYear('fechaPago',$anioActivo)
            ->paginate(30);

        return view('tesoreria.index',compact('comprobantes'));
    }


    public function verificarComprobante(Request $request, $idComprobante){
        $comprobante = COMPROBANTE_PAGO::findOrFail($idComprobante);
        
        $comprobante->update([
            'verificado'=>1
        ]);

        $matriculaService = new MatriculaService();
        $matriculaService->renovarMatricula($comprobante->codigoEstudiante,$idComprobante);
        
        return response()->json([
            'success' => true,
            'message' => 'Comprobante verificado',
        ]);


        //return redirect()->back()->with('success','Comprobante verificado');
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
