<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    const PAGINATION = 4; 
    public function index(Request $request){

        $producto=Producto::where('telefono','=','968088869')->paginate($this::PAGINATION);
        return view('producto.index',compact('producto'));
    }
    public function create(){

        return view('producto.create'); 
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'DNI' => 'required|max:8',
            'nombres' => 'required|max:255',
        ]);
        $producto=new Producto;
        $producto->DNI=$request->DNI;
        $producto->nombres=$request->nombres;
        $producto->apellidos=$request->apellidos;
        $producto->direccion=$request->direccion;
        $producto->estado_civil=$request->estado_civil;
        $producto->telefono=$request->telefono;
        $producto->seguro_social=$request->seguro_social;
        $producto->departamento=$request->departamento;
        $producto->fecha_registro=$request->fecha_registro;
        $producto->save();
        return redirect()->route('producto.index')->with('datos','Registro Nuevo Guardado...!');
    }
    public function edit($codigo_docente)
    {
        $producto=Producto::findOrFail($codigo_docente);
        return view('producto.edit',compact('producto'));
    }
    public function update(Request $request, $codigo_docente)
    {
        $validatedData = $request->validate([
            'DNI' => 'required|max:8',
            'nombres' => 'required|max:255',
        ]);
        $producto=Producto::findOrFail($codigo_docente);
        $producto->DNI=$request->DNI;
        $producto->nombres=$request->nombres;
        $producto->apellidos=$request->apellidos;
        $producto->direccion=$request->direccion;
        $producto->estado_civil=$request->estado_civil;
        $producto->telefono=$request->telefono;
        $producto->seguro_social=$request->seguro_social;
        $producto->departamento=$request->departamento;
        $producto->fecha_registro=$request->fecha_registro;
        $producto->save();
        return redirect()->route('producto.index')->with('datos','Registro Actualizado...!');
    }
    public function confirmar($id)
    {
        $producto=producto::findOrFail($id);
        return view('producto.confirmar',compact('producto'));
    }
    public function destroy($id)
    {
        $producto=producto::findOrFail($id);
        $producto->save();
        return redirect()->route('producto.index')->with('datos','Registro Eliminado...!');
    }
}
