<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GestorController;
use App\Http\Controllers\OrdenController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('operador/welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('crearUsuario', [GestorController::class, 'crearUsuario'])->name('crearUsuario');

Route::get('crearOrden', [OrdenController::class, 'crearOpciones']) -> name('crearOrden');
Route::post('guardarOrden', [OrdenController::class, 'guardarOrden']) -> name('guardarOrden');

Route::get('crearGrua', [OrdenController::class, 'crearGrua']) -> name('crearGrua');
Route::post('guardarGrua', [OrdenController::class, 'guardarGrua']) -> name('guardarGrua');

require __DIR__.'/auth.php';
