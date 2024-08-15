<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Capacidad;
use App\Models\Cursos;

class CapacidadController extends Controller
{
    const PAGINATION = 4; 

    public function index(Request $request)
    {
        $query = Capacidad::where('estado', 1); // Solo mostrar capacidad activos

        $capacidades = Capacidad::where('estado','=','1')->paginate($this::PAGINATION);

        return view('capacidad.index', compact('capacidades'));
    }
    
    public function create()
    {
        $curso = Cursos::where('estado','=','1')->get();
        return view('capacidad.create',compact('curso'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'descripcion' => 'required|max:255',
            'abreviatura' => 'required|max:4',
        ]);

        $exists = Capacidad::where('descripcion', $request->nombre_curso)
                    ->where('estado', 1)
                    ->exists();

        if ($exists) {
        return redirect()->route('capacidad.create')
                    ->withErrors(['duplicado' => 'Ya existe un curso activo con este nombre.'])
                    ->withInput();
        }
    
        capacidad::create([
            'descripcion' => $request->descripcion,
            'abreviatura' => $request->abreviatura,
            'id_curso' => $request->id_curso,
            'estado' => 1, // Establecer estado como activo por defecto
        ]);

        return redirect()->route('capacidad.index')->with('datos', 'capacidad Guardado...!');
    }

    public function edit($id)
    {
        $capacidad = Capacidad::findOrFail($id);
        $curso = Cursos::where('estado','=','1')->get();
        return view('capacidad.edit', compact('capacidad','curso'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'descripcion' => 'required|max:255',
            'abreviatura' => 'required|max:4'
        ]);

        $capacidad = Capacidad::findOrFail($id);
        $capacidad->update([
            'descripcion' => $request->descripcion,
            'abreviatura' => $request->abreviatura,
            'id_curso' => $request->id_curso,
            'estado' => 1, // Asegurarse de que el estado se mantenga en 1 (activo)
        ]);

        return redirect()->route('capacidad.index')->with('datos', 'capacidad Actualizado...!');
    }

    public function confirmar($id)
    {
        $capacidad = capacidad::findOrFail($id);
        return view('capacidad.confirmar', compact('capacidad'));
    }

    public function destroy($id)
    {
        $capacidad = capacidad::findOrFail($id);
        $capacidad->estado = 0; // Cambia el estado a inactivo en lugar de eliminarlo
        $capacidad->save();

        return redirect()->route('capacidad.index')->with('datos', 'capacidad Eliminada...!');
    }
}