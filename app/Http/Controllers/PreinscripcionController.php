<?php

namespace App\Http\Controllers;

use App\Models\Preinscripcion;
use Illuminate\Http\Request;
use App\Models\Interesado;
use App\Models\Entrevista;
use App\Models\ExpediteAdmision;
use Illuminate\Support\Facades\Storage;

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
        $entrevista = Entrevista::where('idInteresado', 'like',$idInteresado)->first();
        return view('preinscripcion.entrevista',compact('interesado','entrevista'))->with('idPreinscripcion',$idPreinscripcion);
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
        $expediente = ExpediteAdmision::where('idInteresado', 'like',$idInteresado)->first();
        if ($expediente == null) {
            $expediente = new ExpediteAdmision();
            $expediente->idInteresado = $idInteresado;
            $expediente->save();
        }
        foreach(Storage::disk('public')->files('expedientes/'.$idInteresado) as $file){
            $filename = basename($file);
            
            $dowloadLink = route()
        }
        return view('preinscripcion.expedienteAdmision',compact('interesado','idPreinscripcion','expediente'));
    }

    public function storeExpediente(Request $request, $idInteresado,$expediente){
        if($request->isMethod('POST')){
            $expediente->urlCompromiso = $request->urlCompromiso;
            $expediente->urlCartaReferencia = $request->urlCartaReferencia;
            $expediente->urlDniApoderado = $request->urlDniApoderado;
            $expediente->urlDniInteresado = $request->urlDniInteresado;
            $expediente->urlComprobanteDerechoInscripcion = $request->urlComprobanteDerechoInscripcion;
            $expediente->urlConstanciaNoAdeudo = $request->urlConstanciaNoAdeudo;
            $expediente->urlLibretaNota = $request->urlLibretaNota;
            $expediente->urlConstanciaMatriculaAnterior = $request->urlConstanciaMatriculaAnterior;
            $expediente->idEstadoExpediente = $expediente->idEstadoExpediente;
            $expediente->save();

            $fileCompromiso = $request->file('urlCompromiso');
            $fileCartaReferencia = $request->file('urlCartaReferencia');
            $fileDniApoderado = $request->file('urlDniApoderado');
            $fileDniInteresado = $request->file('urlDniInteresado');
            $fileComprobanteDerechoInscripcion = $request->file('urlComprobanteDerechoInscripcion');
            $fileConstanciaNoAdeudo = $request->file('urlConstanciaNoAdeudo');
            $fileLibretaNota = $request->file('urlLibretaNota');
            $fileConstanciaMatriculaAnterior = $request->file('urlConstanciaMatriculaAnterior');
            $fileEstadoExpediente = $request->file('idEstadoExpediente');

            $fileCompromiso->storeAs('public/expedientes/'.$idInteresado, $fileCompromiso->getClientOriginalName(),'public');
        }
        return $this->expedienteAdmision($idInteresado);
    }
}
