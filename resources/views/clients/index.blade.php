@extends('layouts.template')

@section('content')
<h2>Liste des Clients<a href="{{ route('clients.create') }}" class="btn btn-primary">Créer un client</a></h2>


<table class="table">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($clients as $client)
        <tr>
            <td>{{ $client->nom }}</td>
            <td>{{ $client->email }}</td>
            <td>
                <a href="{{ route('clients.show', $client) }}" class="btn btn-info btn-sm">Voir</a>
                <a href="{{ route('clients.edit', $client) }}" class="btn btn-warning btn-sm">Modifier</a>
                <form action="{{ route('clients.destroy', $client) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
