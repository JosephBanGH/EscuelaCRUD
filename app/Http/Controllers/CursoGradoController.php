<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grado;
use App\Models\Curso;

class CursoGradoController extends Controller
{
    public function index()
    {
        $nivelesEducativos = Grado::with('cursos')->get()->groupBy('nivel');
        return view('curso_grado.index', compact('nivelesEducativos'));
    }
}

