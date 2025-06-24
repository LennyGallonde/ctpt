@extends("template")
@section("content")
<div class="banner">
    <img src="{{ asset('image/Drone.jpg') }}" alt="Vue aérienne" class="banner-img">
    <div class="banner-text container">
        <h1>Admin : Modification de {{$equipeJoueur->nom}}</h1>
        <br>
        <br>
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-10 col-md-8 col-lg-6 mx-auto">
                    <form method="POST" action="/admin/equipeJoueur/{{$equipeJoueur->id}}/update">
                        @csrf
                        <input required type="hidden" name="id" value="{{$equipeJoueur->id}}">
                        <div class="mb-3">
                            <label for="nom">Nom :</label>
                            <input value="{{$equipeJoueur->nom}}" id="nom" name="nom" type="text" class="form-control">
                            @error("nom")
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="annee">Année :</label>
                            <input value="{{$equipeJoueur->annee}}" id="annee" name="annee" type="text" class="form-control">
                            @error("annee")
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="sport">Sport :</label>
                            <select value="{{$equipeJoueur->sport_id}}" name="sport_id" id="sport" class="form-control">
                                <option value="" disabled>Choisir le sport</option>
                                @foreach ($lesSports as $unSport )
                                <option {{ $equipeJoueur->sport_id == $unSport->id ? 'selected' : '' }} value="{{$unSport->id}}">{{Str::ucfirst($unSport->nom)}}</option>
                                @endforeach
                            </select>
                            @error("sport_id")
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <label for="">Categorie :</label>
                            <select value="{{$equipeJoueur->cat_age_id}}" name="cat_age_id" id="" class="form-control">
                                <option value=""  disabled>Choisir la categorie</option>
                                @foreach ($lesCategories as $uneCategorie )
                                <option {{ $equipeJoueur->cat_age_id == $uneCategorie->id ? 'selected' : '' }} value="{{$uneCategorie->id}}">{{Str::ucfirst($uneCategorie->nom)}}</option>
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
