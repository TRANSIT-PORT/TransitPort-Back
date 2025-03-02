<?php

use App\Http\Controllers\AdministrativoController;
use App\Http\Controllers\ContenedorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GestorController;
use App\Http\Controllers\IncidenciaController;
use App\Http\Controllers\OperadorController;
use App\Http\Controllers\OrdenController;
use App\Http\Controllers\TieneController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\OrdenesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GruaController;
use App\Http\Controllers\ZonaController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::post('/login', [AuthController::class, 'login']);

Route::get('/gestor', [GestorController::class, 'index']);

Route::put('/gestor/actualizar/{id}', [GestorController::class, 'update']);

Route::post('/gestor/guardar', [GestorController::class, 'store']);

Route::delete('/gestor/borrar/{id}', [GestorController::class, 'destroy']);

Route::get('/gestor/buscar/{id}', [GestorController::class, 'show']);

//Administrativo
Route::get('/administrativo', [AdministrativoController::class, 'index']);

//Operador
Route::get('/operador', [OperadorController::class, 'index']);

//Ordenes
Route::get('/operador/ordenes', [OrdenesController::class, 'index']);

Route::get('/orden', [OrdenController::class, 'index']);


Route::get('/auditoriaArriba', [OrdenController::class, 'verAuditoria']);
Route::get('/auditoriaAbajo', [OrdenController::class, 'verOrden']);

Route::get('/visualizarAuditoria', [OrdenController::class, 'visualizarAuditoria']);


//Contenedores
Route::get('/contenedor', [ContenedorController::class, 'index']);


//Tiene
Route::get('/tiene', [TieneController::class, 'index']);


//Incidencia
Route::get('/incidencia', [IncidenciaController::class, 'index']);

Route::put('/incidencia/actualizar/{id}', [IncidenciaController::class, 'update']);

Route::post('/incidencia/{id}', [IncidenciaController::class, 'store']);

Route::post('/incidencia', [IncidenciaController::class, 'store']);

Route::delete('/incidencia/borrar/{id}', [IncidenciaController::class, 'destroy']);

Route::get('/incidencia/buscar/{id}', [IncidenciaController::class, 'show']);
