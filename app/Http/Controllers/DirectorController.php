<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periodo;

class DirectorController extends Controller
{
    // Listar periodos
    public function index()
    {
        $periodos = Periodo::all(); // Obtenemos todos los periodos
        return view('director.general', compact('periodos'));
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
}