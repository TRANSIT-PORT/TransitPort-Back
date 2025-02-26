<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GestorController;
use App\Http\Controllers\OrdenController;
use App\Http\Controllers\TurnoController;
use App\Http\Controllers\UsuarioController;
use App\Models\Turno;
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

    Route::middleware(['gestor'])->group(function () {
        Route::get('/crearUsuario', [GestorController::class, 'crearUsuario'])->name('crearUsuario');
        Route::post('/guardarUsuario', [GestorController::class, 'guardarUsuario'])->name('guardarUsuario');
        Route::get('/crearPatio', [GestorController::class, 'crearPatio'])->name('crearPatio');
        Route::get('/crearGrua', [GestorController::class, 'crearGrua'])->name('crearGrua');
        Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
    });

    Route::middleware(['administrativo'])->group(function () {
        Route::get('/crearOrden', [OrdenController::class, 'crearOpciones'])->name('crearOrden');
        Route::post('/guardarOrden', [OrdenController::class, 'guardarOrden'])->name('guardarOrden');
        Route::view('/crearTurno', 'Administrativo.crearTurno')->name('crearTurno');
        Route::post('/guardarTurno', [TurnoController::class, 'guardarTurno'])->name('guardarTurno');
        Route::view('/calendario', 'Administrativo.calendario')->name('calendario');

        Route::get('/asignarTurno', [TurnoController::class, 'crearOpciones'])->name('asignarTurno');
        Route::post('/actualziarTurno', [TurnoController::class, 'actualizarTurno']) -> name('actualizarTurno');

        Route::view('/verAuditoria', 'Administrativo.Auditorias.verAuditoria') -> name('verAuditoria');
        Route::get('/recogerAuditoria', [OrdenController::class, 'visualizarAuditoria']) -> name('recogerAuditoria');
        Route::get('/verAuditoria/{id}', [OrdenController::class, 'mostrarUno']) -> name('mostrarAuditoria');
    });

    Route::middleware(['operador'])->group(function () {
        Route::get('/ordenes', [OrdenController::class, 'index'])->name('ordenes');
    });
});

require __DIR__.'/auth.php';
