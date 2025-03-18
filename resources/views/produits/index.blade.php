@extends('layouts.template')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Liste des Produits</h2>
    <a href="{{ route('produits.create') }}" class="btn btn-primary">Ajouter un Produit</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-striped">
    <thead>
        <tr>
            <th>Image</th>
            <th>Nom</th>
            <th>Prix</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($produits as $produit)
        <tr>
            <td><img src="{{ asset('storage/' . $produit->image) }}" width="100"></td>
            <td>{{ $produit->nom }}</td>
            <td>{{ number_format($produit->prix, 2) }} €</td>
            <td>
                <a href="{{ route('produits.show', $produit) }}" class="btn btn-info btn-sm">Voir</a>
                <a href="{{ route('produits.edit', $produit) }}" class="btn btn-warning btn-sm">Modifier</a>
                <form action="{{ route('produits.destroy', $produit) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
