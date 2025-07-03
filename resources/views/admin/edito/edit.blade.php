@extends("template")
@section("content")
<div class="banner">
    <img src="{{ asset('image/Drone.jpg') }}" alt="Vue aérienne" class="banner-img">
    <div class="banner-text container">
        <h2>Modification de l'édito</h2>

        <form action="/admin/edito/{{ $edito->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="titre">Titre :</label>
                <input id="titre" value="{{$edito->titre}}" name="titre" type="text" class="form-control">
                @error("titre")
                <div class="alert alert-danger">{{message}}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="texte">Texte :</label>
                <textarea id="texte" name="texte" maxlength="255" class="form-control">{{$edito->texte}}</textarea>
                @error("texte")
                <div class="alert alert-danger">{{message}}</div>
                @enderror
            </div>
            <button class="btn btn-primary mt-2">Mettre à jour</button>
        </form>
    </div>
</div>
@endsection
