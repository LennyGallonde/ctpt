@extends('template')

@section('content')
<div class="container">


<h1>Liste de l'équipe pédagogique</h1>

<a href="/admin/equipePedagogique/create" class="btn btn-primary">Ajouter une Equipe</a>

<table class="table mt-3">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Categorie Age</th>
            <th>Sport</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($lesEquipes as $uneEquipe)
        <tr>
            <td>{{ $uneEquipe->id }}</td>
            <td>{{ $uneEquipe->nom }}</td>
            <td>{{ $uneEquipe->categorieAge->nom }}</td>
            <td>{{ $uneEquipe->sport->nom }}</td>
            <td>
                <a href="/admin/equipePedagogique/{{$uneEquipe->id}}/edit" class="btn btn-warning btn-sm">Modifier</a>
                <form action="/admin/equipePedagogique/{{$uneEquipe->id}}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm"
                        onclick="return confirm('Confirmer la suppression ?')">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection
