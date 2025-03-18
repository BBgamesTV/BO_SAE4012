@extends('layouts.template')

@section('content')
<h2>Ajouter un Produit</h2>

<form action="{{ route('produits.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label>Nom</label>
        <input type="text" name="nom" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control"></textarea>
    </div>
    <div class="mb-3">
        <label>Prix (€)</label>
        <input type="number" step="0.01" name="prix" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Image</label>
        <input type="file" name="image" class="form-control">
    </div>
    <button class="btn btn-success">Ajouter</button>
</form>
@endsection
