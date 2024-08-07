<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cursos;

class CursoController extends Controller
{
    const PAGINATION = 4;

    public function index(Request $request)
    {
        $query = Cursos::query();

        if ($request->filled('buscarpor')) {
            $search = $request->input('buscarpor');
            $query->where('nombre_curso', 'like', "%{$search}%");
        }

        $cursos = $query->paginate($this::PAGINATION);

        return view('cursos.index', compact('cursos'));
    }

    public function create()
    {
        return view('cursos.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre_curso' => 'required|max:255',
        ]);

        Cursos::create($validatedData);

        return redirect()->route('cursos.index')->with('datos', 'Curso Guardado...!');
    }

    public function edit($id)
    {
        $curso = Cursos::findOrFail($id);
        return view('cursos.edit', compact('curso'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nombre_curso' => 'required|max:255',
        ]);

        $curso = Cursos::findOrFail($id);
        $curso->update($validatedData);

        return redirect()->route('cursos.index')->with('datos', 'Curso Actualizado...!');
    }

    public function destroy($id)
    {
        $curso = Cursos::findOrFail($id);
        $curso->delete();
        return redirect()->route('cursos.index')->with('datos', 'Curso Eliminado...!');
    }
}
