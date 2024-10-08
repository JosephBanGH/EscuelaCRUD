<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;

use App\Models\RegistroNotas;
use App\Models\Catedra;
use App\Models\Cursos;
use App\Models\Grado;
use App\Models\Personal;
use App\Models\Alumno;
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
        $catedras = Catedra::with('curso')->get(); // Asegúrate de cargar la relación 'curso'
        return view('registronotas.create', compact('catedras'));
    }    

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_curso' => 'required|exists:curso,id_curso',
            'id_grado' => 'required|exists:grado,id_grado',
            'codigo_docente' => 'required|exists:catedra,codigo_docente',
            'fecha' => 'required|date',
        ]);

        RegistroNotas::create([
            'id_curso' => $validatedData['id_curso'],
            'id_grado' => $validatedData['id_grado'],
            'codigo_docente' => $validatedData['codigo_docente'],
            'fecha' => $validatedData['fecha']
        ]);

        return redirect()->route('registronotas.index')->with('success', 'Registro creado exitosamente.');
    }

    public function edit($id)
    {
        // Obtener el registro de notas por su ID
        $registroNota = RegistroNotas::with('detalleNotas.alumno')->findOrFail($id);
    
        // Obtener las listas necesarias para los selectores
        $cursos = Cursos::all();
        $grados = Grado::all();
        $docentes = Personal::all();
    
        // Obtener la lista de todos los estudiantes
        $estudiantes = Alumno::all();
    
        // Pasar los datos a la vista
        return view('registronotas.edit', compact('registroNota', 'cursos', 'grados', 'docentes', 'estudiantes'));
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
