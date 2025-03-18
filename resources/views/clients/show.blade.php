@extends('layouts.template')

@section('content')
    <div class="container">
        <h1 class="my-4">Détails du Client</h1>
        <div class="card">
            <div class="card-body">
                <p><strong>Nom :</strong> {{ $client->nom }}</p>
                <p><strong>Email :</strong> {{ $client->email }}</p>
                <p><strong>Téléphone :</strong> {{ $client->telephone }}</p>
                <a href="{{ route('clients.index') }}" class="btn btn-secondary">Retour</a>
            </div>
        </div>
    </div>
@endsection