<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DomainController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\MemberController;
use App\Models\Team;

Route::get('/', function () {
    $teams = Team::with('domain')->get(); 
    return view('welcome', compact('teams')); 
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    
    Route::get('/domains', [DomainController::class, 'index'])->name('domains.index'); 
    Route::get('/domains/create', [DomainController::class, 'create'])->name('domains.create'); 
    Route::post('/domains', [DomainController::class, 'store'])->name('domains.store'); 
    Route::get('/domains/{id}/edit', [DomainController::class, 'edit'])->name('domains.edit'); 
    Route::put('/domains/{id}', [DomainController::class, 'update'])->name('domains.update'); 
    Route::delete('/domains/{id}', [DomainController::class, 'destroy'])->name('domains.destroy'); 

    Route::get('/teams', [TeamController::class, 'index'])->name('teams.index');
    Route::get('/teams/create', [TeamController::class, 'create'])->name('teams.create');
    Route::post('/teams', [TeamController::class, 'store'])->name('teams.store');
    Route::get('/teams/{id}/edit', [TeamController::class, 'edit'])->name('teams.edit');
    Route::put('/teams/{id}', [TeamController::class, 'update'])->name('teams.update');
    Route::delete('/teams/{id}', [TeamController::class, 'destroy'])->name('teams.destroy');

    Route::get('/positions', [PositionController::class, 'index'])->name('positions.index');
    Route::get('/positions/create', [PositionController::class, 'create'])->name('positions.create');
    Route::post('/positions', [PositionController::class, 'store'])->name('positions.store');
    Route::get('/positions/{position}/edit', [PositionController::class, 'edit'])->name('positions.edit');
    Route::put('/positions/{position}', [PositionController::class, 'update'])->name('positions.update');
    Route::delete('/positions/{position}', [PositionController::class, 'destroy'])->name('positions.destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('members', [MemberController::class, 'index'])->name('members.index'); // Liste des membres
    Route::get('members/create', [MemberController::class, 'create'])->name('members.create'); // Formulaire de création
    Route::post('members', [MemberController::class, 'store'])->name('members.store'); // Enregistrer un membre
    Route::get('members/{member}/edit', [MemberController::class, 'edit'])->name('members.edit'); // Formulaire d'édition
    Route::put('members/{member}', [MemberController::class, 'update'])->name('members.update'); // Mise à jour du membre
    Route::delete('members/{member}', [MemberController::class, 'destroy'])->name('members.destroy'); // Suppression du membre
});

require __DIR__.'/auth.php';
