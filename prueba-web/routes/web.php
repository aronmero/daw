<?php

use App\Http\Controllers\JuegosController;
use Illuminate\Support\Facades\Route;
use App\http\controllers\LoginPruebaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/login', [LoginPruebaController::class, 'login']);


Route::get('/login/{usuario}/{apellidos?}', [LoginPruebaController::class, 'usuario']);

Route::get('/juegos', [JuegosController::class, 'mostrarCategoria']);
Route::get('/juegos/create', [JuegosController::class, 'create'])->name('create');
Route::post('/juegos/juegosCreate', [JuegosController::class, 'juegosCreate'])->name('juegosCreate');

Route::get('/juegos/{idjuego}', [JuegosController::class, 'juegoView'])->name('juegoView');
Route::post('/juegos/juegosUpdate', [JuegosController::class, 'juegosUpdate'])->name('juegosUpdate');

Route::get('/juegos/{juego}/{categoria}', [JuegosController::class, 'mostrarJuegoCategoria']);