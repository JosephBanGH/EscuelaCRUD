<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cursos;
use App\Models\Grado;
use App\Models\Personal;
use App\Models\Catedra;
use App\Models\CursoGrado;

class CatedraController extends Controller
{
    const PAGINATION = 4; // PARA QUE PAGINEE DE 10 EN 10
    public function index(Request $request){
        $buscarpor=$request->get('buscarpor');
        $catedra=Catedra::where('estado','=','1')->where('periodo','like','%'.$buscarpor.'%')->paginate($this::PAGINATION);
        return view('mantenedores.catedras.index',compact('catedra','buscarpor'));
    }
    public function create(){
        $curso_grado = CursoGrado::Where('estado','=','1')->get();
        $personal = Personal::where('estado','=','1')->get();
//        $grado = Grado::Where('estado','=','1')->get();
        $catedra=Catedra::where('estado','=','1')->paginate($this::PAGINATION);
        return view('mantenedores.catedras.create',compact('personal','curso_grado','catedra')); 
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'codigo_docente' => 'required|exists:personal,codigo_docente',
            'curso' => 'required',
            'periodo' => 'required',
        ]);
    
        // Dividir 'curso' en 'id_curso' e 'id_grado'
        list($id_curso, $id_grado) = explode('__', $data['curso']);
    
        Catedra::create([
            'codigo_docente' => $data['codigo_docente'],
            'id_curso' => $id_curso,
            'id_grado' => $id_grado,
            'periodo' => $data['periodo'],
        ]);
    
        return redirect()->route('catedra.index')->with('datos', 'Cátedra agregada exitosamente.');
    }
    
    public function edit($id)
    {
        $Personal=Personal::findOrFail($id);
        $Cursos = Cursos::Where('estado','=','1')->get();
        $Grado = Grado::Where('estado','=','1')->get();
        return view('mantenedores.Personal.edit',compact('Personal','Cursos','Grado'));
    }
    public function update(Request $request, $idPersonal)
    {
        $data=request()->validate([
        'nombre'=>'required|max:30'
        ],
        [
        'nombre.required'=>'Ingrese descripción de Cursos',
        'nombre.max'=>'Maximo 30 caracteres para la descripción'
        ]);
        $Personal=Personal::findOrFail($idPersonal);
        $Personal->nombre=$request->nombre;
        $Personal->idCursos=$request->idCursos;
        $Personal->idunidad=$request->idunidad;
        $Personal->nivel=$request->nivel;
        $Personal->codigo=$request->codigo;
        $Personal->save();
        return redirect()->route('Personal.index')->with('datos','Registro Actualizado...!');
    }
    public function confirmar($id)
    {
        $Personal=Personal::findOrFail($id);
        return view('mantenedores.Personal.confirmar',compact('Personal'));
    }
    public function destroy($id)
    {
        $Personal=Personal::findOrFail($id);
        $Personal->estado='0';
        $Personal->save();
        return redirect()->route('Personal.index')->with('datos','Registro Eliminado...!');
    }
    public function encontrarPersonal($id)
    {
        $Personal = Personal::with('unidad')->find($id);
        if (!$Personal) {
            return response()->json(['error' => 'Personal no encontrado'], 404);
        }
        return response()->json($Personal);
    }
}

