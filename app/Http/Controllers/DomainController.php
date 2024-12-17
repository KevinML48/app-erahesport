<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Domain;

class DomainController extends Controller
{
    // Lire tous les domaines et les afficher sur une page
    public function index()
    {
        $domains = Domain::all();
        return view('domains.index', compact('domains')); // Vue index
    }

    // Afficher le formulaire pour créer un domaine
    public function create()
    {
        return view('domains.create'); // Vue create
    }

    // Enregistrer un nouveau domaine
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Domain::create($request->only('name'));
        return redirect()->route('domains.index')->with('success', 'Domain created successfully!');
    }

    // Afficher le formulaire pour modifier un domaine
    public function edit($id)
    {
        $domain = Domain::findOrFail($id);
        return view('domains.edit', compact('domain')); // Vue edit
    }

    // Mettre à jour un domaine existant
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $domain = Domain::findOrFail($id);
        $domain->update($request->only('name'));

        return redirect()->route('domains.index')->with('success', 'Domain updated successfully!');
    }

    // Supprimer un domaine
    public function destroy($id)
    {
        $domain = Domain::findOrFail($id);
        $domain->delete();

        return redirect()->route('domains.index')->with('success', 'Domain deleted successfully!');
    }
}