@extends('layouts.app')

@section('title', '- Administration')

@section('content')

    @include('components.head')

    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center mt-3 mb-3">
                <h1>Administrer le site internet</h1>
                <hr />
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row flex-lg-nowrap">
            <div class="col">
                <div class="row">
                    <div class="col mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="e-profile">
                                    <div class="row">
                                        <div class="col-12 col-sm-auto mb-3">
                                            <div class="mx-auto" style="width: 140px;">
                                                <div class="d-flex justify-content-center align-items-center rounded"
                                                    style="height: 140px; background-color: rgb(233, 236, 239);">
                                                    <img src="../images/avatar/{{ Auth::user()->avatar }}" width="140px"
                                                        alt="{{ Auth::user()->username }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                            <div class="text-center text-sm-left mb-2 mb-sm-0">
                                                <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">{{ Auth::user()->lastname }} -
                                                    {{ Auth::user()->firstname }}</h4>
                                                <p class="mb-0">{{ Auth::user()->email }}</p>
                                                <div class="text-muted"><small>{{ Auth::user()->username }}</small></div>
                                            </div>
                                            <div class="text-right text-sm-right">
                                                <span class="badge @if (Auth::user()->roles ==
                                                'ROLES_USER') bg-success @elseif(Auth::user()->roles ==
                                                'ROLES_ADMIN') bg-danger @elseif(Auth::user()->roles ==
                                                    'ROLES_RECRUTER') bg-info @endif">@if (Auth::user()->roles == 'ROLES_USER')
                                                    Utilisateur @elseif(Auth::user()->roles == 'ROLES_ADMIN')
                                                    Administrateur @elseif(Auth::user()->roles == 'ROLES_RECRUTER')
                                                        Recruteur @endif</span>
                                                <div class="text-muted"><small>Inscrit le
                                                        {{ date('d/m/Y à H:i', strtotime(Auth::user()->created_at)) }}</small>
                                                </div>
                                                <div class="text-muted"><i
                                                        class="fas fa-coins text-info mr-2"></i><small>Mes
                                                        crédits : <b>{{ Auth::user()->credits }}</b></small></div>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="nav nav-tabs" style="justify-content: center;">
                                        <li class="nav-item"><a href="" id="newsBtn" class="active nav-link">Les
                                                actualités</a>
                                        </li>
                                        <li class="nav-item"><a href="" id="usersBtn" class="nav-link">Les
                                                utilisateurs</a>
                                        </li>
                                    </ul>

                                    <div id="news" class="pt-3">

                                        @if ($message = Session::get('success'))
                                            <div class="col-md-4 text-center" style="margin: 0 auto;">
                                                <div class="alert alert-success alert-block">
                                                    <i class="fas fa-check mr-1 text-success"></i>
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($message = Session::get('error'))
                                            <div class="col-md-4 text-center" style="margin: 0 auto;">
                                                <div class="alert alert-danger alert-block">
                                                    <i class="fas fa-times mr-1 text-danger"></i>
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            </div>
                                        @endif

                                        <div id="tab-1" class="tab-pane active" style="pointer-events: all;">
                                            <div class="row table-responsive">

                                                <table class="table table-hover text-nowrap">
                                                    <thead class="text-center">
                                                        <tr>
                                                            <th scope="col">Titre</th>
                                                            <th scope="col">Date de création</th>
                                                            <th scope="col">Date de modification</th>
                                                            <th scope="col">Publié</th>
                                                            <th scope="col">Vue</th>
                                                            <th scope="col">Mention j'aime</th>
                                                            <th scope="col">Commentaire</th>
                                                            <th scope="col">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="text-center" style="vertical-align: middle;">
                                                        @foreach ($newsAll as $news)
                                                            <tr>
                                                                <td>
                                                                    <span class="text-bold">
                                                                        <span><a
                                                                                href="{{ url('emplois', [$news->id, $news->author]) }}">{{ $news->title }}</a></span>
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    <span>
                                                                        <i class="far fa-clock me-1"></i><span>Le
                                                                            {{ date('d/m/Y à H:i', strtotime($news->created_at)) }}</span>
                                                                    </span>
                                                                </td>
                                                                @if ($news->updated_at != null)
                                                                    <td>
                                                                        <span>
                                                                            <i class="far fa-clock me-1"></i><span>Le
                                                                                {{ date('d/m/Y à H:i', strtotime($news->updated_at)) }}</span>
                                                                        </span>
                                                                    </td>
                                                                @else
                                                                    <td>
                                                                        <span>
                                                                            Article non modifié
                                                                        </span>
                                                                    </td>
                                                                @endif
                                                                <td>
                                                                    <span>
                                                                        @if ($news->active == 1)<i
                                                                            class="fas fa-check me-1 text-success"></i>@else
                                                                            <i
                                                                                class="far fa-hourglass text-warning me-1"></i>
                                                                        @endif<span>
                                                                            @if ($news->active == 1) En ligne
                                                                            @else Brouillon @endif
                                                                        </span>
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    <span>
                                                                        <i
                                                                            class="fas fa-eye me-1 text-info"></i><span>{{ $news->vue }}</span>
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    <span>
                                                                        <i
                                                                            class="far fa-thumbs-up me-1 text-danger"></i><span>{{ $news->likes }}</span>
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    <span>
                                                                        <i
                                                                            class="fas fa-comments me-1 text-warning"></i><span>{{ $news->comments }}</span>
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    @if ($news->active != 1)
                                                                        <a href="{{ route('news_validate', [$news->id]) }}"
                                                                            class="btn btn-success btn-sm px-3 mr-1">
                                                                            <i class="fas fa-check"></i>
                                                                        </a>
                                                                    @else
                                                                        <a href="{{ route('news_invalidate', [$news->id]) }}"
                                                                            class="btn btn-secondary btn-sm px-3 mr-1">
                                                                            <i class="fas fa-hourglass"></i>
                                                                        </a>
                                                                    @endif

                                                                    <a href="{{ route('news_update', [$news->id]) }}"
                                                                        class="btn btn-warning btn-sm px-3 mr-1">
                                                                        <i class="fas fa-pencil-alt"></i>
                                                                    </a>

                                                                    <a href="{{ route('news_delete', [$news->id]) }}"
                                                                        class="btn btn-danger btn-sm px-3">
                                                                        <i class="fas fa-trash"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>

                                                <div class="d-flex justify-content-center">
                                                    {!! $newsAll->links() !!}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col d-flex justify-content-end">
                                                    <a href="{{ route('news_create') }}"
                                                        class="btn btn-success ml-1">Crée
                                                        un article</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="users" class="pt-3" style="display: none;">

                                        @if ($message = Session::get('success'))
                                            <div class="col-md-4 text-center" style="margin: 0 auto;">
                                                <div class="alert alert-success alert-block">
                                                    <i class="fas fa-check mr-1 text-success"></i>
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($message = Session::get('error'))
                                            <div class="col-md-4 text-center" style="margin: 0 auto;">
                                                <div class="alert alert-danger alert-block">
                                                    <i class="fas fa-times mr-1 text-danger"></i>
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            </div>
                                        @endif

                                        <div id="tab-2" class="tab-pane" style="pointer-events: all;">
                                            <div class="row table-responsive">

                                                <table class="table table-hover text-nowrap">
                                                    <thead class="text-center">
                                                        <tr>
                                                            <th scope="col">Nom d'utilisateur</th>
                                                            <th scope="col">Rôle</th>
                                                            <th scope="col">Nom et Prénom</th>
                                                            <th scope="col">Adresse email</th>
                                                            <th scope="col">Status</th>
                                                            <th scope="col">Bannis</th>
                                                            <th scope="col">Date de création</th>
                                                            <th scope="col">Crédits</th>
                                                            <th scope="col">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="text-center" style="vertical-align: middle;">
                                                        @foreach ($usersAll as $users)
                                                            <tr>
                                                                <td>
                                                                    <span class="text-bold">
                                                                        {{ $users->username }}
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    <span class="text-bold">
                                                                        @if ($users->roles == 'ROLES_ADMIN')
                                                                            Administrateur
                                                                        @elseif ($users->roles == 'ROLES_USER')
                                                                            Utilisateur
                                                                        @elseif ($users->roles == 'ROLES_RECRUTER')
                                                                            Recruteur
                                                                        @endif
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    <span>
                                                                        <span>{{ $users->lastname }}
                                                                            {{ $users->firstname }}</span>
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    <span>
                                                                        <span>{{ $users->email }}</span>
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    <span>
                                                                        @if ($users->email_verified_at == null)<i
                                                                                class="far fa-hourglass text-warning me-1"></i>
                                                                        @else
                                                                            <i class="fas fa-check me-1 text-success"></i>
                                                                        @endif
                                                                        <span>
                                                                            @if ($users->email_verified_at != null)
                                                                                Compte actif
                                                                            @else Compte inactif @endif
                                                                        </span>
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    <span>
                                                                        @if ($users->blocked_at != null)<i
                                                                                class="fas fa-times text-danger me-1"></i>
                                                                        @else
                                                                            <i class="fas fa-check me-1 text-success"></i>
                                                                        @endif
                                                                        <span>
                                                                            @if ($users->blocked_at == null)
                                                                                Compte actif
                                                                            @else Compte bannis @endif
                                                                        </span>
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    <span>
                                                                        <i class="far fa-clock me-1"></i><span>Le
                                                                            {{ date('d/m/Y à H:i', strtotime($users->created_at)) }}</span>
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    <span>
                                                                        {{ $users->credits }}
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    @if ($users->blocked_at != null)
                                                                        <a href="{{ route('users_validate', [$users->id]) }}"
                                                                            class="btn btn-success btn-sm px-3 mr-1">
                                                                            <i class="fas fa-check"></i>
                                                                        </a>
                                                                    @else
                                                                        <a href="{{ route('users_invalidate', [$users->id]) }}"
                                                                            class="btn btn-danger btn-sm px-3 mr-1">
                                                                            <i class="fas fa-ban"></i>
                                                                        </a>
                                                                    @endif

                                                                    @if ($users->roles != 'ROLES_ADMIN')
                                                                    <a href="{{ route('remove_users', [$users->id]) }}"
                                                                        class="btn btn-danger btn-sm px-3 mr-1">
                                                                        <i class="fas fa-times"></i>
                                                                    </a>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>

                                                <div class="d-flex justify-content-center">
                                                    {!! $usersAll->links() !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script type="text/javascript">
        var newsBtn = document.getElementById('newsBtn'),
            usersBtn = document.getElementById('usersBtn'),
            displayNews = document.getElementById('news'),
            displayUsers = document.getElementById('users');

        newsBtn.addEventListener('click', function(e) {

            e.preventDefault();

            newsBtn.classList.add('active');
            usersBtn.classList.remove('active');

            displayNews.style.display = 'block';
            displayUsers.style.display = 'none';

            return false;

        });

        usersBtn.addEventListener('click', function(e) {

            e.preventDefault();

            newsBtn.classList.remove('active');
            usersBtn.classList.add('active');

            displayNews.style.display = 'none';
            displayUsers.style.display = 'block';

            return false;

        });

    </script>

@endsection
