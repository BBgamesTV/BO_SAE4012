@extends('layouts.template')

@section('content')
<div class="container">
    <h2 class="mb-4">Modifier le Produit</h2>

    <form action="{{ route('produits.update', $produit->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Nom du produit -->
        <div class="mb-3">
            <label for="nom" class="form-label">Nom du Produit</label>
            <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom', $produit->nom) }}" required>
        </div>

        <!-- Prix du produit -->
        <div class="mb-3">
            <label for="prix" class="form-label">Prix du Produit (€)</label>
            <input type="number" class="form-control" id="prix" name="prix" value="{{ old('prix', $produit->prix) }}" step="0.01" required>
        </div>

        <!-- Description du produit -->
        <div class="mb-3">
            <label for="description" class="form-label">Description du Produit</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $produit->description) }}</textarea>
        </div>

        <!-- Image du produit -->
        <div class="mb-3">
            <label for="image" class="form-label">Image du Produit</label>
            <input type="file" class="form-control" id="image" name="image">
            <small class="text-muted">Laisser vide si vous ne souhaitez pas changer l'image.</small>
        </div>

        @if ($produit->image)
        <!-- Affichage de l'image actuelle si elle existe -->
        <div class="mb-3">
            <label class="form-label">Image actuelle :</label>
            <img src="{{ asset('storage/' . $produit->image) }}" class="img-fluid" alt="Image actuelle du produit" style="max-width: 200px;">
        </div>
        @endif

        <!-- Boutons de soumission -->
        <div class="mb-3">
            <button type="submit" class="btn btn-success">Mettre à jour le Produit</button>
            <a href="{{ route('produits.index') }}" class="btn btn-secondary">Annuler</a>
        </div>
    </form>
</div>
@endsection
