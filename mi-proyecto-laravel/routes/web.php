<?php


use App\Http\Controllers\ActividadesController;
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
    Route::get('/registro', 'create')->name('usuarios.create');
    Route::Post('/registro', 'store')->name('usuarios.store');
    Route::post('/logout', 'logout')->name('usuarios.logout');
});


Route::get('/vista', [ActividadesController::class, 'mostrarActividades']);

