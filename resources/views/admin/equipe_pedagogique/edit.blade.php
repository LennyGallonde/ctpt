@extends("template")
@section("content")
<div class="banner">
    <img src="{{ asset('image/Drone.jpg') }}" alt="Vue aérienne" class="banner-img">
    <div class="banner-text container">
        <h2>Modifier une equipe pédagogique</h2>

        <form action="/admin/equipePedagogique/{{ $equipePedagogique->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Nom :</label>
                <input type="text" name="nom" value="{{ $equipePedagogique->nom }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="sport">Sport :</label>
                <select name="sport_id" id="sport" class="form-control">
                    <option value="" selected disabled>Choisir le sport</option>
                    @foreach ($lesSports as $unSport )
                    <option {{ $equipePedagogique->sport_id == $unSport->id ? 'selected' : '' }} value="{{$unSport->id}}">{{Str::ucfirst($unSport->nom)}}</option>
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
                    <option {{ $equipePedagogique->cat_age_id == $uneCategorie->id ? 'selected' : '' }} value="{{$uneCategorie->id}}">{{Str::ucfirst($uneCategorie->nom)}}</option>
                    @endforeach
                </select>
                @error("cat_age_id")
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <button class="btn btn-primary mt-2">Mettre à jour</button>
        </form>
    </div>
</div>
@endsection
