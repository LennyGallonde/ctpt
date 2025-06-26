<header>
    <div class="top-bar">
        <img src="{{ asset('image/Logo.jpg') }}" alt="Logo Club" class="logo">
        <nav>
            <ul>
                <li><a href="/accueil">Accueil</a></li>
                <li><a href="/inscription">Inscription</a></li>

                <li class="submenu-parent">
                    <a href="/club">Le Club</a>
                    <ul class="submenu">
                        <li><a href="/club/bureau">Le Bureau</a></li>
                        <li><a href="/club/equipe-pedagogique">L'Équipe pédagogique</a></li>
                        <li><a href="/club/equipes">Les Équipes</a></li>
                        <li><a href="/club/structures">Les Structures</a></li>
                    </ul>
                </li>
                {{-- Verifie que l'utilisateur est connecter --}}
                @auth
                {{-- Vérifier que l'utilisateur est admin --}}
                @if (auth()->user()->estAdmin)
                <li class="submenu-parent">
                    <a href="#">Equipes de joueurs</a>
                    <ul class="submenu">
                        <li><a href="/admin/EquipeJoueur">Gèrer les equipes de joueurs</a></li>
                        <li><a href="/admin/EquipeJoueur">Ajouter une equipe</a></li>

                    </ul>
                </li>
                @endif
                @endauth
                <li><a href="#">Compétitions</a></li>
                <li><a href="#">Infos Pratiques</a></li>
                <li><a href="#">Contact</a></li>
                @auth
                <li class="submenu-parent">
                    <a href="#">Mon profil</a>
                    <ul class="submenu">
                        <li>
                            <a href="{{ url('dashboard') }}">{{__('Dashboard')}}</a>
                        </li>
                        <li>
                            <a href="{{ url('profile') }}">{{__('Profile')}}</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a class="btn-reserver" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                </li>
                @endauth
            </ul>
        </nav>
        <a href="#" class="btn-reserver">Réservez un court</a>
    </div>
</header>
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
