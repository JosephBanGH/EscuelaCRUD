<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


/* Route::get('/', function () {
    return view('login');
}); */

Route::get('/', [UserController::class,'showLogin']);
Route::post('/identificacion', [UserController::class,'verificalogin'])->name('identificacion');
Route::post('/salir', [UserController::class,'salir'])->name('logout');
Route::get('/login', function () {
    return view('login');
});