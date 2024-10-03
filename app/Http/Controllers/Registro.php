<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegistroNotas;
use App\Models\DetalleRegistro;


class Registro extends Controller
{

public function store(Request $request)
{
    // Validar datos entrantes
    $validatedData = $request->validate([
        'id_curso' => 'required|exists:cursos,id',
        'id_grado' => 'required|exists:grados,id',
        'codigo_docente' => 'required|exists:docentes,codigo',
        'fecha' => 'required|date',
        'notas' => 'required|array', // Las notas deben ser un array
        'notas.*.codigo_estudiante' => 'required|exists:estudiantes,codigo',
        'notas.*.nota' => 'required|numeric|min:0|max:100', // Nota entre 0 y 100
    ]);

    // Crear el registro principal
    $registroNota = RegistroNotas::create([
        'id_curso' => $validatedData['id_curso'],
        'id_grado' => $validatedData['id_grado'],
        'codigo_docente' => $validatedData['codigo_docente'],
        'fecha' => $validatedData['fecha'],
    ]);

    // Crear los detalles de las notas
    foreach ($validatedData['notas'] as $notaData) {
        DetalleRegistro::create([
            'id_registronotas' => $registroNota->id,
            'codigo_estudiante' => $notaData['codigo_estudiante'],
            'nota' => $notaData['nota'],
        ]);
    }

    // Redirigir con un mensaje de éxito
        return redirect()->route('registronotas.index')->with('success', 'Registro de notas creado exitosamente.');
    }



public function update(Request $request, $id)
{
    // Validar los datos entrantes
    $validatedData = $request->validate([
        'id_curso' => 'required|exists:cursos,id',
        'id_grado' => 'required|exists:grados,id',
        'codigo_docente' => 'required|exists:docentes,codigo',
        'fecha' => 'required|date',
        'notas' => 'required|array', // Las notas deben ser un array
        'notas.*.codigo_estudiante' => 'required|exists:estudiantes,codigo',
        'notas.*.nota' => 'required|numeric|min:0|max:100', // Nota entre 0 y 100
    ]);

    // Encontrar el registro de notas existente
    $registroNota = RegistroNotas::findOrFail($id);

    // Actualizar los datos del registro principal
    $registroNota->update([
        'id_curso' => $validatedData['id_curso'],
        'id_grado' => $validatedData['id_grado'],
        'codigo_docente' => $validatedData['codigo_docente'],
        'fecha' => $validatedData['fecha'],
    ]);

    // Actualizar las notas de los estudiantes
    foreach ($validatedData['notas'] as $notaData) {
        // Buscar si ya existe un detalle de nota para este estudiante en este registro
        $detalleNota = DetalleRegistro::where('id_registronotas', $registroNota->id)
            ->where('codigo_estudiante', $notaData['codigo_estudiante'])
            ->first();

        if ($detalleNota) {
            // Si ya existe, actualizar la nota
            $detalleNota->update([
                'nota' => $notaData['nota'],
            ]);
        } else {
            // Si no existe, crear un nuevo detalle de nota
            DetalleRegistro::create([
                'id_registronotas' => $registroNota->id,
                'codigo_estudiante' => $notaData['codigo_estudiante'],
                'nota' => $notaData['nota'],
            ]);
        }
    }

    // Redirigir con un mensaje de éxito
    return redirect()->route('registronotas.index')->with('success', 'Registro de notas actualizado exitosamente.');
}

}
