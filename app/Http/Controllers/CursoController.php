<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cursos;

class CursoController extends Controller
{
    const PAGINATION = 4;

    public function index(Request $request)
    {
        $query = Cursos::where('estado', 1); // Solo mostrar cursos activos
    
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

        // Verificar si ya existe un curso activo con el mismo nombre
        $exists = Cursos::where('nombre_curso', $request->nombre_curso)
                        ->where('estado', 1)
                        ->exists();

        if ($exists) {
            return redirect()->route('curso.create')
                             ->withErrors(['duplicado' => 'Ya existe un curso activo con este nombre.'])
                             ->withInput();
        }

        // Crear un nuevo curso
        Cursos::create([
            'nombre_curso' => $request->nombre_curso,
            'estado' => 1, // Establecer estado como activo por defecto
        ]);

        return redirect()->route('curso.index')->with('datos', 'Curso Guardado...!');
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

        // Verificar si ya existe un curso activo con el mismo nombre
        $exists = Cursos::where('nombre_curso', $request->nombre_curso)
                        ->where('estado', 1)
                        ->where('id_curso', '!=', $id)
                        ->exists();

        if ($exists) {
            return redirect()->route('curso.edit', $id)
                             ->withErrors(['duplicado' => 'Ya existe un curso activo con este nombre.'])
                             ->withInput();
        }

        // Actualizar el curso
        $curso->update([
            'nombre_curso' => $request->nombre_curso,
            'estado' => 1, // Asegurarse de que el estado se mantenga en 1 (activo)
        ]);

        return redirect()->route('curso.index')->with('datos', 'Curso Actualizado...!');
    }

    public function confirmar($id)
    {
        $curso = Cursos::findOrFail($id);
        return view('cursos.confirmar', compact('curso'));
    }

    public function destroy($id)
    {
        $curso = Cursos::findOrFail($id);
        $curso->estado = 0; // Cambia el estado a inactivo en lugar de eliminarlo
        $curso->save();

        return redirect()->route('curso.index')->with('datos', 'Curso Eliminado...!');
    }
}
