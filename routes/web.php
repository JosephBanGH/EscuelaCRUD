<?php

use App\Http\Controllers\AlumnoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PersonalController;

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

Route::get('/login/login', function () {
    return view('login');
});

Route::get('/login/registro', function () {
    return view('layout/registroNotas');
})->name('registronotas');

Route::get('/login/listado', function () {
    return view('listadonotas');
})->name('listadonotas');

// Rutas para Personal



Route::get('/personal', [PersonalController::class, 'index'])->name('personal.index');
Route::resource('/personal', PersonalController::class);

Route::get('cancelar', function () {
    return redirect()->route('personal.index')->with('datos', 'Acción Cancelada ..!');
})->name('cancelar');

Route::get('personal/{id}/confirmar', [PersonalController::class, 'confirmar'])->name('personal.confirmar');


// Rutas adicionales


Route::get('/login/mantenedor', function () {
    return view('jose/mantenedor');
})->name('jose.mantenedor');

Route::get('/matriculas', function () {
    return view('mantenedores.alumnos.matriculas');
})->name('alumno.create');

Route::get('/alumnos', [AlumnoController::class,'index'])->name('alumnos.index');


Route::get('/catedra', function () {
    return view('mantenedores.catedras.catedra');
})->name('catedra');
