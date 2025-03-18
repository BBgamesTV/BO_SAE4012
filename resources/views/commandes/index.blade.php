@extends('layouts.template')

@section('content')
<h2>Liste des Commandes <a href="{{ route('commandes.create') }}" class="btn btn-info btn-sm">+</a></h2>

<table class="table">
    <thead>
        <tr>
            <th>Client</th>
            <th>Produits</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($commandes as $commande)
        <tr>
            <td>{{ $commande->client->nom }}</td>
            <td>
                @foreach($commande->produits as $produit)
                    {{ $produit->nom }} (x{{ $produit->pivot->quantite }})<br>
                @endforeach
            </td>
            <td>
                <a href="{{ route('commandes.show', $commande) }}" class="btn btn-info btn-sm">Voir</a>
                <a href="{{ route('commandes.edit', $commande) }}" class="btn btn-warning btn-sm">Modifier</a>
                <form action="{{ route('commandes.destroy', $commande) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
