<?php

use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\ActividadController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(AuthController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/login', 'login')->name('usuarios.login');
    Route::post('/login', 'loginAuth')->name('usuarios.loginAuth');
    Route::post('/logout', 'logout')->name('usuarios.logout');
});


Route::resource('actividades', ActividadController::class)->names('actividades');

Route::resource('grupos', GrupoController::class)->except('show')->names('grupos');
Route::resource('profesores', ProfesorController::class)->except('show')->names('profesores');

