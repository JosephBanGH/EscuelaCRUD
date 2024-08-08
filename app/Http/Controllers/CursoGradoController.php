<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grado;


class CursoGradoController extends Controller
{
    public function index()
    {
        // Obtener todos los grados y sus cursos asociados
        $nivelesEducativos = Grado::with(['cursos' => function ($query) {
            $query->where('estado', 1);
        }])->where('estado', 1)->get()->groupBy('nivel');

        return view('curso_grado.index', compact('nivelesEducativos'));
    }
}
