<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DomainController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\PropositionController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\ApplicationController;
use App\Models\Team;

Route::get('/application/user/{id}', [ApplicationController::class, 'showUser'])->name('application.showUser');
Route::post('/applications/{id}/accept', [ApplicationController::class, 'accept'])->name('applications.accept');

Route::get('/offers/all', [OfferController::class, 'showAllOffers'])->name('offers.all');
Route::get('/offers/filter', [OfferController::class, 'showAllOffers'])->name('offers.filter');

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

    Route::get('/players', [PlayerController::class, 'index'])->name('players.index'); // Liste des joueurs
    Route::get('/players/create', [PlayerController::class, 'create'])->name('players.create'); // Formulaire de création
    Route::post('/players', [PlayerController::class, 'store'])->name('players.store'); // Enregistrement
    Route::get('/players/{player}/edit', [PlayerController::class, 'edit'])->name('players.edit'); // Formulaire d'édition
    Route::put('/players/{player}', [PlayerController::class, 'update'])->name('players.update'); // Mise à jour
    Route::delete('/players/{player}', [PlayerController::class, 'destroy'])->name('players.destroy'); // Suppression

    Route::get('/offers', [OfferController::class, 'index'])->name('offers.index'); // Liste des offres
    Route::get('/offers/create', [OfferController::class, 'create'])->name('offers.create'); // Formulaire de création
    Route::post('/offers', [OfferController::class, 'store'])->name('offers.store'); // Enregistrement
    Route::get('/offers/{offer}/edit', [OfferController::class, 'edit'])->name('offers.edit'); // Formulaire d'édition
    Route::put('/offers/{offer}', [OfferController::class, 'update'])->name('offers.update'); // Mise à jour
    Route::delete('/offers/{offer}', [OfferController::class, 'destroy'])->name('offers.destroy'); // Suppression
});

Route::get('/proposition', [PropositionController::class, 'index'])->name('proposition.index');

Route::get('/team/{id}', [TeamController::class, 'show'])->name('team.show');

Route::get('/informations', [InformationController::class, 'index'])->name('informations.page');

Route::get('/applications/create', [ApplicationController::class, 'create'])->name('applications.create');
Route::post('/applications', [ApplicationController::class, 'store'])->name('applications.store');

require __DIR__.'/auth.php';
