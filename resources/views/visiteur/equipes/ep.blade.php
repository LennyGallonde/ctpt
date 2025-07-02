@extends("template")

@section("content")
<style>
  body {
    background-image: url('{{ asset('image/Drone.jpg') }}');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    font-family: Arial, sans-serif;
    color: #333;
  }
  .container.my-5 {
    background: rgba(255, 255, 255, 0.85);
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.3);
    max-width: 1100px;
  }
  h1.text-center.mb-4 {
    color: #2f4f2f;
    font-weight: 700;
    margin-bottom: 40px;
    text-align: center;
    text-shadow: 1px 1px 3px rgba(0,0,0,0.3);
  }
  h2.text-center {
    color: #3b6e3b;
    font-weight: 600;
    margin-bottom: 25px;
  }
  .card {
    box-shadow: 0 3px 8px rgba(0,0,0,0.15);
  }
  .card-body h5 {
    font-weight: 700;
  }
</style>

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
