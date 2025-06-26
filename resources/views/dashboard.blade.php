@extends('template')

@section('content')
<div class="container">
    <h1 class="fs-4 text-secondary my-4">
        {{ __('Dashboard') }}
    </h1>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('User Dashboard') }}</div>

                <div class="card-body">

                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
        <div class="row mt-3">
               @if (auth()->user()->estAdmin)

                        <div class="col">
                            <h2>Equipe Joueur</h2>
                            <a href="/admin/equipeJoueur" class="btn btn-primary">Gèrer les equipes de joueurs</a>

                        </div>
                        <div class="col">
                            <h2>Equipe Pedagogique</h2>
                            <a href="/admin/equipePedagogique" class="btn btn-primary">Gèrer les equipes
                                pédagogiques</a>
                        </div>
                        <div class="col">
                            <h2>Article / Actualité</h2>
                            <a href="/admin/article" class="btn btn-primary">Gèrer les articles</a>
                        </div>





                    @endif
                    </div>
    </div>
</div>
@endsection
