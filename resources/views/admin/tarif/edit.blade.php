@extends("template")
@section("content")
<div class="banner">
    <img src="{{ asset('image/Drone.jpg') }}" alt="Vue aérienne" class="banner-img">
    <div class="banner-text container">
        <h1>Admin : Modification du tarif #{{ $tarif->id }}</h1>
        <br><br>
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-10 col-md-8 col-lg-6 mx-auto">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form method="POST" action="/admin/tarif/{{ $tarif->id }}/update" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $tarif->id }}">

                        @if ($tarif->image_path)
                        <div class="mb-3">
                            <p>Image actuelle :</p>
                            <img src="{{ asset('storage/' . $tarif->image_path) }}" alt="Tarif actuel" style="max-width: 300px;">
                        </div>
                        @endif

                        <div class="mb-3">
                            <label for="image" class="form-label">Nouvelle image de tarif</label>
                            <input type="file" class="form-control" name="image" id="image" required>
                            @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
