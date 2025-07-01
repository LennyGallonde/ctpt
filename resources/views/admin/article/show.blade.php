@extends("template")

@section("content")
<div class="container mt-4">
    <h1>{{ $article->titre }}</h1>

    <p><strong>Auteur :</strong> {{ Str::upper($article->user->name) }}</p>
    <p><strong>Date de création :</strong> {{ $article->created_at->format('d/m/Y') }}</p>

    <div class="my-4">
        <p>{{ $article->texte }}</p>
    </div>

    @if($article->photos->count() > 0)
    <h3>Photos associées :</h3>
<div class="container col-6">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            @foreach($article->photos as $index => $photo)
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $index }}"
                    class="{{ $index === 0 ? 'active' : '' }}"
                    aria-current="{{ $index === 0 ? 'true' : 'false' }}"
                    aria-label="Slide {{ $index + 1 }}"></button>
            @endforeach
        </div>

        <div class="carousel-inner">
            @foreach($article->photos as $index => $photo)
                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                    <img src="{{ asset('storage/' . $photo->chemin) }}" class="d-block w-100" alt="Photo {{ $index + 1 }} de l'article {{ $article->titre }}">
                </div>
            @endforeach
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Précédent</span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Suivant</span>
        </button>
    </div>
    </div>
    @endif
    <div class="countainer mx-auto my-3">
<a href="{{ url('/visiteur/article') }}" class="btn btn-secondary mt-3">Retour à la page des articles</a>
    @auth
        @if (auth()->user()->estAdmin)
 <a href="{{ url('/admin/article') }}" class="btn btn-secondary mt-3">Retour à la gestion des articles</a>
        @endif
    @endauth
</div>
</div>
@endsection
