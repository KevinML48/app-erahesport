<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{
    // Afficher la liste des membres
    public function index()
    {
        $members = Member::all(); // Récupère tous les membres
        return view('members.index', compact('members')); // Affiche la vue de la liste
    }

    // Afficher le formulaire de création d'un membre
    public function create()
    {
        $positions = Position::all(); // Récupère toutes les positions disponibles
        return view('members.create', compact('positions')); // Affiche le formulaire de création
    }

    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'name' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'position_id' => 'required|exists:positions,id',
            'status' => 'required|in:signé,non signé',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation de l'image
        ]);

        // Si une image est uploadée
        if ($request->hasFile('image')) {
            // Stocker l'image dans le dossier 'members' et obtenir le chemin
            $imagePath = $request->file('image')->store('members', 'public');
        } else {
            // Si pas d'image, affecter null à la colonne 'image'
            $imagePath = null;
        }

        // Créer un nouveau membre avec les données soumises
        Member::create([
            'name' => $request->name,
            'prenom' => $request->prenom,
            'position_id' => $request->position_id,
            'status' => $request->status,
            'image' => $imagePath,  // Enregistrer le chemin de l'image
        ]);

        // Rediriger vers la liste des membres avec un message de succès
        return redirect()->route('members.index')->with('success', 'Membre ajouté avec succès!');
    }
    // Afficher le formulaire d'édition d'un membre
    public function edit(Member $member)
    {
        $positions = Position::all(); // Récupère toutes les positions disponibles
        return view('members.edit', compact('member', 'positions')); // Affiche le formulaire d'édition
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'position_id' => 'required|exists:positions,id',
            'status' => 'required|in:signé,non signé',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $member = Member::findOrFail($id);

        // Si une nouvelle image est uploadée
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($member->image) {
                Storage::delete('public/' . $member->image);
            }

            // Stocker la nouvelle image
            $imagePath = $request->file('image')->store('members', 'public');
        } else {
            // Garder l'ancienne image si aucune nouvelle image n'est uploadée
            $imagePath = $member->image;
        }

        // Mettre à jour le membre avec les nouvelles données
        $member->update([
            'name' => $request->name,
            'prenom' => $request->prenom,
            'position_id' => $request->position_id,
            'status' => $request->status,
            'image' => $imagePath, // Met à jour le chemin de l'image
        ]);

        return redirect()->route('members.index')->with('success', 'Membre mis à jour avec succès!');
    }

    // Supprimer un membre
    public function destroy($id)
    {
        $member = Member::findOrFail($id);
    
        // Vérifiez si l'image existe et supprimez-la si nécessaire
        if ($member->image && Storage::exists('public/' . $member->image)) {
            Storage::delete('public/' . $member->image);
        }
    
        $member->delete();
    
        return redirect()->route('members.index')->with('success', 'Membre supprimé avec succès.');
    }
}