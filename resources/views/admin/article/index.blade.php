@extends('template')

@section('content')
<div class="container">


<h1>Liste des articles </h1>

<a href="/admin/article/create" class="btn btn-primary">Ajouter une Equipe</a>

<table class="table mt-3">
    <thead>
        <tr>
            <th>ID</th>
            <th>Titre</th>
            <th>Texte</th>
            <th>Date de création</th>
            <th>Auteur</th>
            <th>Sport</th>
            <th>Images</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($lesArticles as $unArticle)
        <tr>
            <td>{{ $unArticle->id }}</td>
            <td>{{ $unArticle->nom }}</td>

            <td>{{ $unArticle->titre}}</td>
            <td>{{ Str::limit($unArticle->texte, 100) }} ...</td>
             <td>{{ $unArticle->created_at->format('d/m/Y') }}</td>
             <td>
                {{Str::upper( $unArticle->user->name)}} {{$unArticle->user->name}}
             </td>
             <td>
                {{$unArticle->sport?->nom}}
             </td>
                  <td>
                    <ul>
                @foreach ($unArticle->photos as $unePhoto )
                <li>{{$unePhoto->chemin}}</li>
                {{-- <img src="{{asset('storage/' . $unePhoto->chemin)}}" alt=""> --}}
                @endforeach
                </ul>
            </td>
            <td>
                <a href="/admin/article/{{$unArticle->id}}/edit" class="btn btn-warning btn-sm">Modifier</a>
                <form action="/admin/article/{{$unArticle->id}}" method="POST" style="display:inline;">
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
