<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Client;
use App\Models\Produit;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    public function index()
    {
        $commandes = Commande::with('client')->get();
        return view('commandes.index', compact('commandes'));
    }

    public function create()
    {
        $clients = Client::all();
        $produits = Produit::all();
        return view('commandes.create', compact('clients', 'produits'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'produits' => 'required|array',
            'produits.*' => 'exists:produits,id',
            'quantites' => 'required|array',
            'quantites.*' => 'integer|min:1'
        ]);

        $commande = Commande::create([
            'client_id' => $request->client_id
        ]);

        foreach ($request->produits as $index => $produit_id) {
            $commande->produits()->attach($produit_id, ['quantite' => $request->quantites[$index]]);
        }

        return redirect()->route('commandes.index')->with('success', 'Commande créée');
    }

    public function show(Commande $commande)
    {
        $commande->load('client', 'produits');
        return view('commandes.show', compact('commande'));
    }

    public function edit(Commande $commande)
    {
        $clients = Client::all();
        $produits = Produit::all();
        $commande->load('produits');
        return view('commandes.edit', compact('commande', 'clients', 'produits'));
    }

    public function update(Request $request, Commande $commande)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'produits' => 'required|array',
            'produits.*' => 'exists:produits,id',
            'quantites' => 'required|array',
            'quantites.*' => 'integer|min:1'
        ]);

        $commande->update(['client_id' => $request->client_id]);

        $commande->produits()->detach();
        foreach ($request->produits as $index => $produit_id) {
            $commande->produits()->attach($produit_id, ['quantite' => $request->quantites[$index]]);
        }

        return redirect()->route('commandes.index')->with('success', 'Commande mise à jour');
    }

    public function destroy(Commande $commande)
    {
        $commande->produits()->detach();
        $commande->delete();
        return redirect()->route('commandes.index')->with('success', 'Commande supprimée');
    }
}
