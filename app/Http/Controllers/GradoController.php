<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grado;

class GradoController extends Controller
{
    const PAGINATION = 4;

    public function index(Request $request)
    {
        $query = Grado::query();

        if ($request->filled('buscarpor')) {
            $search = $request->input('buscarpor');
            $query->where('nivel', 'like', "%{$search}%")
                  ->orWhere('grado', 'like', "%{$search}%");
        }

        $grados = $query->paginate($this::PAGINATION);

        return view('grado.index', compact('grados'));
    }

    public function create()
    {
        return view('grado.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nivel' => 'required|max:255',
            'grado' => 'required|max:255',
            'id_seccion' => 'required|exists:seccion,id_seccion',
        ]);

        Grado::create($validatedData);

        return redirect()->route('grados.index')->with('datos', 'Grado Guardado...!');
    }

    public function edit($id)
    {
        $grado = Grado::findOrFail($id);
        return view('grados.edit', compact('grado'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nivel' => 'required|max:255',
            'grado' => 'required|max:255',
            'id_seccion' => 'required|exists:seccion,id_seccion',
        ]);

        $grado = Grado::findOrFail($id);
        $grado->update($validatedData);

        return redirect()->route('grados.index')->with('datos', 'Grado Actualizado...!');
    }

    public function destroy($id)
    {
        $grado = Grado::findOrFail($id);
        $grado->delete();
        return redirect()->route('grados.index')->with('datos', 'Grado Eliminado...!');
    }
}
