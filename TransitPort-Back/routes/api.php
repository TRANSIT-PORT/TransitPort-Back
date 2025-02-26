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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

//Login y Logout

Route::post('/login', [AuthController::class, 'login']);

//

Route::get('/usuario', [UsuarioController::class, 'index']);

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

Route::put('operador/ordenes/orden/{id}', [OrdenController::class, 'update']);

Route::post('/orden/guardar', [OrdenController::class, 'store']);

Route::delete('/orden/borrar/{id}', [OrdenController::class, 'destroy']);

Route::get('/orden/buscar/{id}', [OrdenController::class, 'show']);

//Contenedores
Route::get('/contenedor', [ContenedorController::class, 'index']);

Route::put('/contenedor/actualizar/{id}', [ContenedorController::class, 'update']);

Route::post('/contenedor/guardar', [ContenedorController::class, 'store']);

Route::delete('/contenedor/borrar/{id}', [ContenedorController::class, 'destroy']);

Route::get('/contenedor/buscar/{id}', [ContenedorController::class, 'show']);


//Tiene
Route::get('/tiene', [TieneController::class, 'index']);

Route::put('/tiene/actualizar/{id}', [TieneController::class, 'update']);

Route::post('/tiene/guardar', [TieneController::class, 'store']);

Route::delete('/tiene/borrar/{id}', [TieneController::class, 'destroy']);

Route::get('/tiene/buscar/{id}', [TieneController::class, 'show']);


//Incidencia
Route::get('/incidencia', [IncidenciaController::class, 'index']);

Route::put('/incidencia/actualizar/{id}', [IncidenciaController::class, 'update']);

Route::post('/incidencia/{id}', [IncidenciaController::class, 'store']);

Route::post('/incidencia', [IncidenciaController::class, 'store']);

Route::delete('/incidencia/borrar/{id}', [IncidenciaController::class, 'destroy']);

Route::get('/incidencia/buscar/{id}', [IncidenciaController::class, 'show']);

