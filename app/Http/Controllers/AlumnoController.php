<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;

class AlumnoController extends Controller
{
    const PAGINATION = 4;
    public function index()
    {
        $alumno=Alumno::where('id_nivel','=','1')->paginate($this::PAGINATION);
        return view('mantenedores.alumnos.index',compact('alumno'));
    }

    public function __construct(){
        $this->middleware('auth');
    }

}

