<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personal;

class PersonalController extends Controller
{
    const PAGINATION = 5; 
    
    public function index(Request $request)
    {
        // Inicializamos la consulta base
        $query = Personal::where('estado', 1);  // Solo obtenemos los registros activos
        
        // Agregamos filtros basados en el parámetro de búsqueda
        if ($request->filled('buscarpor')) {
            $search = $request->input('buscarpor');
            
            $query->where('nombres', 'like', "%{$search}%");
        }
        
        // Paginar los resultados
        $personal = $query->paginate($this::PAGINATION);
        
        
        // Devolver la vista con los datos filtrados
        return view('personal.index', compact('personal'));
    }
    
    public function create()
    {
        return view('personal.create'); 
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'DNI' => 'required|numeric|digits:8|unique:personal,DNI',
            'nombres' => 'required|max:255',
            'apellidos' => 'nullable|max:255',
            'direccion' => 'nullable|max:255',
            'estado_civil' => 'nullable|in:soltero,casado,viudo,divorciado',
            'telefono' => 'nullable|numeric|digits:9',
            'seguro_social' => 'nullable|max:20',
            'departamento' => 'nullable|max:255',
            'fecha_registro' => 'nullable|date',
        ]);
    
        $personal = new Personal;
        $personal->DNI = $request->DNI;
        $personal->nombres = $request->nombres;
        $personal->apellidos = $request->apellidos;
        $personal->direccion = $request->direccion;
        $personal->estado_civil = $request->estado_civil;
        $personal->telefono = $request->telefono;
        $personal->seguro_social = $request->seguro_social;
        $personal->departamento = $request->departamento;
        $personal->fecha_registro = $request->fecha_registro;
        $personal->estado = 1; // Estado activo por defecto
        $personal->save();
    
        return redirect()->route('personal.index')->with('datos', 'Registro Nuevo Guardado...!');
    }
    
    public function edit($codigo_docente)
    {
        $personal = Personal::findOrFail($codigo_docente);
        return view('personal.edit', compact('personal'));
    }

    public function update(Request $request, $codigo_docente)
    {
        $validatedData = $request->validate([
            'DNI' => 'required|numeric|digits:8',
            'nombres' => 'required|max:255',
            'apellidos' => 'nullable|max:255',
            'direccion' => 'nullable|max:255',
            'estado_civil' => 'nullable|in:soltero,casado,viudo,divorciado',
            'telefono' => 'nullable|numeric|digits:9',
            'seguro_social' => 'nullable|max:20',
            'departamento' => 'nullable|max:255',
            'fecha_registro' => 'nullable|date',
        ]);

        $personal = Personal::findOrFail($codigo_docente);
        $personal->DNI = $request->DNI;
        $personal->nombres = $request->nombres;
        $personal->apellidos = $request->apellidos;
        $personal->direccion = $request->direccion;
        $personal->estado_civil = $request->estado_civil;
        $personal->telefono = $request->telefono;
        $personal->seguro_social = $request->seguro_social;
        $personal->departamento = $request->departamento;
        $personal->fecha_registro = $request->fecha_registro;
        $personal->save();

        return redirect()->route('personal.index')->with('datos', 'Registro Actualizado...!');
    }

    public function confirmar($id)
    {
        $personal = Personal::findOrFail($id);
        return view('personal.confirmar', compact('personal'));
    }

    public function destroy($id)
    {
        $personal = Personal::findOrFail($id);
        $personal->estado = 0; // Cambia el estado a inactivo
        $personal->save();
        return redirect()->route('personal.index')->with('datos', 'Registro Eliminado...!');
    }
}
