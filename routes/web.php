<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ConsultorController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('empresas', EmpresaController::class);
    Route::resource('agendas', AgendaController::class);

    Route::get('/consultores', [ConsultorController::class, 'index'])->name('consultores.index');
    Route::post('/consultores', [ConsultorController::class, 'store'])->name('consultores.store');
    Route::get('/consultores/{consultore}/edit', [ConsultorController::class, 'edit'])->name('consultores.edit');
    Route::put('/consultores/{consultore}', [ConsultorController::class, 'update'])->name('consultores.update');
    Route::delete('/consultores/{consultore}', [ConsultorController::class, 'destroy'])->name('consultores.destroy');

    Route::get('/enviar-agendas', function() {
        return view('enviar-agendas.index');
    })->name('enviar-agendas.index');
});

require __DIR__.'/auth.php';