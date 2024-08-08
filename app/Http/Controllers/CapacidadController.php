<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Capacidad;

class CapacidadController extends Controller
{
    const PAGINATION = 4; 

    public function index(Request $request)
    {
        $query = Capacidad::where('estado', 1); // Solo mostrar capacidad activos
    
        if ($request->filled('buscarpor')) {
            $search = $request->input('buscarpor');
            $query->where('descripcion', 'like', "%{$search}%");
        }
    
        $capacidades = $query->paginate($this::PAGINATION);
    
        return view('capacidad.index', compact('capacidades'));
    }
    
    public function create()
    {
        return view('capacidad.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'descripcion' => 'required|max:255',
        ]);

        capacidad::create([
            'descripcion' => $request->descripcion,
            'estado' => 1, // Establecer estado como activo por defecto
        ]);

        return redirect()->route('capacidad.index')->with('datos', 'capacidad Guardado...!');
    }

    public function edit($id)
    {
        $capacidad = capacidad::findOrFail($id);
        return view('capacidad.edit', compact('capacidad'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'descripcion' => 'required|max:255',
        ]);

        $capacidad = capacidad::findOrFail($id);
        $capacidad->update([
            'descripcion' => $request->descripcion,
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