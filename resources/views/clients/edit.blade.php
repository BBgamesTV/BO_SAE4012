@extends('layouts.template')


@section('content')
    <div class="container">
        <h1 class="my-4">Modifier Client</h1>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('clients.update', $client) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Nom :</label>
                        <input type="text" name="nom" class="form-control" value="{{ $client->nom }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email :</label>
                        <input type="email" name="email" class="form-control" value="{{ $client->email }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Téléphone :</label>
                        <input type="text" name="telephone" class="form-control" value="{{ $client->telephone }}">
                    </div>
                    <button type="submit" class="btn btn-warning">Modifier</button>
                    <a href="{{ route('clients.index') }}" class="btn btn-secondary">Annuler</a>
                </form>
            </div>
        </div>
    </div>
@endsection