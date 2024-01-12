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
    Route::get('/juegos', 'index')->name('juego.index');
    Route::get('/juegos/create', 'create')->name('juego.create');
    Route::post('/juegos/juegosCreate', 'store')->name('juego.store');

    Route::get('/juegos/juegosEliminar/{idjuego}', 'destroy')->name('juego.destroy');
    Route::post('/juegos/juegosUpdate', 'update')->name('juego.update');

    Route::get('/juegos/{idjuego}',  'edit')->name('juego.edit');
    Route::get('/juegos/{juego}/{categoria}', 'test');
});

Route::resource('categorias', CategoryController::class);