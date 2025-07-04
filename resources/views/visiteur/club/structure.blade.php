@extends("template")

@section("content")
<div class="container my-4 mx-auto row">
<H1>Les structures</H1>
<div id="carouselExample" class="carousel slide" data-bs-ride="carousel">

  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ asset('image/club1.jpg') }}" class="d-block w-100" alt="Structure 1">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('image/club3.jpg') }}" class="d-block w-100" alt="Structure 3">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('image/club4.jpg') }}" class="d-block w-100" alt="Structure 4">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('image/club5.jpg') }}" class="d-block w-100" alt="Structure 5">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('image/club6.jpg') }}" class="d-block w-100" alt="Structure 6">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('image/club7.jpg') }}" class="d-block w-100" alt="Structure 7">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('image/club8.jpg') }}" class="d-block w-100" alt="Structure 8">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('image/club9.jpg') }}" class="d-block w-100" alt="Structure 9">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('image/club10.jpg') }}" class="d-block w-100" alt="Structure 10">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
  <span class="visually-hidden">Previous</span>
</button>
<button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
  <span class="carousel-control-next-icon" aria-hidden="true"></span>
  <span class="visually-hidden">Next</span>
</button>

  </div>
</div>
@endsection

 {{-- <div id="carouselEquipe{{ $loop->index }}" class="carousel slide" data-bs-ride="carousel">
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
 --}}
