<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductoController;


/* Route::get('/', function () {
    return view('login');
}); */

Route::get('/', [UserController::class,'showLogin']);
Route::post('/identificacion', [UserController::class,'verificalogin'])->name('identificacion');
Route::post('/salir', [UserController::class,'salir'])->name('logout');
Route::get('/login/inicio', function () {
    return view('prueba');
})->name('prueba');#PRUEBA ES EL INDEX GENERAL
Route::get('/login/login', function () {
    return view('login');
});
Route::get('/login/registro', function () {
    return view('layout/registroNotas');
})->name('registronotas');

Route::get('/login/listado', function () {
    return view('listadonotas');
})->name('listadonotas');

Route::get('/login/create', function () {
    return view('producto/create');
})->name('producto.create');

Route::get('/login/index', [ProductoController::class,'index'])->name('producto.index');
Route::resource('/producto', ProductoController::class);
Route::get('cancelar', function () {return redirect()->route('producto.index')->with('datos','Acción Cancelada ..!');})->name('cancelar');
Route::get('producto/{id}/confirmar',[ProductoController::class,'confirmar'])->name('producto.confirmar');


Route::get('/login/edit', function () {
    return view('producto/edit');
})->name('producto.edit');


Route::get('/login/confirmar', function () {
    return view('producto/confirmar');
})->name('producto.confirmar');

Route::get('/login/mantenedor', function () {
    return view('jose/mantenedor');
})->name('jose.mantenedor');


#joseph

Route::get('/matriculas', function () {
    return view('mantenedores.alumnos.matriculas');
})->name('alumno.create');

Route::get('/catedra', function () {
    return view('mantenedores.catedras.catedra');
})->name('catedra');
