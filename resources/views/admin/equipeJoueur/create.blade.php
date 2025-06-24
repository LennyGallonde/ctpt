@extends("template")
@section("content")
<div class="banner">
    <img src="{{ asset('image/Drone.jpg') }}" alt="Vue aérienne" class="banner-img">
    <div class="banner-text container">
        <h1>Admin : Création d'une equipe de joueurs</h1>
        <br>
        <br>
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-10 col-md-8 col-lg-6 mx-auto">
                    <form method="POST" action="/admin/equipeJoueur">
                        @csrf
                        <div class="mb-3">
                            <label for="nom">Nom :</label>
                            <input id="nom" name="nom" type="text" class="form-control">
                            @error("nom")
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="annee">Année :</label>
                            <input id="annee" name="annee" type="text" class="form-control">
                            @error("annee")
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="sport">Sport :</label>
                            <select name="sport_id" id="sport" class="form-control">
                                <option value="" selected disabled>Choisir le sport</option>
                                @foreach ($lesSports as $unSport )
                                <option value="{{$unSport->id}}">{{Str::ucfirst($unSport->nom)}}</option>
                                @endforeach
                            </select>
                            @error("sport_id")
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <label for="">Categorie :</label>
                            <select name="cat_age_id" id="" class="form-control">
                                <option value="" selected disabled>Choisir la categorie</option>
                                @foreach ($lesCategories as $uneCategorie )
                                <option value="{{$uneCategorie->id}}">{{Str::ucfirst($uneCategorie->nom)}}</option>
                                @endforeach
                            </select>
                            @error("cat_age_id")
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <button class="btn btn-primary">Envoyer</button>
                    </form>
                </div>
            </div>
        </div>

    </div>



</div>
@endsection
