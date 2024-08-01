<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;

class AlumnoController extends Controller
{
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

    
}

