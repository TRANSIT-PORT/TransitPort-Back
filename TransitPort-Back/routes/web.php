<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GestorController;
use App\Models\Gestor;

Route::get('/', function () {
    return view('operador/welcome');
});

Route::get('/operador/ordenes', [DashboardController::class, 'ordenes']);
Route::get('/operador/perfil', [DashboardController::class, 'perfil']);
Route::get('/operador/notificaciones', [DashboardController::class, 'notificaciones']);

Route::get('/gestor/crearUsuario', [GestorController::class, 'crearUsuario']);
Route::get('/gestor/crearGrua', [GestorController::class, 'crearGrua']);
