<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CursoGrado; 

class CursoGradoController extends Controller
{
    public function index()
    {
        // Obtener todos los registros de curso_grado
        $cursoGrado = CursoGrado::with(['curso', 'grado']) // Asegúrate de definir estas relaciones en tu modelo CursoGrado
            ->get();

        return view('curso_grado.index', compact('cursoGrado'));
    }
}
