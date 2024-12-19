<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{

     /**
     * Display the login view.
     */
    public function create(): RedirectResponse
    {
        // Redirige directement vers la page d'accueil ou une autre route
        return redirect('/');
    }

    /**
     * Afficher la vue de connexion avec vérification du token.
     */
    public function createWithToken($token): View|RedirectResponse
    {
        // Définir le token valide
        $validToken = 'erah'; // Remplacez cela par votre token

        // Vérifiez si le token passé dans l'URL est valide
        if ($token === $validToken) {
            // Si le token est valide, affichez la vue de connexion
            return view('auth.login');
        }

        // Si le token est invalide, redirigez l'utilisateur vers une autre page (par exemple, la page d'accueil)
        return redirect('/');
    }

    /**
     * Gérer une demande d'authentification.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(route('dashboard', absolute: false));
    }

    /**
     * Détruire une session authentifiée.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
