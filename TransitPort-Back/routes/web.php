<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/operador/ordenes', [DashboardController::class, 'ordenes']);
Route::get('/operador/perfil', [DashboardController::class, 'perfil']);
Route::get('/operador/notificaciones', [DashboardController::class, 'notificaciones']);
