<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Grado;
use App\Models\Docente;

class DocenteController extends Controller
{
    const PAGINATION = 4; // PARA QUE PAGINEE DE 10 EN 10
    public function index(Request $request){
        $buscarpor=$request->get('buscarpor');
        $Docente=Docente::where('estado','=','1')->where('nombre','like','%'.$buscarpor.'%')->paginate($this::PAGINATION);
        return view('mantenedor.Docente.index',compact('Docente','buscarpor'));
    }
    public function create(){
        $Curso = Curso::Where('estado','=','1')->get();
        $Grado = Grado::Where('estado','=','1')->get();
        return view('mantenedor.Docente.create',compact('Curso','Grado')); 
    }
    public function store(Request $request)
    {
        $data=request()->validate([
            'nombre'=>'required|max:30',
            'nivel'=>'required|min:0',
            'codigo'=>'required|min:0',
        ],
        [
            'nombre.required'=>'Ingrese descripción de Curso',
            'nombre.max'=>'Maximo 30 caracteres para la descripción',
            'nivel.required'=>'Ingrese nivel de Docente',
            'nivel.min'=>'nivel no puede ser negativo',
            'codigo.required'=>'Ingrese codigo de Docente',
            'codigo.min'=>'codigo no puede ser negativo',
        ]);
        $Docente=new Docente;
        $Docente->nombre=$request->nombre;
        $Docente->idCurso=$request->idCurso;
        $Docente->idunidad=$request->idunidad;
        $Docente->nivel=$request->nivel;
        $Docente->codigo=$request->codigo;
        $Docente->estado='1';
        $Docente->save();
        return redirect()->route('Docente.index')->with('datos','Registro Nuevo Guardado...!');
    }
    public function edit($id)
    {
        $Docente=Docente::findOrFail($id);
        $Curso = Curso::Where('estado','=','1')->get();
        $Grado = Grado::Where('estado','=','1')->get();
        return view('mantenedor.Docente.edit',compact('Docente','Curso','Grado'));
    }
    public function update(Request $request, $idDocente)
    {
        $data=request()->validate([
        'nombre'=>'required|max:30'
        ],
        [
        'nombre.required'=>'Ingrese descripción de Curso',
        'nombre.max'=>'Maximo 30 caracteres para la descripción'
        ]);
        $Docente=Docente::findOrFail($idDocente);
        $Docente->nombre=$request->nombre;
        $Docente->idCurso=$request->idCurso;
        $Docente->idunidad=$request->idunidad;
        $Docente->nivel=$request->nivel;
        $Docente->codigo=$request->codigo;
        $Docente->save();
        return redirect()->route('Docente.index')->with('datos','Registro Actualizado...!');
    }
    public function confirmar($id)
    {
        $Docente=Docente::findOrFail($id);
        return view('mantenedor.Docente.confirmar',compact('Docente'));
    }
    public function destroy($id)
    {
        $Docente=Docente::findOrFail($id);
        $Docente->estado='0';
        $Docente->save();
        return redirect()->route('Docente.index')->with('datos','Registro Eliminado...!');
    }
    public function encontrarDocente($id)
    {
        $Docente = Docente::with('unidad')->find($id);
        if (!$Docente) {
            return response()->json(['error' => 'Docente no encontrado'], 404);
        }
        return response()->json($Docente);
    }
}

