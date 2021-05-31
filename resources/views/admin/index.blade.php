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
                                                    <img src="{{ asset(Auth::user()->avatar) }}" width="140px"
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
                                                    {{ Auth::user()->created_at->translatedFormat('l jS F Y à H:i') }}</small>
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
                                        <li class="nav-item"><a href="" id="devisBtn" class="nav-link">Demande de devis</a>
                                        </li>
                                        <li class="nav-item"><a href="" id="contactBtn" class="nav-link">Demande de
                                                contact</a>
                                        </li>
                                        <li class="nav-item"><a href="" id="careerBtn" class="nav-link">Gestion de
                                                carrière</a>
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
                                                                            {{ $news->created_at->translatedFormat('l jS F Y à H:i') }}</span>
                                                                    </span>
                                                                </td>
                                                                @if ($news->updated_at != null)
                                                                    <td>
                                                                        <span>
                                                                            <i class="far fa-clock me-1"></i><span>Le
                                                                                {{ $news->updated_at->translatedFormat('l jS F Y à H:i') }}</span>
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
                                                                            {{ $news->created_at->translatedFormat('l jS F Y à H:i') }}</span>
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

                                    <div id="devis" class="pt-3" style="display: none;">
                                        <div id="tab-2" class="tab-pane" style="pointer-events: all;">
                                            <div class="row table-responsive">

                                                <div class="col-md-12 m-auto text-center">
                                                    @foreach ($devisAll as $devis)
                                                        <a class="btn btn-secondary mr-2" data-mdb-toggle="collapse"
                                                            href="#devis_{{ $devis->id }}" role="button"
                                                            aria-expanded="false"
                                                            aria-controls="devis_{{ $devis->id }}">
                                                            Devis n°{{ $devis->id }} - {{ $devis->society }} -
                                                            {{ $devis->name }}
                                                        </a>
                                                    @endforeach
                                                </div>

                                                <div class="col-md-12 m-auto text-center">
                                                    @foreach ($devisAll as $devis)
                                                        <div class="collapse mt-3" id="devis_{{ $devis->id }}">
                                                            <div class="col-md-4 m-auto">
                                                                <ul class="list-group">
                                                                    <li class="list-group-item"><b>Status du devis :</b>
                                                                        @if ($devis->status == 0)<span
                                                                                class="badge bg-warning">Pas encore
                                                                            validé</span>@else<span
                                                                                class="badge bg-success">Devis validé</span>
                                                                        @endif
                                                                    </li>
                                                                    <li class="list-group-item"><b>Société :</b>
                                                                        {{ $devis->society }}</li>
                                                                    <li class="list-group-item"><b>Siret ou Siren:</b>
                                                                        {{ $devis->socialD }}</li>
                                                                    <li class="list-group-item"><b>Nom :</b>
                                                                        {{ $devis->name }}
                                                                    </li>
                                                                    <li class="list-group-item"><b>Email :</b>
                                                                        {{ $devis->email }}</li>
                                                                    <li class="list-group-item"><b>Nombre de salarié :</b>
                                                                        {{ $devis->salarie }}</li>
                                                                    <li class="list-group-item"><b>Nombre de poste :</b>
                                                                        {{ $devis->typePoste }}</li>
                                                                    <li class="list-group-item"><b>Adresse :</b>
                                                                        {{ $devis->adress }}</li>
                                                                    <li class="list-group-item"><b>Ville :</b>
                                                                        {{ $devis->city }}</li>
                                                                    <li class="list-group-item"><b>Code postal :</b>
                                                                        {{ $devis->cp }}</li>
                                                                    <li class="list-group-item"><b>Pays :</b>
                                                                        {{ $devis->pays }}
                                                                    </li>
                                                                    <li class="list-group-item"><b>Content :</b>
                                                                        <br />{{ $devis->content }}
                                                                    </li>
                                                                    <li class="list-group-item"><b>Document :</b>
                                                                        <a href="{{ asset('admin/documents') }}/{{ $devis->doc }}"
                                                                            target="_blank">{{ $devis->doc }}</a>
                                                                    </li>
                                                                    <li class="list-group-item"><b>Date de création :</b>
                                                                        {{ $news->created_at->translatedFormat('l jS F Y à H:i') }}
                                                                    </li>
                                                                </ul>

                                                                <div class="mt-3">
                                                                    @if ($devis->status == 0)
                                                                        <a href="{{ route('reply_devis', $devis->id) }}"
                                                                            class="btn btn-success mr-2"><i
                                                                                class="fas fa-reply mr-2"></i>Accepter le
                                                                            devis</a>
                                                                    @else
                                                                        <a href="mailto:{{ $devis->email }}"
                                                                            class="btn btn-info mr-2"><i
                                                                                class="fas fa-reply mr-2"></i>Envoyer un
                                                                            email</a>
                                                                    @endif
                                                                    <a href="{{ route('delete_devis', $devis->id) }}"
                                                                        class="btn btn-danger"><i
                                                                            class="fas fa-trash mr-2"></i>Supprimer le
                                                                        devis</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>

                                                <div class="d-flex justify-content-center mt-3">
                                                    {!! $devisAll->links() !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="contact" class="pt-3" style="display: none;">
                                        <div id="tab-2" class="tab-pane" style="pointer-events: all;">
                                            <div class="row table-responsive">

                                                <table class="table table-hover text-nowrap">
                                                    <thead class="text-center">
                                                        <tr>
                                                            <th scope="col">Numéro de support</th>
                                                            <th scope="col">Date de création</th>
                                                            <th scope="col">Nom d'utilisateur</th>
                                                            <th scope="col">Adresse email</th>
                                                            <th scope="col">Status</th>
                                                            <th scope="col">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="text-center" style="vertical-align: middle;">
                                                        @foreach ($contactAll as $contacts)
                                                            <tr>
                                                                <td>
                                                                    <span class="text-bold">
                                                                        <a href="" data-mdb-toggle="modal"
                                                                            data-mdb-target="#modalContact_view_{{ $contacts->support_id }}">{{ $contacts->support_id }}</a>
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    <span>Le 
                                                                        {{ $news->created_at->translatedFormat('l jS F Y à H:i') }}
                                                                    </span>
                                                                </td>
                                                                @foreach (userId($contacts->user_id) as $user)
                                                                    <td>
                                                                        {{ $user->username }}
                                                                    </td>
                                                                    <td>
                                                                        {{ $user->email }}
                                                                    </td>
                                                                @endforeach
                                                                <td>
                                                                    @if ($contacts->status == 0)
                                                                        <i class="fas fa-thumbtack mr-1 text-danger"></i>
                                                                        Demande non résolu
                                                                    @else
                                                                        <i class="fas fa-thumbtack mr-1 text-success"></i>
                                                                        Demande résolu
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if ($contacts->status == 0)
                                                                        <a data-mdb-toggle="modal"
                                                                            data-mdb-target="#modalContact_{{ $contacts->id }}"
                                                                            class="btn btn-warning" href=""><i
                                                                                class="fas fa-reply"></i></a>

                                                                        <a class="btn btn-success"
                                                                            href="{{ route('resolved_contact', $contacts->id) }}"><i
                                                                                class="fas fa-check"></i></a>
                                                                    @endif
                                                                    <a class="btn btn-danger"
                                                                        href="{{ route('delete_contact', $contacts->id) }}"><i
                                                                            class="fas fa-trash"></i></a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>

                                                <div class="d-flex justify-content-center">
                                                    {!! $contactAll->links() !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="career" class="pt-3" style="display: none;">
                                        <div id="tab-2" class="tab-pane" style="pointer-events: all;">
                                            <div class="row table-responsive">

                                                <table class="table table-hover text-nowrap">
                                                    <thead class="text-center">
                                                        <tr>
                                                            <th scope="col">Titre</th>
                                                            <th scope="col">Date de création</th>
                                                            <th scope="col">Date de modification</th>
                                                            <th scope="col">Autheur</th>
                                                            <th scope="col">Catégorie</th>
                                                            <th scope="col">Status</th>
                                                            <th scope="col">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="text-center" style="vertical-align: middle;">
                                                        @foreach ($careerAll as $careers)
                                                            <tr>
                                                                <td>
                                                                    <a
                                                                        href="{{ route('career', [$careers->id, strtolower(str_replace('?', '', str_replace(' ', '-', $careers->title)))]) }}"><span
                                                                            class="text-bold">
                                                                            {{ $careers->title }}
                                                                        </span>
                                                                    </a>
                                                                </td>
                                                                <td>
                                                                    <span>Le 
                                                                        {{ $news->created_at->translatedFormat('l jS F Y à H:i') }}
                                                                    </span>
                                                                </td>
                                                                @if ($careers->updated_at != null)
                                                                    <td>
                                                                        <span>
                                                                            <i class="far fa-clock me-1"></i><span>Le
                                                                                {{ $news->created_at->translatedFormat('l jS F Y à H:i') }}</span>
                                                                        </span>
                                                                    </td>
                                                                @else
                                                                    <td>
                                                                        <span>
                                                                            Carrière non modifié
                                                                        </span>
                                                                    </td>
                                                                @endif
                                                                <td>
                                                                    {{ $careers->author }}
                                                                </td>
                                                                <td>
                                                                    {{ $careers->category }}
                                                                </td>
                                                                <td>
                                                                    <span>
                                                                        @if ($careers->active == 1)<i
                                                                            class="fas fa-check me-1 text-success"></i>@else
                                                                            <i
                                                                                class="far fa-hourglass text-warning me-1"></i>
                                                                        @endif<span>
                                                                            @if ($careers->active == 1) En ligne
                                                                            @else Brouillon @endif
                                                                        </span>
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    @if ($careers->active != 1)
                                                                        <a href="{{ route('career_validate', [$careers->id]) }}"
                                                                            class="btn btn-success btn-sm px-3 mr-1">
                                                                            <i class="fas fa-check"></i>
                                                                        </a>
                                                                    @else
                                                                        <a href="{{ route('career_invalidate', [$careers->id]) }}"
                                                                            class="btn btn-secondary btn-sm px-3 mr-1">
                                                                            <i class="fas fa-hourglass"></i>
                                                                        </a>
                                                                    @endif

                                                                    <a href="{{ route('career_update', $careers->id) }}"
                                                                        class="btn btn-warning btn-sm px-3 mr-1">
                                                                        <i class="fas fa-pencil-alt"></i>
                                                                    </a>

                                                                    <a href="{{ route('career_delete', $careers->id) }}"
                                                                        class="btn btn-danger btn-sm px-3">
                                                                        <i class="fas fa-trash"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>

                                                <div class="d-flex justify-content-center">
                                                    {!! $careerAll->links() !!}
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col d-flex justify-content-end">
                                                    <a href="{{ route('career_create') }}"
                                                        class="btn btn-success ml-1">Crée
                                                        une carrière</a>
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

    <!-- Modal Contact -->
    @foreach ($contactAll as $contacts)
        <div class="modal fade" id="modalContact_{{ $contacts->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Répondre au ticket n°{{ $contacts->support_id }}</h5>
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form action="{{ route('reply_contact', $contacts->id) }}" method="POST">

                        <div class="modal-body">

                            @csrf

                            <div class="mb-4">
                                <label class="form-label">Votre réponse</label>
                                <textarea class="form-control" style="height: 250px;" required @error('content') is-invalid
                                    @enderror name="content" rows="4"></textarea>

                                @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Envoyer le message</button>
                            <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">
                                Fermer
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Modal Contact -->
    @foreach ($contactAllreply as $contacts)
        <div class="modal fade" id="modalContact_view_{{ $contacts->support_id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Message du ticket n°{{ $contacts->support_id }}</h5>
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="row d-flex justify-content-center mt-3">
                            @foreach ($contactAllreply as $contacts)
                                <div class="col-md-8 col-lg-6 mb-2">
                                    <div class="card shadow-0 border" style="background-color: #f0f2f5;">
                                        <div class="card-body p-3">
                                            <div class="card mb-0">
                                                <div class="card-body">
                                                    <p>{!! html_entity_decode($contacts->content) !!}</p>

                                                    <div class="d-flex justify-content-between">
                                                        <div class="d-flex flex-row align-items-center">
                                                            <img src="@foreach (userId($contacts->reply_id) as $user) {{ asset($user->avatar) }} @endforeach"
                                                            alt="@foreach (userId($contacts->reply_id) as $user)
                                                                {{ $user->username }} @endforeach" width="25" height="25"
                                                                />
                                                                <p class="small mb-0 ms-2">
                                                                    @foreach (userId($contacts->reply_id) as $user)
                                                                        {{ $user->username }} @endforeach
                                                                </p>
                                                        </div>
                                                        <div class="d-flex flex-row align-items-center">
                                                            <p class="small text-muted mb-0">Le
                                                                {{ $contacts->created_at->translatedFormat('l jS F Y à H:i') }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">
                            Fermer
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <script type="text/javascript">
        var newsBtn = document.getElementById('newsBtn'),
            usersBtn = document.getElementById('usersBtn'),
            devisBtn = document.getElementById('devisBtn'),
            contactBtn = document.getElementById('contactBtn'),
            careerBtn = document.getElementById('careerBtn'),
            displayNews = document.getElementById('news'),
            displayUsers = document.getElementById('users'),
            displayDevis = document.getElementById('devis'),
            displayContact = document.getElementById('contact'),
            displayCareer = document.getElementById('career');

        newsBtn.addEventListener('click', function(e) {

            e.preventDefault();

            newsBtn.classList.add('active');
            usersBtn.classList.remove('active');
            devisBtn.classList.remove('active');
            contactBtn.classList.remove('active');
            careerBtn.classList.remove('active');

            displayNews.style.display = 'block';
            displayUsers.style.display = 'none';
            displayDevis.style.display = 'none';
            displayContact.style.display = 'none';
            displayCareer.style.display = 'none';

            return false;

        });

        usersBtn.addEventListener('click', function(e) {

            e.preventDefault();

            newsBtn.classList.remove('active');
            usersBtn.classList.add('active');
            devisBtn.classList.remove('active');
            contactBtn.classList.remove('active');
            careerBtn.classList.remove('active');

            displayNews.style.display = 'none';
            displayUsers.style.display = 'block';
            displayDevis.style.display = 'none';
            displayContact.style.display = 'none';
            displayCareer.style.display = 'none';

            return false;

        });

        devisBtn.addEventListener('click', function(e) {

            e.preventDefault();

            newsBtn.classList.remove('active');
            usersBtn.classList.remove('active');
            devisBtn.classList.add('active');
            contactBtn.classList.remove('active');
            careerBtn.classList.remove('active');

            displayNews.style.display = 'none';
            displayUsers.style.display = 'none';
            displayDevis.style.display = 'block';
            displayContact.style.display = 'none';
            displayCareer.style.display = 'none';

            return false;

        });

        contactBtn.addEventListener('click', function(e) {

            e.preventDefault();

            newsBtn.classList.remove('active');
            usersBtn.classList.remove('active');
            devisBtn.classList.remove('active');
            contactBtn.classList.add('active');
            careerBtn.classList.remove('active');

            displayNews.style.display = 'none';
            displayUsers.style.display = 'none';
            displayDevis.style.display = 'none';
            displayContact.style.display = 'block';
            displayCareer.style.display = 'none';

            return false;

        });

        careerBtn.addEventListener('click', function(e) {

            e.preventDefault();

            newsBtn.classList.remove('active');
            usersBtn.classList.remove('active');
            devisBtn.classList.remove('active');
            contactBtn.classList.remove('active');
            careerBtn.classList.add('active');

            displayNews.style.display = 'none';
            displayUsers.style.display = 'none';
            displayDevis.style.display = 'none';
            displayContact.style.display = 'none';
            displayCareer.style.display = 'block';

            return false;

        });

    </script>

@endsection
