<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cursos;
use App\Models\Alumno;
use App\Models\Periodo;


class AlumnoCurso extends Controller
{
    public function index(Request $request){
        $catedra = Catedra::whereHas('periodo',function($query){
            $catedra->where('estado',1);
        })->with('alumno','periodo','seccion.grado.nivel','cursos');
        return view('mantenedores.cursos.index');
    }
}
