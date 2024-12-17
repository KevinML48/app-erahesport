<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Player;
use App\Models\Member;
use App\Models\Team;
use App\Models\Domain;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function index()
    {
        $players = Player::with('member', 'team', 'domain')->get();
        return view('players.index', compact('players'));
    }

    public function create()
    {
        $members = Member::all();
        $teams = Team::all();
        $domains = Domain::all();
        return view('players.create', compact('members', 'teams', 'domains'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'member_id' => 'required|exists:members,id',
            'team_id' => 'nullable|exists:teams,id',
            'domain_id' => 'nullable|exists:domains,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('players', 'public');
        }

        Player::create([
            'member_id' => $request->member_id,
            'team_id' => $request->team_id,
            'domain_id' => $request->domain_id,
            'image' => $imagePath,
        ]);

        return redirect()->route('players.index')->with('success', 'Joueur créé avec succès.');
    }

    public function edit(Player $player)
    {
        $members = Member::all();
        $teams = Team::all();
        $domains = Domain::all();
        return view('players.edit', compact('player', 'members', 'teams', 'domains'));
    }

    public function update(Request $request, Player $player)
    {
        $request->validate([
            'member_id' => 'required|exists:members,id',
            'team_id' => 'nullable|exists:teams,id',
            'domain_id' => 'nullable|exists:domains,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($player->image) {
                \Storage::delete('public/' . $player->image);
            }
            $player->image = $request->file('image')->store('players', 'public');
        }

        $player->update([
            'member_id' => $request->member_id,
            'team_id' => $request->team_id,
            'domain_id' => $request->domain_id,
            'image' => $player->image,
        ]);

        return redirect()->route('players.index')->with('success', 'Joueur mis à jour avec succès.');
    }

    public function destroy(Player $player)
    {
        if ($player->image) {
            \Storage::delete('public/' . $player->image);
        }
        $player->delete();
        return redirect()->route('players.index')->with('success', 'Joueur supprimé avec succès.');
    }
}