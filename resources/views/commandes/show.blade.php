@extends('layouts.template')

@section('content')
<div class="container">
    <h1>Détails de la commande</h1>
    <p><strong>Client :</strong> {{ $commande->client->nom }}</p>
    <h2>Produits commandés</h2>
    <ul>
        @foreach ($commande->produits as $produit)
            <li>
                <img src="{{ asset('storage/' . $produit->image) }}" width="100" alt="{{ $produit->nom }}">
                {{ $produit->nom }} - Quantité : {{ $produit->pivot->quantite }}
            </li>
        @endforeach
    </ul>
    <a href="{{ route('commandes.index') }}" class="btn btn-primary">Retour</a>
</div>
@endsection