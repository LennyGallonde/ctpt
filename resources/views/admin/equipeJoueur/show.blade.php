@extends("template")
@section("content")
<div class="banner">
    <img src="{{ asset('image/Drone.jpg') }}" alt="Vue aérienne" class="banner-img">
    <div class="banner-text container">
       <h1>Admin : {{$uneEquipe->nom}}</h1>
        <br>
        <ul>
            <h2>Les informations</h2>
            <li>Id : {{$uneEquipe->id}}</li>
            <li>Nom : {{$uneEquipe->nom}}</li>
            <li>Annee : {{$uneEquipe->annee}}</li>
            <li>Sport : {{$uneEquipe->sport->nom}}</li>
            <li>Categorie : {{$uneEquipe->categorieAge->nom}}</li>
                <a class="btn btn-outline-warning" href="">Modifier</a>
         <button class="btn btn-outline-danger">Supprimer</button>
            <br>
            <h2>Les menbres</h2>
            <div class="row row-cols-4">
                @foreach ($uneEquipe->utilisateurs as $unMenbre)
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{Str::upper($unMenbre->name) ." ". $unMenbre->firstname}}</h5>
                            <p class="card-text">
                                Nom : {{$unMenbre->name}}
                                Prenom : {{$unMenbre->firstname}}
                                Email : {{$unMenbre->email}}
                            </p>
                            <a href="#" class="btn btn-primary">Consulter le profil</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </ul>


    </div>



</div>
@endsection
