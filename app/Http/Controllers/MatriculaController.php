<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Models\Grado;
use App\Models\Matricula;
use DB;

class MatriculaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    CONST PAGINATION = 4;

    public function index(Request $request)
    {
        $grados = Grado::all(); // Obtener todos los grados para el combobox
        $query = Alumno::query();
    
        if ($request->filled('buscarpor')) {
            $gradoNivel = $request->input('buscarpor');
            $query->whereHas('matriculas', function($q) use ($gradoNivel) {
                $q->where('nivel', $gradoNivel);
            });
        }
    
        $alumnos = $query->where('estado', '1')
                        ->orderBy('grado.grado', 'asc') // Ordenar por número de grado
                        ->paginate($this::PAGINATION);
    
        return view('mantenedores.matriculas.index', compact('alumnos', 'grados'));

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
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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
