<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Capacidad;

class CapacidadController extends Controller
{
    const PAGINATION = 5; // PARA QUE PAGINEE DE 10 EN 10
    public function index(Request $request){
        $buscarpor=$request->get('buscarpor');
        //$categoria=Categoria::where('estado','=','1')->get();
        $Capacidad=Capacidad::where('estado','=','1')->where('descripcion','like','%'.$buscarpor.'%')->paginate($this::PAGINATION);
        return view('mantenedor.Capacidad.index',compact('Capacidad','buscarpor'));
    }
    public function create(){
        return view('mantenedor.Capacidad.create'); 
    }
    public function store(Request $request)
    {
        $data=request()->validate([
            'descripcion'=>'required|max:30'
        ],
        [
            'descripcion.required'=>'Ingrese descripción de unidad',
            'descripcion.max'=>'Maximo 30 caracteres para la descripción'
        ]);
        $Capacidad=new Capacidad();
        $Capacidad->descripcion=$request->descripcion;
        $Capacidad->estado='1';
        $Capacidad->save();
        return redirect()->route('Capacidad.index')->with('datos','Registro Nuevo Guardado...!');
    }
    public function edit($id)
    {
        $Capacidad=Capacidad::findOrFail($id);
        return view('mantenedor.Capacidad.edit',compact('Capacidad'));
    }
    public function update(Request $request, $id)
    {
        $data=request()->validate([
        'descripcion'=>'required|max:30'
        ],
        [
        'descripcion.required'=>'Ingrese descripción de unidad',
        'descripcion.max'=>'Maximo 30 caracteres para la descripción'
        ]);
        $Capacidad=Capacidad::findOrFail($id);
        $Capacidad->descripcion=$request->descripcion;
        $Capacidad->save();
        return redirect()->route('Capacidad.index')->with('datos','Registro Actualizado...!');
    }
    public function confirmar($id)
    {
        $Capacidad=Capacidad::findOrFail($id);
        return view('mantenedor.Capacidad.confirmar',compact('Capacidad'));
    }
    public function destroy($id)
    {
        $Capacidad=Capacidad::findOrFail($id);
        $Capacidad->estado='0';
        $Capacidad->save();
        return redirect()->route('Capacidad.index')->with('datos','Registro Eliminado...!');
    }
}
