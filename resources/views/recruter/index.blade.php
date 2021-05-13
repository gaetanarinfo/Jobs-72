@extends('layouts.app')

@section('title', '- Accès recruteurs')

@section('content')

    @include('components.head')

    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center mt-3 mb-3">
                <h1>Votre accès recruteur</h1>
                <hr/>
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
                                                    <img src="images/avatar/{{ Auth::user()->avatar }}" width="140px"
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
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item"><a href="" id="jobsBtn" class="active nav-link">Mes annonces
                                                emplois</a></li>
                                        <li class="nav-item"><a href="" id="jobsBtn2" class="nav-link">Mes candidatures
                                                refusée</a></li>
                                        <li class="nav-item"><a href="" id="jobsBtn3" class="nav-link">Mes candidatures
                                                accepter</a></li>
                                    </ul>

                                    <div id="jobs1" class="pt-3">

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
                                            <div class="row">

                                                <table class="table table-hover text-nowrap">
                                                    <thead class="text-center">
                                                        <tr>
                                                            <th scope="col">Titre</th>
                                                            <th scope="col">Date de création</th>
                                                            <th scope="col">Publié</th>
                                                            <th scope="col">Vue</th>
                                                            <th scope="col">Mention j'aime</th>
                                                            <th scope="col">Postulant</th>
                                                            <th scope="col">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="text-center">
                                                        @foreach ($jobsAll as $jobs)
                                                            <tr>
                                                                <td>
                                                                    <span class="text-bold">
                                                                        <span><a href="{{ url('emplois', [$jobs->id,  $jobs->author]) }}">{{ $jobs->title }}</a></span>
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    <span>
                                                                        <i class="far fa-clock me-1"></i><span>Le
                                                                            {{ date('d/m/Y à H:i', strtotime($jobs->created_at)) }}</span>
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    <span>
                                                                        @if ($jobs->active == 1)<i
                                                                            class="fas fa-check me-1 text-success"></i>@else
                                                                            <i
                                                                                class="far fa-hourglass text-warning me-1"></i>
                                                                        @endif<span>
                                                                            @if ($jobs->active == 1) En ligne
                                                                            @else En attente @endif
                                                                        </span>
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    <span>
                                                                        <i
                                                                            class="fas fa-eye me-1 text-info"></i><span>{{ $jobs->vue }}</span>
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    <span>
                                                                        <i
                                                                            class="far fa-thumbs-up me-1 text-danger"></i><span>{{ $jobs->likes }}</span>
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    <span>
                                                                        <i
                                                                            class="fas fa-blender-phone me-1 text-secondary"></i><span>{{ $jobs->apply }}</span>
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    @if ($jobs->active != 1)
                                                                        <a href="{{ url('/recruter/emplois/validate', [$jobs->id]) }}"
                                                                            class="btn btn-success btn-sm px-3 mr-1">
                                                                            <i class="fas fa-check"></i>
                                                                        </a>
                                                                    @else
                                                                        <a href="{{ url('/recruter/emplois/invalidate', [$jobs->id]) }}"
                                                                            class="btn btn-secondary btn-sm px-3 mr-1">
                                                                            <i class="fas fa-hourglass"></i>
                                                                        </a>
                                                                    @endif

                                                                    <a href="{{ url('/recruter/emplois/update', [$jobs->id]) }}" class="btn btn-warning btn-sm px-3 mr-1">
                                                                        <i class="fas fa-pencil-alt"></i>
                                                                    </a>

                                                                    <a href="{{ url('/recruter/emplois/delete', [$jobs->id]) }}"
                                                                        class="btn btn-danger btn-sm px-3">
                                                                        <i class="fas fa-trash"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="row">
                                                <div class="col d-flex justify-content-end">
                                                    <a href="{{ url('recruter/emplois/create') }}"
                                                        class="btn btn-success">Déposer une offre</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="jobs2" class="pt-3" style="display: none;">

                                        @if ($message = Session::get('success'))
                                            <div class="alert alert-success alert-block">
                                                <i class="fas fa-check mr-1 text-success"></i>
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @endif
                                        @if ($message = Session::get('error'))
                                            <div class="alert alert-danger alert-block">
                                                <i class="fas fa-times mr-1 text-danger"></i>
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @endif

                                        <div id="tab-1" class="tab-pane active" style="pointer-events: all;">
                                            <form class="form" method="POST" action="/">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <div class="row">
                                                    <div class="col">



                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col d-flex justify-content-end">
                                                        <button class="btn btn-success" type="submit">Sauvegarder</button>
                                                    </div>
                                                </div>
                                            </form>
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
        var jobsBtn = document.getElementById('jobsBtn'),
            jobsBtn2 = document.getElementById('jobsBtn2'),
            displayJobs1 = document.getElementById('jobs1'),
            displayJobs2 = document.getElementById('jobs2');

        jobsBtn.addEventListener('click', function(e) {

            e.preventDefault();

            jobsBtn.classList.add('active');
            jobsBtn2.classList.remove('active');

            displayJobs1.style.display = 'block';
            displayJobs2.style.display = 'none';

            return false;

        });

        jobsBtn2.addEventListener('click', function(e) {

            e.preventDefault();

            jobsBtn.classList.remove('active');
            jobsBtn2.classList.add('active');

            displayJobs1.style.display = 'none';
            displayJobs2.style.display = 'block';

            return false;

        });

    </script>

@endsection
