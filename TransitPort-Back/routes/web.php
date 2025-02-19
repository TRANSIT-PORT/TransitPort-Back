<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GestorController;
use App\Http\Controllers\OrdenController;
use App\Http\Controllers\TurnoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['middleware' => 'gestor'], function(){

    Route::get('crearUsuario', [GestorController::class, 'crearUsuario'])->name('crearUsuario');
    Route::post('guardarUsuario', [GestorController::class, 'store'])->name('guardarUsuario');

});

Route::group(['middleware' => 'administrativo'], function(){

    Route::get('/crearOrden', [OrdenController::class, 'crearOpciones']) -> name('crearOrden');
    Route::post('/guardarOrden', [OrdenController::class, 'guardarOrden']) -> name('guardarOrden');

    Route::view('/crearTurno', 'Administrativo.crearTurno') -> name('crearTurno');
    Route::post('/guardarTurno', [TurnoController::class, 'guardarTurno']) -> name('guardarTurno');

    Route::view('/calendario', 'Administrativo.calendario') -> name('calendario');

});

require __DIR__.'/auth.php';
