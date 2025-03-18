@extends('layouts.template')

@section('content')
<div class="container">
    <h2 class="mb-4">Détails du Produit</h2>

    <div class="card">
        <div class="row g-0">
            <!-- 📷 Image du produit -->
            <div class="col-md-4">
                <img src="{{ asset('storage/' . $produit->image) }}" class="img-fluid rounded-start" alt="Image du produit">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h3 class="card-title">{{ $produit->nom }}</h3>
                    <p class="card-text"><strong>Prix :</strong> {{ $produit->prix }} €</p>
                    <p class="card-text"><strong>Description :</strong> {{ $produit->description ?? 'Aucune description disponible' }}</p>
                    
                    <!-- Boutons d'actions -->
                    <a href="{{ route('produits.edit', $produit->id) }}" class="btn btn-info">Modifier</a>
                    
                    <form action="{{ route('produits.destroy', $produit->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>

                    <a href="{{ route('produits.index') }}" class="btn btn-custom mt-3">Retour à la liste</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
