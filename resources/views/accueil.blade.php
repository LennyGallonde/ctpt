@extends("template")

@section("content")
<div class="banner">
  <img src="{{ asset('image/Drone1.JPG') }}" alt="Vue aérienne" class="banner-img">
  <div class="banner-text">
    <h1>{{ $edito->titre }}</h1>
    <p>{{ $edito->texte }}</p>
  </div>
</div>

<div class="container my-5">
  <h2>Mot du Président</h2>
  <p>
    Depuis de nombreuses années, les dirigeants du club ont œuvré pour améliorer les structures, et le résultat est là : nous proposons à nos adhérents des installations de qualité pour la pratique du tennis et du squash, situées dans un cadre de verdure, à la limite de la ville et de la campagne, avec un parking réservé aux adhérents.
  </p>
  <p>
    Un grand club-house avec vue sur les quatre courts couverts et une belle terrasse vous attend, avec un personnel d’accueil à votre disposition tous les jours de l’année pour vous renseigner, répondre au téléphone, prendre vos réservations ou vous servir à boire.
  </p>
  <p>
    Le club dispose de dix courts de tennis, dont six extérieurs (deux en terre battue, deux en béton poreux et deux en résine), ainsi qu’un mini-tennis, quatre terrains couverts en résine, trois terrains de squash et une salle de sport.
  </p>
  <p>
    Notre équipe d’enseignants vous attend pour vous dispenser des cours collectifs, aussi bien aux jeunes dès 4 ans avec le mini-tennis qu’aux adultes, des cours de perfectionnement jusqu’à la compétition.
  </p>
  <p>
    Qui dit compétition dit matchs par équipes, mais aussi l’organisation de nombreux tournois pour tous les âges, des 8-10 ans jusqu’aux seniors plus.
  </p>
  <p>
    N’hésitez pas à venir vous rendre compte sur place de la qualité de notre club ; le personnel sera ravi de vous accueillir.
  </p>
  <p class="fw-bold mt-4">
    À bientôt, j’espère.<br>
    Marc Selig<br>
    Président du CTPT
  </p>
</div>
@endsection
