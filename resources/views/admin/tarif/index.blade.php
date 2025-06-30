@extends('template')

@section('content')
<div class="container mt-4">
    <h1>Modifier le tarif</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ url('/admin/tarif') }}" method="POST" enctype="multipart/form-data">
        @csrf

        @if ($tarif && $tarif->image_path)
            <div class="mb-3">
                <p>Image actuelle :</p>
                <img src="{{ asset('storage/' . $tarif->image_path) }}" alt="Tarif actuel" style="max-width: 300px;">
            </div>
        @endif

        <div class="mb-3">
            <label for="image" class="form-label">Nouvelle image de tarif</label>
            <input type="file" class="form-control" name="image" id="image" required>
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection
