@extends("template")

@section("content")
<style>
  .structures-section {
    background-image: url('{{ asset('image/Drone1.jpg') }}');
    background-size: cover;
    background-position: center;
    padding: 120px 0;
    min-height: 100vh;
    position: relative;
  }

  .structures-overlay {
    background-color: rgba(0, 0, 0, 0.7);
    padding: 60px;
    border-radius: 15px;
    max-width: 1200px;
    margin: auto;
    color: white;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.5);
  }

  .structures-title {
    text-align: center;
    font-size: 3em;
    margin-bottom: 50px;
    font-weight: 800;
    letter-spacing: 1px;
  }

  .carousel .carousel-item img {
    border-radius: 12px;
    max-height: 650px;
    object-fit: cover;
    box-shadow: 0 4px 15px rgba(0,0,0,0.4);
  }

  .carousel-control-prev-icon,
  .carousel-control-next-icon {
    background-color: rgba(0, 0, 0, 0.5);
    border-radius: 50%;
    background-size: 50%, 50%;
  }
</style>

<div class="structures-section">
  <div class="structures-overlay">
    <h1 class="structures-title">Les Structures</h1>
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
        <span class="carousel-control-prev-icon"></span>
        <span class="visually-hidden">Précédent</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
        <span class="visually-hidden">Suivant</span>
      </button>
    </div>
  </div>
</div>
@endsection
