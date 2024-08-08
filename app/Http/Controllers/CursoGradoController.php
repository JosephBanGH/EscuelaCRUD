<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grado;
use App\Models\Cursos;

class CursoGradoController extends Controller
{
    public function index($gradoId)
    {
        $grado = Grado::with('cursos')->findOrFail($gradoId);
        $cursos = Cursos::all();
        $cursosAsignados = $grado->cursos->pluck('id_curso')->toArray();

        return view('curso_grado.index', compact('grado', 'cursos', 'cursosAsignados'));
    }

    public function update(Request $request, $gradoId)
    {
        $grado = Grado::findOrFail($gradoId);
        $grado->cursos()->sync($request->cursos);

        return redirect()->route('curso_grado.index', $gradoId)->with('datos', 'Cursos actualizados correctamente!');
    }
}
