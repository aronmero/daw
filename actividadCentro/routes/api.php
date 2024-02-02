<?php

use App\Http\Controllers\ApiActividadController;
use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\ApiGrupoController;
use App\Http\Controllers\ApiProfesorController;
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
/*
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::apiResource('juegos', ApiActividadController::class);
});
*/
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::apiResource('actividades', ApiActividadController::class)->parameters(['actividades' => 'actividad']);
    Route::apiResource('grupos', ApiGrupoController::class);
    Route::apiResource('profesores', ApiProfesorController::class)->parameters(['profesores' => 'profesor']);
});
Route::post("login", [ApiAuthController::class, 'index']);