@extends("template")
@section("content")
<div class="container my-4">
    <div class="row">
        {{-- Colonne principale : tous les articles --}}
        <div class="col-md-8">
            <h2 class="mb-4">Tous les articles</h2>

            {{-- Pagination --}}
            <div class="d-flex justify-content-center my-3">
                {{ $articles->links() }}
            </div>

            @forelse($articles as $article)
            <div class="card mb-4">
                @if (count($article->photos)!=0)
                <img src="{{asset('storage/' . $article->photos[0]->chemin)}}" class="card-img-top" alt="..."
                    style="max-height: 300px; object-fit: cover;">
                @else
                <img src="{{asset('storage/photos/equipesJoueurs/default.jpg')}}" class="card-img-top" alt="..."
                    style="max-height: 300px; object-fit: cover;">
                @endif
                <div class="card-body">

                    <h3 class="card-title">{{ $article->titre }}</h3>
                    <p class="text-muted">Publié le {{ $article->created_at->format('d/m/Y') }}</p>
                    <p class="card-text">{{ Str::limit($article->texte, 250) }}</p>
                    <p class="text-muted">Auteur : {{ $article->user->name .' '.$article->user->firstname}}</p>

                </div>
            </div>
            @empty
            <p>Aucun article disponible pour le moment.</p>
            @endforelse
        </div>

        {{-- Colonne secondaire : actualités (5 dernières) --}}
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
        {{-- Pagination --}}
        <div class="d-flex justify-content-center my-3">
            {{ $articles->links() }}
        </div>
    </div>
</div>
@endsection
