<?php


use App\Http\Controllers\AuthController;
use App\Http\Controllers\JuegosController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

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
Route::controller(AuthController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/login', 'login')->name('usuarios.login');
    Route::post('/login', 'loginAuth')->name('usuarios.loginAuth');
    Route::get('/registro', 'create')->name('usuarios.create');
    Route::Post('/registro', 'store')->name('usuarios.store');
    Route::post('/logout', 'logout')->name('usuarios.logout');
});

Route::resource('juegos', JuegosController::class)->except('show')->names('juegos');

Route::resource('categorias', CategoryController::class)->except('show')->names('categorias');