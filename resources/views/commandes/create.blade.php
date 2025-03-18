@extends('layouts.template')

@section('content')
<div class="container">
    <h1>Créer une commande</h1>
    <form action="{{ route('commandes.store') }}" method="POST">
        @csrf
        <label for="client_id">Client :</label>
        <select name="client_id" required>
            @foreach ($clients as $client)
                <option value="{{ $client->id }}">{{ $client->nom }}</option>
            @endforeach
        </select>

        <h2>Produits</h2>
        <div id="produits-container">
            <div class="produit-group">
                <select name="produits[]" required>
                    @foreach ($produits as $produit)
                        <option value="{{ $produit->id }}">{{ $produit->nom }}</option>
                    @endforeach
                </select>
                <input type="number" name="quantites[]" min="1" required placeholder="Quantité">
                <button type="button" class="remove-produit" onclick="supprimerProduit(this)">X</button>
            </div>
        </div>
        <button type="button" onclick="ajouterProduit()">Ajouter un produit</button>
        <button type="submit">Créer</button>
    </form>
</div>
<script>
function ajouterProduit() {
    let container = document.getElementById('produits-container');
    let newGroup = container.firstElementChild.cloneNode(true);
    newGroup.querySelector('input').value = '';
    container.appendChild(newGroup);
}
function supprimerProduit(button) {
    let container = document.getElementById('produits-container');
    if (container.children.length > 1) {
        button.parentElement.remove();
    }
}
</script>
@endsection