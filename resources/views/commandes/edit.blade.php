@extends('layouts.template')

@section('content')
<div class="container">
    <h1>Modifier la commande</h1>
    <form action="{{ route('commandes.update', $commande) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="client_id">Client :</label>
        <select name="client_id" required>
            @foreach ($clients as $client)
                <option value="{{ $client->id }}" {{ $commande->client_id == $client->id ? 'selected' : '' }}>{{ $client->nom }}</option>
            @endforeach
        </select>

        <h2>Produits</h2>
        <div id="produits-container">
            @foreach ($commande->produits as $produit)
                <div class="produit-group">
                    <select name="produits[]" required>
                        @foreach ($produits as $p)
                            <option value="{{ $p->id }}" {{ $produit->id == $p->id ? 'selected' : '' }}>{{ $p->nom }}</option>
                        @endforeach
                    </select>
                    <input type="number" name="quantites[]" min="1" required value="{{ $produit->pivot->quantite }}">
                    <button type="button" class="remove-produit" onclick="supprimerProduit(this)">X</button>
                </div>
            @endforeach
        </div>
        <button type="button" onclick="ajouterProduit()">Ajouter un produit</button>
        <button type="submit">Mettre à jour</button>
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