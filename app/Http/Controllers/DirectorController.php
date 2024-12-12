<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periodo;
use App\Models\Preinscripcion;
use Carbon\Carbon;
use Psy\Readline\Hoa\Console;

class DirectorController extends Controller
{
    // Listar periodos
    public function index()
    {
        $periodos = Periodo::all(); // Obtenemos todos los periodos
        return view('director.general', compact('periodos'));
    }
    public function programar($idPreinscripcion)
    {
        $interesado = Interesado::where('idPreinscripcion', 'like',$idPreinscripcion)->first();
        return view('director.programar',compact('interesado'))->with('interesado',$interesado);
    }
    public function updateEntrevista(Request $request)
    {
        // //imprimir en consola
        // $request->validate([
        //     'lugarEntrevista' => 'required|string|max:255',
        //     'fechaEntrevista' => 'required|date',
        //     'horaEntrevista' => 'required|date_format:H:i',
        // ]);

        $entrevista = new Entrevista();
        $entrevista->idInteresado = $request->idInteresado;
        
        $entrevista->lugarEntrevista = $request->lugarEntrevista;
        // Combine fecha and hora into a single datetime field
        $fechaHora = $request->fechaEntrevista . ' ' . $request->horaEntrevista;
        $entrevista->fechaEntrevista = date('Y-m-d H:i:s', strtotime($fechaHora));
        
        $entrevista->idComiteAdmision = 1;
        $entrevista->save();

        return redirect()->route('evaluarPreinscripciones');
    }
    /**
     * Show the form for creating a new resource.
     */
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