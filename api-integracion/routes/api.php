<?php

use App\Http\Controllers\ApiAyuntamientoController;
use App\Http\Controllers\ApiComercioController;
use App\Http\Controllers\ApiParticularController;
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
Route::patch('/ayuntamientos/verificar-comercio', [ApiAyuntamientoController::class, 'verificarComercio']);

Route::apiResource('particulares', ApiParticularController::class)->parameters(['particulares' => 'particular']);
Route::apiResource('comercios', ApiComercioController::class)->parameters(['comercios' => 'comercio']);
Route::apiResource('ayuntamientos', ApiAyuntamientoController::class)->parameters(['ayuntamientos' => 'ayuntamiento']);
