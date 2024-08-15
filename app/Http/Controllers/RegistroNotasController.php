<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;

use App\Models\RegistroNotas;
use App\Models\Catedra;
use Illuminate\Http\Request;

class RegistroNotasController extends Controller
{
    public function index()
    {
        $registroNotas = RegistroNotas::with('catedra')->get();
        return view('registronotas.index', compact('registroNotas'));
    }

    public function create()
    {
        $catedras = Catedra::all();
        return view('registronotas.create', compact('catedras'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_curso' => 'required|exists:curso,id_curso',
            'id_grado' => 'required|exists:grado,id_grado',
            'codigo_docente' => 'required|exists:catedra,codigo_docente',
            'fecha' => 'required|date',
        ]);

        RegistroNotas::create($request->all());

        return redirect()->route('registronotas.index')->with('success', 'Registro creado exitosamente.');
    }

    public function edit($id_registro)
    {
        $registroNota = RegistroNotas::findOrFail($id_registro);
        $catedras = Catedra::all();
        return view('registronotas.edit', compact('registroNota', 'catedras'));
    }

    public function update(Request $request, $id_registro)
    {
        $request->validate([
            'id_curso' => 'required|exists:curso,id_curso',
            'id_grado' => 'required|exists:grado,id_grado',
            'codigo_docente' => 'required|exists:catedra,codigo_docente',
            'fecha' => 'required|date',
        ]);

        $registroNota = RegistroNotas::findOrFail($id_registro);
        $registroNota->update($request->all());

        return redirect()->route('registronotas.index')->with('success', 'Registro actualizado exitosamente.');
    }

    public function destroy($id_registro)
    {
        $registroNota = RegistroNotas::findOrFail($id_registro);
        $registroNota->delete();

        return redirect()->route('registronotas.index')->with('success', 'Registro eliminado exitosamente.');
    }
}
