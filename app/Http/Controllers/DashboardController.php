<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Player;
use App\Models\Application;

class DashboardController extends Controller
{
    public function index()
    {
        // Récupérer les 5 derniers membres, triés par la date de création décroissante
        $members = Member::orderBy('created_at', 'desc')->take(5)->get();
        $applicationsCount = Application::count(); // Nombre d'applications
        $playersCount = \App\Models\Player::count(); // Nombre de joueurs
    
        return view('dashboard', compact('members', 'applicationsCount', 'playersCount'));
    }
    

    public function getDashboardStats()
    {
        $applicationsCount = Application::count(); // Nombre d'applications
        $membersCount = Member::count(); // Nombre de membres
        $playersCount = \App\Models\Player::count(); // Nombre de joueurs
    
        return response()->json([
            'applicationsCount' => $applicationsCount,
            'membersCount' => $membersCount,
            'playersCount' => $playersCount,  // Ajout du nombre de joueurs
        ]);
    }
}
