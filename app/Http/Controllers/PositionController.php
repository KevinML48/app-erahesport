<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    // Afficher toutes les positions
    public function index()
    {
        $positions = Position::all(); // Récupérer toutes les positions
        return view('positions.index', compact('positions')); // Afficher dans la vue
    }

    // Afficher le formulaire pour créer une nouvelle position
    public function create()
    {
        return view('positions.create');
    }

    // Enregistrer une nouvelle position
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Position::create([
            'name' => $request->name,
        ]);

        return redirect()->route('positions.index')->with('success', 'Position créée avec succès');
    }

    // Afficher le formulaire pour éditer une position
    public function edit(Position $position)
    {
        return view('positions.edit', compact('position'));
    }

    // Mettre à jour la position
    public function update(Request $request, Position $position)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $position->update([
            'name' => $request->name,
        ]);

        return redirect()->route('positions.index')->with('success', 'Position mise à jour avec succès');
    }

    // Supprimer une position
    public function destroy(Position $position)
    {
        $position->delete();

        return redirect()->route('positions.index')->with('success', 'Position supprimée avec succès');
    }
}
