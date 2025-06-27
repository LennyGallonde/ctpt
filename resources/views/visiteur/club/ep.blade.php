@extends("template")
@section("content")
<div class="container my-5">
    <h1 class="text-center mb-4">L'équipe pédagogique</h1>

    @foreach($lesEquipes as $uneEquipe)
    <div class="mb-5">
        <h2 class="text-center">{{ $uneEquipe->nom }}</h2>

        <div id="carouselEquipe{{ $loop->index }}" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($uneEquipe->utilisateurs as $index => $membre)
                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                    <div class="d-flex justify-content-center">
                        <div class="card" style="width: 18rem;">
                            @if ($membre->cheminPhoto)
                                <img src="{{ asset('storage/' . $membre->cheminPhoto) }}" class="card-img-top" alt="Photo {{ $membre->name }}">
                            @else
                                <img src="{{ asset('storage/photos/users/default.jpg') }}" class="card-img-top" alt="Default">
                            @endif
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ strtoupper($membre->name) }} {{ ucfirst($membre->firstname) }}</h5>
                                <p class="card-text">{{ $uneEquipe->sport->nom }} - {{ $uneEquipe->categorieAge->nom }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselEquipe{{ $loop->index }}" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselEquipe{{ $loop->index }}" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </div>
    @endforeach
</div>
@endsection
