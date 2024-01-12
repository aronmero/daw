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

Route::resource('juegos', JuegosController::class);

Route::resource('categorias', CategoryController::class);