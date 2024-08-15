<?php

namespace App\Http\Controllers;

use App\Models\CursoGrado;
use App\Models\Grado;
use App\Models\Cursos;
use Illuminate\Http\Request;

class CursoGradoController extends Controller
{
    public function index(Request $request)
    {
        $query = CursoGrado::with('curso', 'grado')->where('estado','=','1');

        // Filtrar por nombre de curso
        if ($request->filled('buscarpor')) {
            $search = $request->input('buscarpor');
            $query->whereHas('curso', function ($query) use ($search) {
                $query->where('nombre_curso', 'like', "%{$search}%");
            });
        }

        // Filtrar por periodo escolar
        if ($request->filled('buscarperiodo')) {
            $searchPeriodo = $request->input('buscarperiodo');
            $query->where('periodo_escolar', 'like', "%{$searchPeriodo}%");
        }

        $cursoGrado = $query->paginate(10);

        return view('curso_grado.index', compact('cursoGrado'));
    }

    public function create()
    {
        // Obtener solo los cursos y grados activos
        $cursos = Cursos::where('estado', 1)->get();
        $grados = Grado::where('estado', 1)->get();

        return view('curso_grado.create', compact('cursos', 'grados'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_curso' => 'required|exists:curso,id_curso',
            'id_grado' => 'required|exists:grado,id_grado',
            'periodo_escolar' => 'required|string',
        ]);
    
        // Verificar si existe un registro con estado inactivo
        $cursoGrado = CursoGrado::where('id_curso', $validatedData['id_curso'])
                                ->where('id_grado', $validatedData['id_grado'])
                                ->first();
    
        if ($cursoGrado) {
            if ($cursoGrado->estado == 1) {
                return redirect()->route('curso_grado.create')->with('error', 'Combinación de curso y grado ya existente y activa.');
            } else {
                // Si el registro existe pero está inactivo, lo reactivamos
                $cursoGrado->estado = 1;
                $cursoGrado->periodo_escolar = $request->periodo_escolar;
                $cursoGrado->save();
    
                return redirect()->route('curso_grado.index')->with('success', 'Registro reactivado exitosamente.');
            }
        } else {
            // Si no existe, lo creamos
            $curso = Cursos::findOrFail($validatedData['id_curso']);
            $grado = Grado::findOrFail($validatedData['id_grado']);
    
            $nivel = $grado->nivel;
            $nombreCurso = $curso->nombre_curso;
    
            CursoGrado::create(array_merge($validatedData, [
                'nivel' => $nivel,
                'nombre_curso' => $nombreCurso,
                'estado' => 1,
            ]));
    
            return redirect()->route('curso_grado.index')->with('datos', 'Registro creado exitosamente.');
        }
    }
    

    public function edit($id)
    {
        $cursoGrado = CursoGrado::findOrFail($id);
        $cursos = Cursos::where('estado', 1)->get();
        $grados = Grado::where('estado', 1)->get();

        return view('curso_grado.edit', compact('cursoGrado', 'cursos', 'grados'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'id_curso' => 'required|exists:curso,id_curso',
            'id_grado' => 'required|exists:grado,id_grado',
            'periodo_escolar' => 'required|string',
        ]);

        $cursoGrado = CursoGrado::findOrFail($id);
        $cursoGrado->update($validatedData);

        return redirect()->route('curso_grado.index')->with('success', 'Registro actualizado exitosamente.');
    }

    public function confirmar($id)
    {
        $cursoGrado = CursoGrado::with('curso', 'grado')->findOrFail($id);

        return view('curso_grado.confirmar', compact('cursoGrado'));
    }

    public function destroy($id_curso,$id_grado)
    {
        $cursoGrado = CursoGrado::where('id_curso', $id_curso)
            ->where('id_grado', $id_grado)
            ->firstOrFail();
        
        $cursoGrado->estado = 1;
        $cursoGrado->save();
    
        return redirect()->route('curso_grado.index')->with('success', 'Registro desactivado exitosamente.');
    }
}
