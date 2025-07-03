@extends("template")
@section("content")
<div class="banner">
      <img src="{{ asset('image/Drone1.JPG') }}" alt="Vue aérienne" class="banner-img">
      <div class="banner-text">
       <h1>{{$edito->titre}}</h1>
       <p>{{$edito->texte}}</p>
      </div>
    </div>
@endsection
