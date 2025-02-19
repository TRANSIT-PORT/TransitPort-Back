<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GestorController;
use App\Http\Controllers\OrdenController;
use App\Http\Controllers\TurnoController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware(['gestor'])->group(function () {
        Route::get('crearUsuario', [GestorController::class, 'crearUsuario'])->name('crearUsuario');
        Route::post('guardarUsuario', [GestorController::class, 'store'])->name('gestor.store');
        Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
    });

    Route::middleware(['administrativo'])->group(function () {
        Route::get('/crearOrden', [OrdenController::class, 'crearOpciones'])->name('crearOrden');
        Route::post('/guardarOrden', [OrdenController::class, 'guardarOrden'])->name('guardarOrden');
        Route::view('/crearTurno', 'Administrativo.crearTurno')->name('crearTurno');
        Route::post('/guardarTurno', [TurnoController::class, 'guardarTurno'])->name('guardarTurno');
        Route::view('/calendario', 'Administrativo.calendario')->name('calendario');
    });

    Route::middleware(['operador'])->group(function () {
        Route::get('/ordenes', [OrdenController::class, 'index'])->name('ordenes');
    });

});

require __DIR__.'/auth.php';
