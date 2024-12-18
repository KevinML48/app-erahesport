<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Domain;
use App\Models\Position;
use Illuminate\Http\Request;
use App\Mail\ApplicationConfirmation;
use App\Mail\ApplicationAccepted;
use App\Mail\ApplicationRejected;
use Illuminate\Support\Facades\Mail;

class ApplicationController extends Controller
{
    public function index()
    {
        $applications = Application::all(); // Candidatures non validées
        $acceptedApplications = Application::where('status', 'validée')->get(); // Candidatures validées
    
        return view('applications.index', compact('applications', 'acceptedApplications'));
    }

    public function show($first_name)
    {
        // Récupération par first_name
        $application = Application::where('first_name', $first_name)->first();
    
        // Si aucune correspondance, renvoyer une erreur 404
        if (!$application) {
            abort(404, 'Candidature introuvable');
        }
    
        // Retourner la vue avec l'application
        return view('applications.show', compact('application'));
    }
    

    public function store(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:applications,email',
            'description' => 'required|string',
            'domain_id' => 'required|exists:domains,id',
            'position_id' => 'required|exists:positions,id',
        ]);
    
        // Création de la candidature
        $application = Application::create($validated);
    
        // Envoi d'un email de confirmation
        Mail::to($application->email)->send(new ApplicationConfirmation($application));
    
        // Redirection vers la page de confirmation
        return redirect()->route('applications.confirmation')
            ->with('success', 'Votre candidature a bien été envoyée. Un email de confirmation a été envoyé.');
    }


    // Supprimer une candidature
    public function destroy($id)
    {
        // Trouver la candidature par son ID
        $application = Application::findOrFail($id);

        // Supprimer la candidature
        $application->delete();

        // Rediriger avec un message de succès
        return redirect()->route('applications.index')->with('success', 'Candidature supprimée');
    }

public function accept($id)
{
    $application = Application::findOrFail($id);

    // Mettre à jour le statut de la candidature
    $application->status = 'validée';
    $application->save();

    // Rediriger vers la liste des candidatures
    return redirect()->route('applications.index')->with('status', 'Candidature acceptée');
}

    protected function destroyMail(Application $application)
    {
        // Envoyer un e-mail pour notifier le rejet
        Mail::to($application->email)->send(new ApplicationRejected($application));
    }

    public function ShowCandidature($id)
    {
        // Récupérer l'application par son ID avec les relations 'position' et 'domain'
        $application = Application::with(['position', 'domain'])->findOrFail($id);
        
        // Passer l'application à la vue
        return view('applications.showcandidatures', compact('application'));
    }  

    public function confirmation()
{
    // Récupérer les données de la dernière candidature depuis la session
    $application = session('last_application');

    if (!$application) {
        return redirect()->route('applications.index')
            ->with('error', 'Aucune candidature à afficher.');
    }

    // Retourner la vue avec les détails de la candidature
    return view('applications.confirmation', compact('application'));
}
}
