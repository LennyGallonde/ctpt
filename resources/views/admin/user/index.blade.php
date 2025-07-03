@extends("template")
@section("content")


    <div class="container">
       <h1> Admin : Gestion des utilisateurs</h1>
        <br>
        <a class="btn btn-outline-primary my-3" href="/admin/user/create">+ Ajouter un utilisateur</a>
        <br>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Photo</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Email</th>
                    <th>Etre visible</th>
                    <th>Equipe</th>

                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $utilisateurs as $unUtilisateur )
                <tr>
                    <td>{{$unUtilisateur->id}}</td>
                    <td>{{$unUtilisateur->cheminPhoto}}</td>
                    <td>{{$unUtilisateur->name}}</td>
                   <td>{{$unUtilisateur->firstname}}</td>
                   <td>{{$unUtilisateur->email}}</td>
                   <td>{{$unUtilisateur->estVisible}}</td>
                    <td>
                        @if(count($unUtilisateur->equipeJoueurs)>0)
                        Equipes Joueurs :
                        <ul>
                            @foreach ($unUtilisateur->equipeJoueurs as $uneEquipeJ )
                                <li>{{$uneEquipeJ->nom}}</li>
                            @endforeach
                        </ul>
                        @endif
                        @if (count($unUtilisateur->equipePedagogique)>0)
                        Equipe Pedagogique :
                           <ul>
                            @foreach ($unUtilisateur->equipePedagogique as $uneEquipeP )
                                <li>{{$uneEquipeP->nom}}</li>
                            @endforeach
                        </ul>
                           @endif
                    </td>

                    <td>
                        <a class="btn btn-outline-secondary" href="/admin/user/{{$unUtilisateur->id}}">Consulter</a>
                        <a class="btn btn-outline-warning"
                            href="/admin/user/{{$unUtilisateur->id}}/edit">Modifier</a>
                        <form onsubmit="return confirm('Supprimer {{ $unUtilisateur->name }} ?')"
                            action="/admin/user/{{ $unUtilisateur->id }}" method="POST">
                            @csrf
                            @method("delete")
                            <button class="btn btn-outline-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

@endsection
