<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grado;
use App\Models\Cursos;
use App\Http\Controllers\CursoGradoController;
use DB;

class RegistroNotasController extends Controller
{
    public function create()
    {
        // Obtener los niveles, grados y cursos activos
        $grados = Grado::where('estado', 1)->get();
        $cursos = Cursos::where('estado', 1)->get();

        return view('listadonotas', compact('grados', 'cursos'));
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'id_nivel' => 'required|exists:niveles,id_nivel',
            'id_grado' => 'required|exists:grados,id_grado',
            'id_curso' => 'required|exists:cursos,id_curso',
            'año_escolar' => 'required|string',
            'resumen_bimestre' => 'required|string',
            'imprimir_en' => 'required|string',
        ]);

        // Aquí puedes manejar el almacenamiento de los datos según tus necesidades

        return redirect()->route('listadonotas.create')->with('success', 'Notas registradas exitosamente.');
    }
}