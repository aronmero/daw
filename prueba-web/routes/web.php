<?php

use App\Http\Controllers\JuegosController;
use App\Http\Controllers\CategoryController;
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

Route::controller(JuegosController::class)->group(function () {
    Route::get('/juegos', 'mostrarCategoria')->name('vistaJuegos');;
    Route::get('/juegos/create', 'create')->name('create');
    Route::post('/juegos/juegosCreate', 'juegosCreate')->name('juegosCreate');

    Route::get('/juegos/juegosEliminar/{idjuego}', 'juegoEliminar')->name('juegoEliminar');
    Route::post('/juegos/juegosUpdate', 'juegosUpdate')->name('juegosUpdate');

    Route::get('/juegos/{idjuego}',  'juegoView')->name('juegoView');
    Route::get('/juegos/{juego}/{categoria}', 'mostrarJuegoCategoria');
});

Route::resource('categorias', CategoryController::class);