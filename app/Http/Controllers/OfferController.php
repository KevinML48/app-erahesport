<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Models\Position;
use App\Models\Domain;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index()
    {
        $offers = Offer::with(['position', 'domain'])->get();
        return view('offers.index', compact('offers'));
    }

    public function create()
    {
        $positions = Position::all();
        $domains = Domain::all();
        return view('offers.create', compact('positions', 'domains'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:open,closed,important',
            'position_id' => 'required|exists:positions,id',
            'domain_id' => 'required|exists:domains,id',
        ]);

        Offer::create($request->all());
        return redirect()->route('offers.index')->with('success', 'Offre créée avec succès.');
    }

    public function edit($id)
    {
        $offer = Offer::findOrFail($id);
        $positions = Position::all();
        $domains = Domain::all();
        return view('offers.edit', compact('offer', 'positions', 'domains'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:open,closed,important',
            'position_id' => 'required|exists:positions,id',
            'domain_id' => 'required|exists:domains,id',
        ]);

        $offer = Offer::findOrFail($id);
        $offer->update($request->all());
        return redirect()->route('offers.index')->with('success', 'Offre mise à jour avec succès.');
    }

    public function destroy($id)
    {
        $offer = Offer::findOrFail($id);
        $offer->delete();
        return redirect()->route('offers.index')->with('success', 'Offre supprimée avec succès.');
    }

    public function showAllOffers(Request $request)
    {
        $request->validate([
            'search' => 'nullable|string|max:25',
            'status' => 'nullable|array',
            'status.*' => 'in:open,closed,important',
            'domain' => 'nullable|array',
            'domain.*' => 'exists:domains,id'
        ]);

        $query = Offer::with('position', 'domain');

        if ($request->has('status')) {
            $statuses = $request->input('status');
            $query->whereIn('status', $statuses);
        }

        if ($request->has('domain')) {
            $domains = $request->input('domain');
            $query->whereIn('domain_id', $domains);
        }

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('description', 'LIKE', "%$search%")
                    ->orWhereHas('position', function ($q) use ($search) {
                        $q->where('name', 'LIKE', "%$search%");
                    });
            });
        }

        $offers = $query->get();
        $totalOffers = $offers->count();
        $domains = Domain::all();

        return view('offers.all', compact('offers', 'domains', 'totalOffers'));
    }
}