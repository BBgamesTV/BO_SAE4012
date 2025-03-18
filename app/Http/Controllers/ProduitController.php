<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProduitController extends Controller
{
    public function index()
    {
        $produits = Produit::all();
        return view('produits.index', compact('produits'));
    }

    public function create()
    {
        return view('produits.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'prix' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $produit = new Produit($request->except('image'));

        if ($request->hasFile('image')) {
            $produit->image = $request->file('image')->store('produits', 'public');
        }

        $produit->save();

        return redirect()->route('produits.index')->with('success', 'Produit ajouté avec succès');
    }

    public function show(Produit $produit)
    {
        return view('produits.show', compact('produit'));
    }

    public function edit(Produit $produit)
    {
        return view('produits.edit', compact('produit'));
    }

    public function update(Request $request, Produit $produit)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'prix' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $produit->update($request->except('image'));

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($produit->image);
            $produit->image = $request->file('image')->store('produits', 'public');
        }

        $produit->save();

        return redirect()->route('produits.index')->with('success', 'Produit mis à jour');
    }

    public function destroy(Produit $produit)
    {
        Storage::disk('public')->delete($produit->image);
        $produit->delete();
        return redirect()->route('produits.index')->with('success', 'Produit supprimé');
    }
}

