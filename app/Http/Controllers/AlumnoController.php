<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PAGINATION = 4;
    public function index(Request $request)
    {        
        $query = Alumno::query();
        
        // Agregamos filtros basados en el parámetro de búsqueda
        if ($request->filled('buscarpor')) {
            $search = $request->input('buscarpor');
            
            $query->where('apellido_paterno', 'like', "%{$search}%");
        }
        $alumno=$query->where('estado','=','1')->paginate($this::PAGINATION);
        return view('mantenedores.alumnos.index',compact('alumno'));
    }

    public function edit($codigo_alumno)
    {
        $alumno = Alumno::findOrFail($codigo_alumno);
        return view('mantenedores.alumnos.edit', compact('alumno'));
    }    

    public function update(Request $request, $codigo_docente)
    {
        $validatedData = $request->validate([
            'primer_nombre' => 'required|max:255',
            'apellido_paterno' => 'nullable|max:255',
            'apellido_materno' => 'nullable|max:255',
            'otros_nombres' => 'nullable|max:255',
        ]);
        
        $alumno = Alumno::findOrFail($codigo_docente);
        $alumno->primer_nombre = $request->primer_nombre;
        $alumno->apellido_paterno = $request->apellido_paterno;
        $alumno->apellido_materno = $request->apellido_materno;
        $alumno->otros_nombres = $request->otros_nombres;
        $alumno->save();

        return redirect()->route('mantenedores.alumnos.index')->with('datos', 'Registro Actualizado...!');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
