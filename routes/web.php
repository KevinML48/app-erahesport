<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DomainController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    
    Route::get('/domains', [DomainController::class, 'index'])->name('domains.index'); // Afficher tous les domaines
    Route::get('/domains/create', [DomainController::class, 'create'])->name('domains.create'); // Formulaire pour créer un domaine
    Route::post('/domains', [DomainController::class, 'store'])->name('domains.store'); // Enregistrer un domaine
    Route::get('/domains/{id}/edit', [DomainController::class, 'edit'])->name('domains.edit'); // Formulaire pour modifier un domaine
    Route::put('/domains/{id}', [DomainController::class, 'update'])->name('domains.update'); // Modifier un domaine
    Route::delete('/domains/{id}', [DomainController::class, 'destroy'])->name('domains.destroy'); // Supprimer un domaine

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
