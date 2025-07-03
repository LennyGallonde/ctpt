@extends("template")
@section("content")


    <div class="container">

        <br>
        <br>

            <div class="row">
                <div class="col-12 col-sm-10 col-md-8 col-lg-6 mx-auto">
                          <h1>Ajout d'un menbre</h1>
                    <form method="POST" action="/admin/user" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name">Nom :</label>
                            <input required id="name" name="name" type="text" class="form-control">
                            @error("name")
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="fistname">Prenom :</label>
                            <input required id="fistname" name="firstname" type="text" class="form-control">
                            @error("fistname")
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email">Email :</label>
                            <input required id="email" name="email" type="email" class="form-control">
                            @error("email")
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password">Mot de passe :</label>
                            <input required minlength="8" id="password" name="password" type="password"
                                class="form-control">
                            @error("password")
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password-confirm">Confirmation du mot de passe :</label>
                            <input required minlength="8" id="password-confirm" name="password-confirm" type="password"
                                class="form-control">
                            @error("password-confirm")
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input value="0" class="form-check-input" type="radio" name="estVisible"
                                    id="radioDefault1">
                                <label class="form-check-label" for="radioDefault1">
                                    Ne pas apparaitre sur les pages du sites (Equipes Joueurs, Equipes pédagogiques)
                                </label>
                            </div>
                            <div class="form-check">
                                <input value="1" class="form-check-input" type="radio" name="estVisible"
                                    id="radioDefault2" checked>
                                <label class="form-check-label" for="radioDefault2">
                                    Apparaitre sur les pages du sites (Equipes Joueurs, Equipes pédagogiques)
                                </label>
                            </div>
                        </div>

                        <div class="mb-3">
<h2>Equipes Joueurs :</h2>
                            <div class="my-2">
 <a href="/admin/equipeJoueur/create" class="btn btn-primary">Ajouter une equipe de joueurs</a>
                            </div>
@foreach ($equipesJ as $uneEquipeJ )


<div class="form-check">
  <input class="form-check-input" type="checkbox" name="equipe_joueur_id[]" value="{{$uneEquipeJ->id}}" id="checkDefault">
  <label class="form-check-label" for="checkDefault">
    {{$uneEquipeJ->nom}}
  </label>
</div>
@endforeach


                        </div>
                        <div class="mb-3">
                            <h2>Equipes Pedagogique :</h2>
                            <div class="my-2">
 <a href="/admin/equipePedagogique/create" class="btn btn-primary">Ajouter une equipe pédagogique</a>
                            </div>

@foreach ($equipesP as $uneEquipeP )


<div class="form-check">
  <input class="form-check-input" type="checkbox" name="equipe_pedagogique_id[]" value="{{$uneEquipeP->id}}" id="checkDefault">
  <label class="form-check-label" for="checkDefault">
    {{$uneEquipeP->nom}}
  </label>
</div>
@endforeach
                        </div>
                        <button class="btn btn-primary">Envoyer</button>
                    </form>
                </div>
            </div>
        </div>






@endsection
