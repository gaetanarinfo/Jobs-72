<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid justify-content-between">
        <!-- Left elements -->
        <div class="d-flex">
            <!-- Brand -->
            <a class="navbar-brand me-2 mb-1 d-flex align-items-center" href="/">
                <img src="{{ asset('logo.png') }}" height="30" alt="Jobs-72" loading="lazy"
                    style="margin-top: 2px;" />
            </a>
        </div>
        <!-- Left elements -->

        <!-- Mobile -->
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarTogglerDemo02"
            aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="/" title="Accueil">
                        <span><i class="fas fa-home fa-lg text-success mr-2"></i> Accueil</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('offres-emploi') }}" title="Offres d'emploi">
                        <span><i class="fas fa-flag fa-lg text-info mr-2"></i> Offres d'emploi</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('actualites') }}" title="Nos actualités">
                        <span><i class="far fa-newspaper text-primary mr-2"></i> Nos actualités</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" title="Conseils carrière">
                        <span><i class="fas fa-cog fa-lg text-warning mr-2"></i> Conseils carrière</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/profile" title="Mon profil">
                        <span><i class="fas fa-user fa-lg text-secondary mr-2"></i> Mon profil</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a @if (Auth::user())  @if (Auth::user()->roles=='ROLES_RECRUTER' ||
                        Auth::user()->roles=='ROLES_ADMIN') href="{{ url('recruter') }}" @endif @else href="{{ url('login') }}" @endif class="btn btn-info ripple-surface
                        ripple-surface-dark">Accès
                        Recruteurs</a>

                    @if (Auth::user())
                        @if (Auth::user()->roles == 'ROLES_ADMIN')
                            <a href="{{ route('admin') }}" class="btn btn-secondary ripple-surface
                            ripple-surface-dark ml-3">Administration</a>
                        @endif
                    @endif
                </li>
            </ul>
        </div>

        <!-- Right elements -->
        <ul class="navbar-nav flex-row">

            <ul class="navbar-nav">
                <!-- Icon dropdown -->
                <li class="nav-item dropdown">
                    @if (session('locale') == 'fr')
                        <a class="nav-link dropdown-toggle pr-3" href="#" id="navbarDropdown" role="button"
                            data-mdb-toggle="dropdown" aria-expanded="false">
                            <i class="france flag m-0"></i>
                        </a>
                    @else
                        <a class="nav-link dropdown-toggle pr-3" href="#" id="navbarDropdown" role="button"
                            data-mdb-toggle="dropdown" aria-expanded="false">
                            <i class="united kingdom flag m-0"></i>
                        </a>
                    @endif

                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                        @if (session('locale') == 'en')
                            <li>
                                <a class="dropdown-item"><i class="united kingdom flag"></i>English <i
                                        class="fa fa-check text-success ms-2"></i></a>
                            </li>
                            <li class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item" href="{{ route('language', 'fr') }}"><i
                                        class="france flag"></i>Français</a>
                            </li>
                        @else
                            <li>
                                <a class="dropdown-item"><i class="france flag"></i>Français <i
                                        class="fa fa-check text-success ms-2"></i></a>
                            </li>
                            <li class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item" href="{{ route('language', 'en') }}"><i
                                        class="united kingdom flag"></i>English</a>
                            </li>
                        @endif

                    </ul>
                </li>
            </ul>

            <li class="nav-item">
                @guest
                    @if (Route::has('login'))
                        <a class="nav-link pr-4" href="{{ route('login') }}">
                            <span><i class="fas fa-user text-success mr-1"></i> Connexion</span>
                        </a>
                    @endif
                @else
                    <a class="nav-link pr-3" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                                                                                                document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt text-danger mr-1"></i> Déconnexion
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @endguest
            </li>

        </ul>
        <!-- Right elements -->
    </div>
</nav>
<!-- Navbar -->
