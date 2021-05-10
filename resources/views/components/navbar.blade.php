<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid justify-content-between">
        <!-- Left elements -->
        <div class="d-flex">
            <!-- Brand -->
            <a class="navbar-brand me-2 mb-1 d-flex align-items-center" href="/">
                <img src="{{ asset('logo.png') }}" height="30" alt="Jobs-72" loading="lazy"
                    style="margin-top: 2px;" />
            </a>

            <!-- Search form -->
            <form class="input-group w-auto my-auto d-none d-sm-flex">
                <input autocomplete="off" type="search" class="form-control rounded"
                    placeholder="Faites une recherche..." style="min-width: 125px;" />
                <span class="input-group-text border-0 d-none d-lg-flex"><button id="search-form" type="submit"><i
                            class="fas fa-search"></i></button></span>
            </form>
        </div>
        <!-- Left elements -->

        <!-- Center elements -->
        <ul class="navbar-nav flex-row d-none d-md-flex">
            <li class="nav-item me-3 me-lg-1">
                <a class="nav-link" href="/" title="Accueil">
                    <span><i class="fas fa-home fa-lg text-success mr-2"></i> Accueil</span>
                </a>
            </li>

            <li class="nav-item me-3 me-lg-1">
                <a class="nav-link" href="#" title="Offres d'emploi">
                    <span><i class="fas fa-flag fa-lg text-info mr-2"></i> Offres d'emploi</span>
                </a>
            </li>

            <li class="nav-item me-3 me-lg-1">
                <a class="nav-link" href="#" title="Conseils carrière">
                    <span><i class="fas fa-cog fa-lg text-warning mr-2"></i> Conseils carrière</span>
                </a>
            </li>

            <li class="nav-item me-3 me-lg-1">
                <a class="nav-link" href="/profile" title="Mon profil">
                    <span><i class="fas fa-user fa-lg text-secondary mr-2"></i> Mon profil</span>
                </a>
            </li>
        </ul>
        <!-- Center elements -->

        <!-- Right elements -->
        <ul class="navbar-nav flex-row">

            <ul class="navbar-nav">
                <!-- Icon dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle pr-3" href="#" id="navbarDropdown" role="button"
                        data-mdb-toggle="dropdown" aria-expanded="false">
                        <i class="france flag m-0"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item" href="#"><i class="france flag"></i>Français
                                <i class="fa fa-check text-success ms-2"></i></a>
                        </li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li>
                            <a class="dropdown-item" href="#"><i class="germany flag"></i>Deutsch</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#"><i class="united kingdom flag"></i>English</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#"><i class="spain flag"></i>Español</a>
                        </li>
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
                    <a class="nav-link pr-3" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt text-danger mr-1"></i> Déconnexion
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @endguest
            </li>

            <a class="btn btn-outline-info ripple-surface ripple-surface-dark">Accès Recruteurs</a>

        </ul>
        <!-- Right elements -->
    </div>
</nav>
<!-- Navbar -->
