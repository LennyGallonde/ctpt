@extends("template")
@section("content")



<div class="container">
    <div class="col-12 col-sm-10 col-md-6 mx-auto my-3">
        <h1 class="my-1">Formulaire de création d'un article</h1>
        <form action="/admin/article" method="post" enctype="multipart/form-data">
            @csrf
            @method("POST")
            <div class="mb-3">
                <label for="titre">Titre :</label>
                <input id="titre" name="titre" type="text" class="form-control">
                @error("titre")
                <div class="alert alert-danger">{{message}}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="texte">Texte :</label>
                <textarea id="texte" name="texte" type="text" class="form-control"></textarea>
                @error("texte")
                <div class="alert alert-danger">{{message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="sport">Sport :</label>
                <select name="sport_id" id="sport" class="form-control">
                    <option value="" selected disabled>Choisir le sport</option>
                    <option value="">Les deux</option>
                    @foreach ($lesSports as $unSport )
                    <option value="{{$unSport->id}}">{{Str::ucfirst($unSport->nom)}}</option>
                    @endforeach
                </select>
                @error("sport_id")
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


            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
    </div>
</div>


@endsection
