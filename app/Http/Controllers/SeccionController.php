<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seccion;

class SeccionController extends Controller
{
    const PAGINATION = 4;

    public function index(Request $request)
    {
        $query = Seccion::query();

        if ($request->filled('buscarpor')) {
            $search = $request->input('buscarpor');
            $query->where('descripcion', 'like', "%{$search}%");
        }

        $secciones = $query->paginate($this::PAGINATION);

        return view('secciones.index', compact('secciones'));
    }

    public function create()
    {
        return view('secciones.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'descripcion' => 'required|max:255',
        ]);

        Seccion::create($validatedData);

        return redirect()->route('secciones.index')->with('datos', 'Sección Guardada...!');
    }

    public function edit($id)
    {
        $seccion = Seccion::findOrFail($id);
        return view('secciones.edit', compact('seccion'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'descripcion' => 'required|max:255',
        ]);

        $seccion = Seccion::findOrFail($id);
        $seccion->update($validatedData);

        return redirect()->route('secciones.index')->with('datos', 'Sección Actualizada...!');
    }

    public function destroy($id)
    {
        $seccion = Seccion::findOrFail($id);
        $seccion->delete();
        return redirect()->route('secciones.index')->with('datos', 'Sección Eliminada...!');
    }
}
