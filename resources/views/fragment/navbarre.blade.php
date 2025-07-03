<header>
    <div class="top-bar">
        <span class="logos-wrapper">
  <img src="{{ asset('image/Logo.jpg') }}" alt="Logo Club" class="logo">
  <img src="{{ asset('image/LogoS.jpg') }}" alt="Logo Squash" class="logo">
</span>

        <nav>
            <ul>
                <li><a href="/accueil">Accueil</a></li>
                <li><a href="/inscription">Tarif</a></li>

                <li class="submenu-parent">
                    <a href="/club">Le Club</a>
                    <ul class="submenu">
                        <li><a href="/club/ep">L'Équipe pédagogique</a></li>
                        <li><a href="/club/ej">Les Équipes</a></li>
                        <li><a href="/club/structures">Les Structures</a></li>
                    </ul>
                </li>

                {{-- Vérifie que l'utilisateur est connecté --}}
                @auth
                    {{-- Vérifie que l'utilisateur est admin --}}
                    @if (auth()->user()->estAdmin)
                    <li class="submenu-parent">
                        <a href="#">Équipes de joueurs</a>
                        <ul class="submenu">
                            <li><a href="/admin/EquipeJoueur">Gérer les équipes de joueurs</a></li>
                            <li><a href="/admin/EquipeJoueur/create">Ajouter une équipe</a></li>
                        </ul>
                    </li>
                    @endif
                @endauth

                <li class="submenu-parent">
                    <a href="#">Compétitions</a>
                    <ul class="submenu">
                        <li>
                            <a href="#" onclick="document.getElementById('aftsForm').submit(); return false;">
                                AFTS +
                            </a>
                        </li>
                        <li>
                            <a href="https://tenup.fft.fr/club/57940454/competitions" target="_blank">
                                TENN'UP
                            </a>
                        </li>
                    </ul>
                </li>

                <li><a href="/visiteur/article">Actualités</a></li>
                <li><a href="/contact">Contact</a></li>

                {{-- Sous-menu Squash --}}
                <li class="submenu-parent">
                    <a href="#">Squash</a>
                    <ul class="submenu">
                        <li><a href="/squash/competitions">Compétitions</a></li>
                        <li><a href="/squash/actualites">Actualités</a></li>
                        <li><a href="/squash/tarif">Tarifs</a></li>
                    </ul>
                </li>

                @auth
                <li class="submenu-parent">
                    <a href="#">Mon profil</a>
                    <ul class="submenu">
                        <li><a href="{{ url('dashboard') }}">{{ __('Dashboard') }}</a></li>
                        <li><a href="{{ url('profile') }}">{{ __('Profile') }}</a></li>
                    </ul>
                </li>
                <li>
                    <a class="btn-reserver" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                </li>
                @endauth
            </ul>
        </nav>
        @guest
        <a href="{{ route('login') }}" class="btn-reserver">Se connecter</a>
        @endguest
    </div>
</header>

{{-- Formulaire caché pour AFTS+ --}}
<form id="aftsForm"
      action="https://challenges.afts-plus.fr/Competition"
      method="POST"
      target="_blank"
      style="display: none;">
    <input type="hidden" name="codeclub" value="57940454">
</form>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
