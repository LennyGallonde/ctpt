@extends("template")

@section("content")
<div class="banner">
    <img src="{{ asset('image/Drone.jpg') }}" alt="Vue aérienne" class="banner-img">
    <div class="banner-text container">
        <h1>Admin : Ajout d'un tarif</h1>
        <br><br>
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-10 col-md-8 col-lg-6 mx-auto">
                    <form method="POST" action="/admin/tarif" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="image">Image du tarif :</label>
                            <input class="form-control" type="file" name="image" required>
                            @error("image")
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button class="btn btn-primary">Envoyer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
