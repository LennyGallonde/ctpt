@extends("template")
@section("content")
<section class="inscription-section">
    <div class="overlay-inscription">
        <h1>Inscriptions</h1>
        <p class="inscription-text">Les inscriptions se font exclusivement sur place.</p>

        @if ($tarif && $tarif->image_path)
            <img src="{{ asset('storage/' . $tarif->image_path) }}" alt="Tarifs tennis" class="tarifs-img">
        @else
            <p>Aucun tarif disponible actuellement.</p>
        @endif
    </div>
</section>
@endsection
