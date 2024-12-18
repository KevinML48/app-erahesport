<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Domain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PropositionController extends Controller
{
    /**
     * Affiche la vue des propositions avec les données nécessaires.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        try {
            $validated = $request->validate([
                'email' => 'nullable|email',
                'position_id' => 'nullable|integer|exists:positions,id',
                'domain_id' => 'nullable|integer|exists:domains,id',
            ]);

            $email = $validated['email'] ?? null;
            $positionId = $validated['position_id'] ?? null;
            $domainId = $validated['domain_id'] ?? null;

            $offers = Offer::with(['position', 'domain'])->get();
            $domains = Domain::all();

            $positions = $offers->pluck('position')->unique();

            return view('proposition', compact('offers', 'domains', 'positions', 'email', 'positionId', 'domainId'));
        } catch (\Exception $e) {
            Log::error('Erreur lors de la récupération des propositions : ' . $e->getMessage());

            return abort(500, 'Une erreur est survenue.');
        }
    }
}
