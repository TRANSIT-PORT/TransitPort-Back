<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GestorController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::get('/gestor', [GestorController::class, 'index']);

Route::put('/gestor/actualizar/{id}', [GestorController::class, 'update']);

Route::post('/gestor/guardar', [GestorController::class, 'store']);

Route::delete('/gestor/borrar/{id}', [GestorController::class, 'destroy']);

Route::get('/gestor/buscar/{id}', [GestorController::class, 'show']);
