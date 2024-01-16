<?php


use App\Http\Controllers\AuthController;
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

Route::get('/', [AuthController::class, 'index'])->name('home');
Route::get('/login', [AuthController::class, 'login'])->name('usuarios.login');
Route::post('/login', [AuthController::class, 'loginAuth'])->name('usuarios.loginAuth');
Route::get('/registro', [AuthController::class, 'create'])->name('usuarios.create');
Route::Post('/registro', [AuthController::class, 'store'])->name('usuarios.store');
Route::post('/logout', [AuthController::class, 'logout'])->name('usuarios.logout');

Route::resource('juegos', JuegosController::class)->except('show');

Route::resource('categorias', CategoryController::class)->except('show');;
