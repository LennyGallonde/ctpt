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
  h1.text-center {
    color: #2f4f2f;
    margin-bottom: 40px;
    font-weight: 700;
    text-align: center;
    text-shadow: 1px 1px 3px rgba(0,0,0,0.3);
  }
  .row.my-3.border-primary {
    background: white;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 3px 10px rgba(0,0,0,0.1);
    margin-bottom: 30px;
    text-align: center;
  }
  h2.mx-auto {
    color: #3b6e3b;
    font-weight: 600;
    margin-bottom: 15px;
  }
  .col img {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.15);
  }
</style>

<div class="container my-5">
    <h1 class="text-center">Les équipes joueurs</h1>

    @foreach ($lesEquipes as $uneEquipe)
        <div class="row my-3 border border-primary">
            <h2 class="mx-auto">{{ $uneEquipe->nom }}</h2>
            <div class="col">
                @if (count($uneEquipe->photos) != 0)
                    <img src="{{ asset('storage/' . $uneEquipe->photos[0]->chemin) }}" alt="Photo de l'équipe {{ $uneEquipe->nom }}">
                @else
                    <img src="{{ asset('storage/photos/equipesJoueurs/default.jpg') }}" alt="Photo par défaut équipe">
                @endif
            </div>
        </div>
    @endforeach
</div>
@endsection
