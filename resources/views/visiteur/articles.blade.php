@extends("template")

@section("content")
<style>
    .banner {
        position: relative;
        width: 100%;
        height: 100vh; /* prend toute la hauteur de la fenêtre */
        overflow: hidden;
    }
    .banner-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .banner-text {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: rgba(255, 255, 255, 0.7);
        padding: 2rem;
        border-radius: 10px;
        text-align: center;
    }
</style>

<div class="banner">
    <img src="{{ asset('image/Drone.jpg') }}" alt="Vue aérienne" class="banner-img">
    <div class="banner-text">
        <h1>Bienvenue au Tennis et Sq</h1>
        <h2>Tous les articles</h2>
    </div>
</div>

<div class="container my-4">
    <div class="row">
        {{-- Colonne principale --}}
        <div class="col-md-8">
            @forelse($articles as $article)
            <div class="card mb-4 shadow">
                @if (count($article->photos) != 0)
                <img src="{{ asset('storage/' . $article->photos[0]->chemin) }}" class="card-img-top" alt="..."
                    style="max-height: 300px; object-fit: cover;">
                @else
                <img src="{{ asset('storage/photos/equipesJoueurs/default.jpg') }}" class="card-img-top" alt="..."
                    style="max-height: 300px; object-fit: cover;">
                @endif
                <div class="card-body">
                    <h3 class="card-title">{{ $article->titre }}</h3>
                    <p class="text-muted">Publié le {{ $article->created_at->format('d/m/Y') }}</p>
                    <p class="card-text">{{ Str::limit($article->texte, 250) }}</p>
                    <p class="text-muted">Auteur : {{ $article->user->name .' '.$article->user->firstname }}</p>
                    <a class="btn btn-primary" href="/visiteur/article/{{ $article->id }}">Voir l'article</a>
                </div>
            </div>
            @empty
            <p>Aucun article disponible pour le moment.</p>
            @endforelse

            <div class="d-flex justify-content-center my-3">
                {{ $articles->links() }}
            </div>
        </div>

        {{-- Colonne secondaire --}}
        <div class="col-md-4">
            <h4 class="mb-3">Actualités récentes</h4>
            <ul class="list-group">
                @foreach($actualite as $actu)
                <li class="list-group-item">
                    <strong>{{ $actu->titre }}</strong><br>
                    <small class="text-muted">{{ $actu->created_at->format('d/m/Y') }}</small>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
