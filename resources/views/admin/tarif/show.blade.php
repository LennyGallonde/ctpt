@extends("template")

@section("content")
<div class="banner">
    <img src="{{ asset('image/Drone.jpg') }}" alt="Vue aérienne" class="banner-img">
    <div class="banner-text container">
       <h1>Admin : Tarif #{{ $tarif->id }}</h1>
        <br>
        <ul>
            <h2>Informations du tarif</h2>
            <li>Id : {{ $tarif->id }}</li>
            @if ($tarif->image_path)
                <li>Image :</li>
                <img src="{{ asset('storage/' . $tarif->image_path) }}" alt="Image tarif" style="max-width: 300px;">
            @else
                <li>Aucune image enregistrée</li>
            @endif
        </ul>

        <br>
        <a class="btn btn-outline-warning" href="/admin/tarif/{{ $tarif->id }}/edit">Modifier</a>
        <form onsubmit="return confirm('Supprimer ce tarif ?')" action="/admin/tarif/{{ $tarif->id }}/delete" method="POST" style="display:inline;">
            @csrf
            <button class="btn btn-outline-danger">Supprimer</button>
        </form>
    </div>
</div>
@endsection
