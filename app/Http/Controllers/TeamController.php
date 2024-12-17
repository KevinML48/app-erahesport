<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\Domain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    // Afficher toutes les équipes
public function index()
{
    $teams = Team::all(); // Récupère toutes les équipes
    return view('teams.index', compact('teams')); // Passe les équipes à la vue
}

// Créer une nouvelle équipe
public function create()
{
    // Chargez tous les domaines depuis la base de données
    $domains = Domain::all();

    // Retournez la vue de création d'équipe en passant les domaines
    return view('teams.create', compact('domains'));
}

// Enregistrer une équipe
public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'domain_id' => 'required|exists:domains,id', // Assure-toi que le domaine existe
    ]);

    $team = new Team();
    $team->name = $request->input('name');
    $team->description = $request->input('description');
    $team->domain_id = $request->input('domain_id');

    // Traitement de l'image
    if ($request->hasFile('image')) {
        $team->image = $request->file('image')->store('teams', 'public'); // Stocke l'image dans le dossier 'public/teams'
    }

    $team->save(); // Sauvegarde l'équipe dans la base de données

    return redirect()->route('teams.index')->with('success', 'Équipe créée avec succès.');
}

// Modifier une équipe
public function edit($id)
{
    $team = Team::findOrFail($id); // Récupère l'équipe par son ID
    $domains = Domain::all(); // Récupère tous les domaines disponibles

    return view('teams.edit', compact('team', 'domains')); // Passe à la vue l'équipe et les domaines
}

// Mettre à jour une équipe
public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'domain_id' => 'required|exists:domains,id', // Assure-toi que le domaine existe
    ]);

    $team = Team::findOrFail($id);
    $team->name = $request->input('name');
    $team->description = $request->input('description');
    $team->domain_id = $request->input('domain_id');

    // Traitement de l'image
    if ($request->hasFile('image')) {
        // Si une nouvelle image est téléchargée, on remplace l'ancienne
        $team->image = $request->file('image')->store('teams', 'public');
    }

    $team->save(); // Sauvegarde les modifications dans la base de données

    return redirect()->route('teams.index')->with('success', 'Équipe mise à jour avec succès.');
}

// Supprimer une équipe
public function destroy($id)
{
    $team = Team::findOrFail($id);
    $team->delete(); // Supprime l'équipe de la base de données

    return redirect()->route('teams.index')->with('success', 'Équipe supprimée avec succès.');
}

}