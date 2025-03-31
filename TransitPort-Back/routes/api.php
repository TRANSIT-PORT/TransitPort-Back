<?php

use App\Http\Controllers\AdministrativoController;
use App\Http\Controllers\ContenedorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GestorController;
use App\Http\Controllers\IncidenciaController;
use App\Http\Controllers\OperadorController;
use App\Http\Controllers\OrdenController;
use App\Http\Controllers\TieneBuqueController;
use App\Http\Controllers\TieneTrainController;
use App\Http\Controllers\TieneTruckController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\OrdenesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GruaController;
use App\Http\Controllers\BuqueController;
use App\Http\Controllers\ZonaController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::post('/login', [AuthController::class, 'login']);

//Gestor

Route::get('/gestor', [GestorController::class, 'index']);

Route::put('/gestor/actualizar/{id}', [GestorController::class, 'update']);

Route::post('/gestor/guardar', [GestorController::class, 'store']);

Route::delete('/gestor/borrar/{id}', [GestorController::class, 'destroy']);

Route::get('/gestor/buscar/{id}', [GestorController::class, 'show']);

Route::put('/modificar-estado/{id}', [UsuarioController::class, 'modificarEstado']);


//Administrativo
Route::get('/administrativo', [AdministrativoController::class, 'index']);

//Operador
Route::get('/operador', [OperadorController::class, 'index']);

Route::get('/operador/notificaciones', [OperadorController::class, 'verNotificaciones']);

//Ordenes
Route::get('/operador/ordenes', [OrdenesController::class, 'index']);

Route::get('/orden', [OrdenController::class, 'index']);

Route::put('orden/actualizar/{id}', [OrdenController::class, 'update']);

Route::put('operador/ordenes/orden/{id}', [OrdenController::class, 'actualizarEstado']);

Route::post('/orden/guardar', [OrdenController::class, 'store']);

Route::delete('/orden/borrar/{id}', [OrdenController::class, 'destroy']);

Route::get('/orden/buscar/{id}', [OrdenController::class, 'show']);

//Contenedores
Route::get('/contenedor', [ContenedorController::class, 'index']);

Route::put('/contenedor/actualizar/{id}', [ContenedorController::class, 'update']);

Route::post('/contenedor/guardar', [ContenedorController::class, 'store']);

Route::delete('/contenedor/borrar/{id}', [ContenedorController::class, 'destroy']);

Route::get('/contenedor/buscar/{id}', [ContenedorController::class, 'show']);


//TieneBuque
Route::get('/tiene-buque', [TieneBuqueController::class, 'index']);

Route::put('/tiene-buque/actualizar/{id}', [TieneBuqueController::class, 'update']);

Route::post('/tiene-buque/guardar', [TieneBuqueController::class, 'store']);

Route::delete('/tiene-buque/borrar/{id}', [TieneBuqueController::class, 'destroy']);

Route::get('/tiene-buque/buscar/{id}', [TieneBuqueController::class, 'show']);

//TieneTrain
Route::get('/tiene-train', [TieneTrainController::class, 'index']);

Route::put('/tiene-train/actualizar/{id}', [TieneTrainController::class, 'update']);

Route::post('/tiene-train/guardar', [TieneTrainController::class, 'store']);

Route::delete('/tiene-train/borrar/{id}', [TieneTrainController::class, 'destroy']);

Route::get('/tiene-train/buscar/{id}', [TieneTrainController::class, 'show']);

//TieneTruck
Route::get('/tiene-truck', [TieneTruckController::class, 'index']);

Route::put('/tiene-truck/actualizar/{id}', [TieneTruckController::class, 'update']);

Route::post('/tiene-truck/guardar', [TieneTruckController::class, 'store']);

Route::delete('/tiene-truck/borrar/{id}', [TieneTruckController::class, 'destroy']);

Route::get('/tiene-truck/buscar/{id}', [TieneTruckController::class, 'show']);


//Incidencia
Route::get('/incidencia', [IncidenciaController::class, 'index']);

Route::put('/incidencia/actualizar/{id}', [IncidenciaController::class, 'update']);

Route::post('/incidencia/{id}', [IncidenciaController::class, 'store']);

Route::post('/incidencia', [IncidenciaController::class, 'store']);

Route::delete('/incidencia/borrar/{id}', [IncidenciaController::class, 'destroy']);

Route::get('/incidencia/buscar/{id}', [IncidenciaController::class, 'show']);

//Buscar para actualizar.

Route::get('/grua/show/{id}', [GruaController::class, 'show']);
Route::get('/buque/show/{id}', [BuqueController::class, 'show']);
Route::get('/zona/show/{id}', [BuqueController::class, 'show']);
Route::get('/operador/show/{id}', [OperadorController::class, 'show']);

//Grúas
Route::get('/grua', [GruaController::class, 'index']);
Route::get('/zona', [ZonaController::class, 'index']);
Route::post('/asignar-grua', [GruaController::class, 'asignarGrua']);