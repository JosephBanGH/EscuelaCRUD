<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periodo;
use App\Models\Preinscripcion;
use App\Models\Matricula;
use Carbon\Carbon;
use App\Models\Entrevista;
use App\Models\Interesado;
use Psy\Readline\Hoa\Console;
use App\Models\Alumno;

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

    public function programar($idPreinscripcion)
    {
        $interesado = Interesado::where('idPreinscripcion', 'like',$idPreinscripcion)->first();
        return view('director.programar',compact('interesado'))->with('interesado',$interesado);
    }
    public function updateEntrevista(Request $request)
    {
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
    public function evaluar()
    {
        $entrevistas = Entrevista::with('interesado')->get(); // Cargar los interesados
        return view('director.evaluar', compact('entrevistas'));
    }
    public function create()
    {
        // Obtener las entrevistas o los datos que necesitas
        $entrevistas = Entrevista::all(); // O la consulta que necesites

        // Pasar la variable a la vista
        return view('director.create', compact('entrevistas'));
    }
    public function evaluar_store(Request $request)
    {
        // Validar los datos del formulario
        $validated = $request->validate([
            'idInteresado' => 'required|exists:interesados,id',  // Validar que el interesado exista
            'nota' => 'required|numeric|between:0,20',  // Validar que la nota esté entre 0 y 20
            'fechaEntrevista' => 'required|date',  // Validar que la fecha sea una fecha válida
        ]);

        // Obtener el interesado relacionado con la entrevista
        $interesado = Interesado::find($request->idInteresado);  // Encuentra el interesado por su ID

        // Crear una nueva entrevista
        $entrevista = new Entrevista();
        $entrevista->idInteresado = $request->idInteresado;
        $entrevista->nota = $request->nota;
        $entrevista->fechaEntrevista = $request->fechaEntrevista;

        // Agregar los datos del interesado (nombre y apellido)
        $entrevista->nombreInteresado = $interesado->nombreInteresado;
        $entrevista->apellidoInteresado = $interesado->apellidoInteresado;

        // Guardar la entrevista
        $entrevista->save();

        // Redirigir con un mensaje de éxito
        return redirect()->route('director.evaluar')->with('success', 'Evaluación guardada exitosamente');
    }
    public function edit($id)
    {
        // Obtener la entrevista con el ID dado
        $entrevista = Entrevista::findOrFail($id);  // Encuentra la entrevista por su ID
    
        // Pasar la entrevista a la vista para mostrar los datos en el formulario de edición
        return view('director.edit', compact('entrevista'));
    }
    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $validated = $request->validate([
            'idInteresado' => 'required|exists:interesados,id',  // Validar que el interesado exista
            'nota' => 'required|numeric|between:0,20',  // Validar que la nota esté entre 0 y 20
            'fechaEntrevista' => 'required|date',  // Validar que la fecha sea válida
        ]);
    
        // Obtener la entrevista que se va a actualizar
        $entrevista = Entrevista::findOrFail($id);
    
        // Actualizar los campos de la entrevista
        $entrevista->idInteresado = $request->idInteresado;
        $entrevista->nota = $request->nota;
        $entrevista->fechaEntrevista = $request->fechaEntrevista;
    
        // Obtener los datos del interesado para actualizarlos también
        $interesado = Interesado::find($request->idInteresado);
        $entrevista->nombreInteresado = $interesado->nombreInteresado;
        $entrevista->apellidoInteresado = $interesado->apellidoInteresado;
    
        // Guardar la entrevista actualizada
        $entrevista->save();
    
        // Redirigir con un mensaje de éxito
        return redirect()->route('director.evaluar')->with('success', 'Evaluación actualizada exitosamente');
    }
    
}