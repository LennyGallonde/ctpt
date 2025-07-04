@extends("template")

@section("content")
<div class="container">
    <br><br>
    <div class="row">
        <div class="col-12 col-sm-10 col-md-10 mx-auto my-3">
            <h1>Modification d'un membre</h1>

            <form method="POST" action="{{ route('user.update', $utilisateur->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name">Nom* :</label>
                    <input required id="name" name="name" type="text" class="form-control"
                        value="{{ old('name', $utilisateur->name) }}">
                    @error("name")
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="firstname">Prenom* :</label>
                    <input required id="firstname" name="firstname" type="text" class="form-control"
                        value="{{ old('firstname', $utilisateur->firstname) }}">
                    @error("firstname")
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email">Email* :</label>
                    <input required id="email" name="email" type="email" class="form-control"
                        value="{{ old('email', $utilisateur->email) }}">
                    @error("email")
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Mot de passe facultatif en édition --}}
                <div class="mb-3">
                    <label for="password">Mot de passe (laisser vide pour ne pas modifier) :</label>
                    <input id="password" name="password" type="password" class="form-control">
                    @error("password")
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password-confirm">Confirmation du mot de passe :</label>
                    <input id="password-confirm" name="password-confirm" type="password" class="form-control">
                    @error("password-confirm")
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <div class="form-check">
                        <input value="0" class="form-check-input" type="radio" name="estVisible" id="radioDefault1" {{
                            old('estVisible', $utilisateur->estVisible) == 0 ? 'checked' : '' }}>
                        <label class="form-check-label" for="radioDefault1">
                            Ne pas apparaitre sur les pages du site
                        </label>
                    </div>
                    <div class="form-check">
                        <input value="1" class="form-check-input" type="radio" name="estVisible" id="radioDefault2" {{
                            old('estVisible', $utilisateur->estVisible) == 1 ? 'checked' : '' }}>
                        <label class="form-check-label" for="radioDefault2">
                            Apparaitre sur les pages du site
                        </label>
                    </div>
                </div>

                  <div class="mb-3">
                    <div class="form-check">
                        <input value="0" class="form-check-input" type="radio" name="estAdmin" id="radioDefault3" {{
                            old('estVisible', $utilisateur->estAdmin) == 0 ? 'checked' : '' }}>
                        <label class="form-check-label" for="radioDefault3">
                           L'utilisateur n'est pas Admin
                        </label>
                    </div>
                    <div class="form-check">
                        <input value="1" class="form-check-input" type="radio" name="estAdmin" id="radioDefault4" {{
                            old('estVisible', $utilisateur->estAdmin) == 1 ? 'checked' : '' }}>
                        <label class="form-check-label" for="radioDefault4">
                           L'utilisateur est un Admin
                        </label>
                    </div>
                </div>

                {{-- Équipes Joueurs --}}
                <div class="mb-3">
                    <h2>Équipes Joueurs :</h2>
                    <div class="my-2">
                        <a href="/admin/equipeJoueur/create" class="btn btn-primary">Ajouter une équipe de joueurs</a>
                    </div>

                    @foreach ($equipesJ as $uneEquipeJ)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="equipe_joueur_id[]"
                            value="{{ $uneEquipeJ->id }}" id="equipe_joueur_{{ $uneEquipeJ->id }}" {{
                            optional($utilisateur->equipeJoueurs)->contains($uneEquipeJ->id) ? 'checked' : '' }}>
                        <label class="form-check-label" for="equipe_joueur_{{ $uneEquipeJ->id }}">
                            {{ $uneEquipeJ->nom }}
                        </label>
                    </div>
                    @endforeach
                </div>

                {{-- Équipes Pédagogiques --}}
                <div class="mb-3">
                    <h2>Équipes Pédagogiques :</h2>
                    <div class="my-2">
                        <a href="/admin/equipePedagogique/create" class="btn btn-primary">Ajouter une équipe
                            pédagogique</a>
                    </div>

                    @foreach ($equipesP as $uneEquipeP)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="equipe_pedagogique_id[]"
                            value="{{ $uneEquipeP->id }}" id="equipe_pedagogique_{{ $uneEquipeP->id }}" {{
                            optional($utilisateur->equipePedagogique)->contains($uneEquipeP->id) ? 'checked' : '' }}>
                        <label class="form-check-label" for="equipe_pedagogique_{{ $uneEquipeP->id }}">
                            {{ $uneEquipeP->nom }}
                        </label>
                    </div>
                    @endforeach
                </div>
 <div class="mb-3">
                    <label for="cheminPhoto">Photo (laisser vide pour ne pas modifier) :</label>
                    <div class="row">

                            <input id="cheminPhoto" name="cheminPhoto" type="file" class="form-control">

                    </div>
                    @error("cheminPhoto")
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <button class="btn btn-success">Mettre à jour</button>
            </form>
        </div>
    </div>
</div>
@endsection
