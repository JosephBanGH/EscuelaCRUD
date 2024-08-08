<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\GradoController;
use App\Http\Controllers\SeccionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\CapacidadController;
use App\Models\Alumno;

/* Route::get('/', function () {
    return view('login');
}); */

Route::get('/', [UserController::class, 'showLogin']);
Route::post('/identificacion', [UserController::class, 'verificalogin'])->name('identificacion');
Route::post('/salir', [UserController::class, 'salir'])->name('logout');

// Rutas de prueba y login

Route::get('/login/inicio', function () {
    return view('prueba');
})->name('prueba'); // PRUEBA ES EL INDEX GENERAL

Route::get('/login/registro', function () {
    return view('layout/registroNotas');
})->name('registronotas');

Route::get('/login/listado', function () {
    return view('listadonotas');
})->name('listadonotas');

// Rutas para Personal
Route::get('/personal', [PersonalController::class, 'index'])->name('personal.index');
Route::get('/personal/create', [PersonalController::class, 'create'])->name('personal.create');
Route::post('/personal', [PersonalController::class, 'store'])->name('personal.store');
Route::get('/personal/{id}/confirmar', [PersonalController::class, 'confirmar'])->name('personal.confirmar');
Route::get('/personal/{personal}/edit', [PersonalController::class, 'edit'])->name('personal.edit');
Route::put('/personal/{personal}', [PersonalController::class, 'update'])->name('personal.update');
Route::delete('/personal/{personal}', [PersonalController::class, 'destroy'])->name('personal.destroy');
Route::get('personal/cancelar', function () {
    return redirect()->route('personal.index')->with('datos', 'Acción Cancelada ..!');
})->name('personal.cancelar');


//ALUMNOS

Route::get('/alumno',[AlumnoController::class,'index'])->name('alumno.index');
Route::get('/alumno/create', [AlumnoController::class, 'create'])->name('alumno.create');
Route::post('/alumno', [AlumnoController::class, 'store'])->name('alumno.store');
Route::get('/alumno/{id}/confirmar', [AlumnoController::class, 'confirmar'])->name('alumno.confirmar');
Route::get('/alumno/{alumno}/edit', [AlumnoController::class, 'edit'])->name('alumno.edit');
Route::put('/alumno/{alumno}', [AlumnoController::class, 'update'])->name('alumno.update');
Route::delete('/alumno/{alumno}', [AlumnoController::class, 'destroy'])->name('alumno.destroy');

Route::get('/alumno/cancelar', function () {
    return redirect()->route('alumno.index')->with('datos', 'Acción Cancelada ..!');
})->name('alumno.cancelar');

//CURSOS

Route::get('curso', [CursoController::class, 'index'])->name('curso.index');
Route::get('curso/create', [CursoController::class, 'create'])->name('curso.create');
Route::post('curso/store', [CursoController::class, 'store'])->name('curso.store');
Route::get('curso/{id_curso}/edit', [CursoController::class, 'edit'])->name('curso.edit');
Route::put('curso/{id_curso}/update', [CursoController::class, 'update'])->name('curso.update');
Route::delete('curso/{id_curso}', [CursoController::class, 'destroy'])->name('curso.destroy');
Route::get('curso/{id_curso}/confirmar', [CursoController::class, 'confirmar'])->name('curso.confirmar');

Route::get('/curso/cancelar', function () {
    return redirect()->route('curso.index')->with('datos', 'Acción Cancelada ..!');
})->name('curso.cancelar');

//GRADOS

Route::get('grado', [GradoController::class, 'index'])->name('grado.index');
Route::get('grado/create', [GradoController::class, 'create'])->name('grado.create');
Route::post('grado/store', [GradoController::class, 'store'])->name('grado.store');
Route::get('grado/{id_grado}/edit', [GradoController::class, 'edit'])->name('grado.edit');
Route::put('grado/{id_grado}/update', [GradoController::class, 'update'])->name('grado.update');
Route::delete('grado/{id_grado}', [GradoController::class, 'destroy'])->name('grado.destroy');
Route::get('grado/{id_grado}/confirmar', [GradoController::class, 'confirmar'])->name('grado.confirmar');

Route::get('/grado/cancelar', function () {
    return redirect()->route('grado.index')->with('datos', 'Acción Cancelada ..!');
})->name('grado.cancelar');

//MATRICULAS
Route::resource('matricula','MatriculaController');
Route::get('/cancelarm', function () {
    return redirect()->route('matricula.index')->with('datos','Matricula cancelada');
})->name('/cancelarm');
Route::get('/matricula/{matricula_id}/confirmar','ProductoController@confirmar')->name('producto.confirmar');

//CATEDRA

Route::get('/catedra', function () {
    return view('mantenedores.catedras.catedra');
})->name('catedra');


//CAPACIDAD

Route::get('/capacidad', function () {
    return view('mantenedores.capacidad.capacidad');
})->name('capacidad');


Route::get('capacidad', [CapacidadController::class, 'index'])->name('capacidad.index');
Route::get('capacidad/create', [CapacidadController::class, 'create'])->name('capacidad.create');
Route::post('capacidad/store', [CapacidadController::class, 'store'])->name('capacidad.store');
Route::get('capacidad/{id_capacidad}/edit', [CapacidadController::class, 'edit'])->name('capacidad.edit');
Route::put('capacidad/{id_capacidad}/update', [CapacidadController::class, 'update'])->name('capacidad.update');
Route::delete('capacidad/{id_capacidad}', [CapacidadController::class, 'destroy'])->name('capacidad.destroy');
Route::get('capacidad/{id_capacidad}/confirmar', [CapacidadController::class, 'confirmar'])->name('capacidad.confirmar');
Route::get('/capacidad/cancelar', function () {
    return redirect()->route('capacidad.index')->with('datos', 'Acción Cancelada ..!');
})->name('capacidad.cancelar');

//LISTADO DE NOTAS 

//TABLA
Route::get('/notas', function () {
    return view('notas.index');
})->name('notas.index');