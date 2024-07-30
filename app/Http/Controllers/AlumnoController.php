<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;

class AlumnoController extends Controller
{
    public function index()
    {
        $alumno=Alumno::where('estado','=','1')->get();
        return view('mantenedores.alumnos.index',compact('matricula'));
    }
 
    public function __construct(){
       $this->middleware('auth');
    }
}
