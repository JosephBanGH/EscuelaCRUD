<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periodo;
use App\Models\Preinscripcion;
use App\Models\Matricula;
use Carbon\Carbon;

class DirectorController extends Controller
{

    public function index()
    {
        // Total de matrículas
        $totalMatriculas = Matricula::count();
    
        // Matrículas activas (estado = 1)
        $matriculasActivas = Matricula::where('estado', 1)->count();
    
        // Matrículas anuladas (estado = 0)
        $matriculasAnuladas = Matricula::where('estado', 0)->count();
    
        // Obtener las matrículas con datos relacionados para la tabla
        $matriculas = Matricula::with(['alumno', 'seccion', 'periodo'])->get();
    
        // Retornar la vista con todas las variables necesarias
        return view('director.general', compact('matriculas', 'totalMatriculas', 'matriculasActivas', 'matriculasAnuladas'));
    }
    

    public function periodo()
    {
        // Obtener todos los periodos
        $periodos = Periodo::all(); // Aquí obtienes todos los periodos
    
        // Retornar la vista director.periodo y pasarle los periodos
        return view('director.periodo', compact('periodos'));
    }
    
    // Guardar un nuevo periodo
    public function store(Request $request)
    {
        // Validar los datos
        $validated = $request->validate([
            'inicio' => 'required|date',
            'fin' => 'required|date|after:inicio',
        ]);
    
        // Si llegamos aquí, significa que la validación fue exitosa
        // Crear el nuevo periodo
        Periodo::create([
            'inicioPeriodo' => $request->inicio,
            'finPeriodo' => $request->fin,
            'estado' => 0,  // Si ya hay un periodo activo, este será inactivo
        ]);
    
        return redirect()->route('director.periodo')->with('success', 'Periodo creado exitosamente.');
    }
    
    // Cambiar estado (activar/desactivar)
    public function cambiarEstado($id)
    {
        // Desactivar todos los periodos
        Periodo::where('estado', 1)->update(['estado' => 0]);
    
        // Activar el periodo seleccionado
        $periodo = Periodo::find($id);
        $periodo->estado = 1;
        $periodo->save();
    
        return redirect()->route('director.periodo')->with('success', 'Periodo activado exitosamente');
    }


    public function analisis()
    {
        // Obtener todas las preinscripciones
        $preinscripciones = Preinscripcion::all();

        // Formatear la fecha para cada preinscripción
        foreach ($preinscripciones as $preinscripcion) {
            // Formato 'd/m/Y' para la fecha de preinscripción
            $preinscripcion->fechaPreinscripcion = Carbon::parse($preinscripcion->fechaPreinscripcion)->format('d/m/Y');
        }
        return view('director.analisis', compact('preinscripciones'));
    }

}