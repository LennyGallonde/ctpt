@extends("template")
@section("content")
<div class="banner">
    <img src="{{ asset('image/Drone.jpg') }}" alt="Vue aérienne" class="banner-img">
    <div class="banner-text container">
        <h2>Ajouter un membre de l'équipe pédagogique</h2>

        <form action="/admin/equipePedagogique" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Nom :</label>
                <input type="text" name="nom" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="sport">Sport :</label>
                <select name="sport_id" id="sport" class="form-control">
                    <option value="" selected disabled>Choisir le sport</option>
                    @foreach ($lesSports as $unSport )
                    <option value="{{$unSport->id}}">{{Str::ucfirst($unSport->name)}}</option>
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
            <div class="mb-3">
                <label for="photos">Choisissez des photos :</label>
                <input class="form-control" type="file" name="photos[]" multiple>
                    @error("photos")
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>

            <button class="btn btn-success mt-2">Ajouter</button>
        </form>
    </div>
</div>
@endsection
