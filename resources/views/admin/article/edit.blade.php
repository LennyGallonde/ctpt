@extends("template")
@section("content")



    <div class="container">
        <div class="col-12 col-sm-10 col-md-6 mx-auto my-3">
            <h1 class="my-1">Formulaire de modication d'un article</h1>
            <form  action="/admin/article/{{$unArticle->id}}" method="post" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <input type="hidden" name="id" value="{{$unArticle->id}}" >
             <div class="mb-3">
                 <label for="titre">Titre :</label>
                 <input value="{{$unArticle->titre}}" id="titre" name="titre" type="text" class="form-control">
                 @error("titre")
                 <div class="alert alert-danger">{{message}}</div>
                 @enderror
             </div>

   <div class="mb-3">
                <label for="sport">Sport :</label>
                <select name="sport_id" id="sport" class="form-control">
                    <option value=""  {{ $unArticle->sport_id == null ? 'selected' : '' }}>Les deux</option>
                    @foreach ($lesSports as $unSport )
                    <option {{ $unArticle->sport_id == $unSport->id ? 'selected' : '' }} value="{{$unSport->id}}">{{Str::ucfirst($unSport->nom)}}</option>
                    @endforeach
                </select>
                @error("sport_id")
                <div class="alert alert-danger">{{$message}}</div>
                @enderror

            </div>

             <div class="mb-3">
                 <label for="texte">Texte :</label>
                 <textarea id="texte" name="texte" type="text" class="form-control">{{$unArticle->texte}}</textarea>
                 @error("texte")
                 <div class="alert alert-danger">{{message}}</div>
                 @enderror
             </div>


                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
        </div>
    </div>


@endsection
