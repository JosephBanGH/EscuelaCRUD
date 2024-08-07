<?php

namespace App\Http\Controllers;

use App\Models\Grado;
use App\Models\Seccion;
use Illuminate\Http\Request;

class GradoController extends Controller
{
    public function index()
    {
        $grados = Grado::with('seccion')->get();
        return view('grados.index', compact('grados'));
    }

    public function create()
    {
        $secciones = Seccion::all();
        return view('grados.create', compact('secciones'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nivel_grado' => 'required',
            'seccion_id' => 'required',
            'nombre_grado' => 'required'
        ]);

        Grado::create($request->all());

        return redirect()->route('grado.index')->with('datos', 'Registro creado exitosamente!');
    }

    public function edit($id_grado)
    {
        $grado = Grado::findOrFail($id_grado);
        $secciones = Seccion::all();
        return view('grado.edit', compact('grado', 'secciones'));
    }

    public function update(Request $request, $id_grado)
    {
        $request->validate([
            'nivel_grado' => 'required',
            'seccion_id' => 'required',
            'nombre_grado' => 'required'
        ]);

        $grado = Grado::findOrFail($id_grado);
        $grado->update($request->all());

        return redirect()->route('grado.index')->with('datos', 'Registro actualizado exitosamente!');
    }

    public function destroy($id_grado)
    {
        $grado = Grado::findOrFail($id_grado);
        $grado->delete();

        return redirect()->route('grado.index')->with('datos', 'Registro eliminado exitosamente!');
    }

    public function confirmar($id_grado)
    {
        $grado = Grado::findOrFail($id_grado);
        return view('grados.confirmar', compact('grado'));
    }

    public function cancelar()
    {
        return redirect()->route('grados.index');
    }
}

