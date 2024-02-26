<?php

use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\ApiAyuntamientoController;
use App\Http\Controllers\ApiComercioController;
use App\Http\Controllers\ApiEtiquetaController;
use App\Http\Controllers\ApiParticularController;
use App\Http\Controllers\ApiPublicacionController;
use App\Http\Controllers\ApiSeguidoController;
use App\Http\Controllers\ApiUsuarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/comercios/publicaciones/{comercio}', [ApiComercioController::class, 'showPublicaciones'])->name('comercios.publicaciones');
Route::patch('/ayuntamientos/verificar-comercio', [ApiAyuntamientoController::class, 'verificarComercio'])->name('ayuntamientos.verify');

Route::apiResource('usuarios', ApiUsuarioController::class)->parameters(['usuarios' => 'usuario'])->except(['update','store']);
Route::apiResource('particulares', ApiParticularController::class)->parameters(['particulares' => 'particular']);
Route::apiResource('comercios', ApiComercioController::class)->parameters(['comercios' => 'comercio']);
Route::apiResource('ayuntamientos', ApiAyuntamientoController::class)->parameters(['ayuntamientos' => 'ayuntamiento']);

Route::apiResource('publicaciones', ApiPublicacionController::class)->parameters(['publicaciones' => 'publicacion']);
Route::apiResource('etiquetas', ApiEtiquetaController::class)->parameters(['etiquetas' => 'etiqueta']);
Route::get('/seguidos/info', [ApiSeguidoController::class, 'info']);
Route::apiResource('seguidos', ApiSeguidoController::class)->parameters(['seguidos' => 'seguido'])->except(['update']);

Route::post("login", [ApiAuthController::class, 'index']);