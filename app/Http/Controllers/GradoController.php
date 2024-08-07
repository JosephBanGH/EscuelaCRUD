<?php

namespace App\Http\Controllers;

use App\Models\Grado;
use Illuminate\Http\Request;

class GradoController extends Controller
{
    const PAGINATION = 4;

    public function index(Request $request)
    {
        $query = Grado::where('estado', 1); // Solo mostrar grados activos
        
        // Agregar filtros de búsqueda
        if ($request->filled('buscarpor')) {
            $search = $request->input('buscarpor');
            $query->where('grado', 'like', "%{$search}%");
        }
        
        // Paginación
        $grados = $query->paginate($this::PAGINATION);
        
        return view('grados.index', compact('grados'));
    }

    public function create()
    {
        return view('grados.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nivel' => 'required|in:Inicial,Primaria,Secundaria',
            'seccion' => 'required|in:A,B,C,D,E',
            'grado' => 'required|integer|max:11',
        ]);
    
        // Crear una nueva instancia del modelo Grado
        $grado = new Grado;
        $grado->nivel = $request->nivel;
        $grado->seccion = $request->seccion;
        $grado->grado = $request->grado;
        $grado->estado = 1; // Establecer estado como activo por defecto
        $grado->save();
    
        return redirect()->route('grado.index')->with('datos', 'Registro creado exitosamente!');
    }
    
    public function edit($id_grado)
    {
        $grado = Grado::findOrFail($id_grado);
        return view('grados.edit', compact('grado'));
    }

    public function update(Request $request, $id_grado)
    {
        $validatedData = $request->validate([
            'nivel' => 'required|in:Inicial,Primaria,Secundaria',
            'seccion' => 'required|in:A,B,C,D,E',
            'grado' => 'required|max:255'
        ]);
    
        $grado = Grado::findOrFail($id_grado);
        $grado->nivel = $request->nivel;
        $grado->seccion = $request->seccion;
        $grado->grado = $request->grado;
        $grado->estado = $request->estado; // Asegúrate de que el estado se pase en el formulario
        $grado->save();
    
        return redirect()->route('grado.index')->with('datos', 'Registro actualizado exitosamente!');
    }
    
    public function destroy($id_grado)
    {
        $grado = Grado::findOrFail($id_grado);
        $grado->estado = 0; // Cambia el estado a inactivo en lugar de eliminarlo
        $grado->save();

        return redirect()->route('grado.index')->with('datos', 'Registro eliminado exitosamente!');
    }

    public function confirmar($id_grado)
    {
        $grado = Grado::findOrFail($id_grado);
        return view('grados.confirmar', compact('grado'));
    }
}
