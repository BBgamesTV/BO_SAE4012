@extends('layouts.template')

@section('content')
    <div class="container">
        <h1 class="my-4">Ajouter un Client</h1>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('clients.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nom :</label>
                        <input type="text" name="nom" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email :</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Téléphone :</label>
                        <input type="text" name="telephone" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                    <a href="{{ route('clients.index') }}" class="btn btn-secondary">Annuler</a>
                </form>
            </div>
        </div>
    </div>
@endsection