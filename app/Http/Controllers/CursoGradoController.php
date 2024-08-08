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
        $query = CursoGrado::with('curso', 'grado');

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
            'nivel' => 'required|string',
            'periodo_escolar' => 'required|string',
            'nombre_curso' => 'required|string',
        ]);
    
        try {
            DB::transaction(function () use ($validatedData) {
                // Verificar duplicado
                $exists = CursoGrado::where('id_curso', $validatedData['id_curso'])
                                    ->where('id_grado', $validatedData['id_grado'])
                                    ->where('periodo_escolar', $validatedData['periodo_escolar'])
                                    ->exists();
    
                if ($exists) {
                    throw new \Exception('Ya existe un registro con esta combinación.');
                }
    
                CursoGrado::create($validatedData);
            });
    
            return redirect()->route('curso_grado.index')->with('success', 'Registro creado exitosamente.');
    
        } catch (\Exception $e) {
            // Loguear el error
            \Log::error('Error al crear el registro: ' . $e->getMessage());
            return redirect()->route('curso_grado.create')->withErrors(['error' => 'Error al crear el registro.'])->withInput();
        }
    }
    
    


    public function confirmar($id)
    {
        $cursoGrado = CursoGrado::with('curso', 'grado')->findOrFail($id);

        return view('curso_grado.confirmar', compact('cursoGrado'));
    }

    public function destroy($id)
    {
        $cursoGrado = CursoGrado::findOrFail($id);

        // Si deseas eliminar el registro, descomenta la siguiente línea
        // $cursoGrado->delete();

        // O, si prefieres solo marcarlo como inactivo, descomenta la siguiente línea y asegúrate de tener un campo 'estado' en tu modelo
        $cursoGrado->update(['estado' => 0]);

        return redirect()->route('curso_grado.index')->with('datos', 'Registro eliminado con éxito.');
    }
}
