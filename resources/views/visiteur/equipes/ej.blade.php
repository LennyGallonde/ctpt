@extends("template")
@section("content")
<div class="banner">
    {{-- <img src="{{ asset('image/Drone.jpg') }}" alt="Vue aérienne" class="banner-img"> --}}
    {{-- <div class="banner-text"> --}}
        <div class="container">
           <h1> Bienvenue au Tennis et Squash du Plessis Trévise</h1>
            @foreach ($lesEquipes as $uneEquipe)
            <div class="row my-3 border border-primary">
                <div class="row">
                    <div class="d-flex flex-row align-items-center">
                 <h2 class="mx-auto">{{$uneEquipe->nom}}</h2>
                 </div>
                 </div>
                <div class="col">

            @if (count($uneEquipe->photos)!=0)
            <img src="{{asset('storage/' . $uneEquipe->photos[0]->chemin)}}" alt="">
            @else
            <img src="{{asset('storage/photos/equipesJoueurs/default.jpg')}}" alt="">
            @endif
</div>
<div class="col">
            <h3>Les menbres de l'equipe</h3>
            <div class="row row-cols-2 mb-4">
                @foreach ($uneEquipe->utilisateurs as $unMenbre )
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        @if ($unMenbre->chemin !=null)
                        <img src="{{asset('storage/'.$unMenbre->cheminPhoto)}}" class="card-img-top" alt="...">
                        @else
                        <img src="{{asset('storage/photos/users/default.jpg')}}" class="card-img-top" alt="...">
                        @endif

                        <div class="card-body">
                            <h5 class="card-title">{{Str::upper($unMenbre->name)}} {{Str::lower($unMenbre->firstname)}}
                            </h5>
                            <p class="card-text">

                            </p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            </div>
            </div>
            @endforeach
        </div>
    </div>
    {{-- </div> --}}
@endsection
