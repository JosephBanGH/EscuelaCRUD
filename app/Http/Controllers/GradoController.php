<?php

namespace App\Http\Controllers;

use App\Models\Grado;
use Illuminate\Http\Request;

class GradoController extends Controller
{
    const PAGINATION = 4;

    public function index(Request $request)
    {
        // Inicializamos la consulta base
        $query = Grado::query();
        
        // Agregamos filtros basados en el parámetro de búsqueda
        if ($request->filled('buscarpor')) {
            $search = $request->input('buscarpor');
            $query->where('grado', 'like', "%{$search}%");
        }
        
        // Paginar los resultados
        $grado = $query->paginate($this::PAGINATION);
        
        // Devolver la vista con los datos filtrados
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
            'grado' => 'required|integer|max:11', // Cambiado de nombre_grado a grado
        ]);
    
        // Crear una nueva instancia del modelo Grado
        $grado = new Grado;
        $grado->nivel = $request->nivel; // Cambiado de nivel_grado a nivel
        $grado->seccion = $request->seccion;
        $grado->grado = $request->grado; // Cambiado de nombre_grado a grado
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
        $grado->save();

        return redirect()->route('grado.index')->with('datos', 'Registro actualizado exitosamente!');
    }

    public function destroy($id_grado)
    {
        $grado = Grado::findOrFail($id_grado);
        $grado->delete();

        return redirect()->route('grado.index')->with('datos', 'Registro eliminado exitosamente!');
    }

    public function confirmar($id_grado)
    {
        $grado = Grado::findOrFail($id_grado);
        return view('grados.confirmar', compact('grado'));
    }
}
