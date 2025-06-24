@extends("template")
@section("content")
<div class="banner">
    <img src="{{ asset('image/Drone.jpg') }}" alt="Vue aérienne" class="banner-img">
    <div class="banner-text container">
        Admin : Gestion des equipes de joueurs
<br>
         <a class="btn btn-outline-primary my-3" href="/admin/equipeJoueur/create">+ Ajouter une Equipe</a>
         <br>
   <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Année</th>
                    <th>Photos</th>
                    <th>Sport</th>
                    <th>Categorie</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
  @foreach ( $lesEquipes as $uneEquipe )
   <tr>
    <td>{{$uneEquipe->id}}</td>
    <td>{{$uneEquipe->nom}}</td>
    <td>{{$uneEquipe->annee}}</td>
    <td>@foreach ($uneEquipe->photos as $unePhoto )

            <li>{{$unePhoto->chemin}}</li>

    @endforeach</td>
    <td>{{$uneEquipe->sport->nom}}</td>
    <td>{{$uneEquipe->categorieAge->nom}}</td>
    <td>
        <a class="btn btn-outline-secondary" href="/admin/equipeJoueur/{{$uneEquipe->id}}">Consulter</a>
        <a class="btn btn-outline-warning" href="/admin/equipeJoueur/{{$uneEquipe->id}}/edit">Modifier</a>
        <form onsubmit="return confirm('Supprimer {{ $uneEquipe->nom }} ?')" action="/admin/equipeJoueur/{{ $uneEquipe->id }}/delete" method="POST">
    @csrf

    <button class="btn btn-outline-danger">Supprimer</button>
</form>


    </td>
   </tr>
    @endforeach
            </tbody>
        </table>

    </div>



</div>
@endsection
