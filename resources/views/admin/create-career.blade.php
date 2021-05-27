@extends('layouts.app')

@section('title', '- Crée une carrière')

@section('content')

    @include('components.head')

    <link rel="stylesheet" type="text/css" href="{{ asset('css/input-file.css') }}">

    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center mt-3 mb-3">
                <h1>Crée une carrière</h1>
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
                                                        {{ date('d/m/Y à H:i', strtotime(Auth::user()->created_at)) }}</small>
                                                </div>
                                                <div class="text-muted"><i
                                                        class="fas fa-coins text-info mr-2"></i><small>Mes
                                                        crédits : <b>{{ Auth::user()->credits }}</b></small></div>
                                            </div>
                                        </div>
                                    </div>

                                    <hr />

                                    <div class="col-md-12 m-auto" style="justify-content: center;display: flex;">
                                        <div class="card" style="width: 605px !important;">

                                            <div class="card-body">
                                                <form method="POST" enctype="multipart/form-data"
                                                    action="{{ route('career_create_post') }}">
                                                    @csrf

                                                    <div class="form-group row">
                                                        <label for="name"
                                                            class="col-md-6 col-form-label text-md-right">{{ __('Titre de la carrière') }}</label>

                                                        <div class="col-md-6">
                                                            <input id="title" type="text"
                                                                class="form-control @error('title') is-invalid @enderror"
                                                                name="title" required autocomplete="title" autofocus>

                                                            @error('title')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="email"
                                                            class="col-md-6 col-form-label text-md-right">{{ __('Catégorie de la carrière') }}</label>

                                                        <div class="col-md-6">
                                                            <select
                                                                class="form-control js-select @error('category') is-invalid @enderror"
                                                                name="category" value="{{ old('category') }}" required
                                                                autocomplete="category">
                                                                <option value="CV et lettre de motivation">CV et lettre de motivation</option>
                                                                <option value="Entretien d’embauche">Entretien d’embauche</option>
                                                                <option value="Jeunes Diplômés">Jeunes Diplômés</option>
                                                                <option value="Seniors">Seniors</option>
                                                                <option value="Vie en entreprise">Vie en entreprise</option>
                                                            </select>

                                                            @error('category')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="content"
                                                            class="col-md-12 col-form-label text-md-right">{{ __('Description de la carrière') }}</label>

                                                        <div class="col-md-12" style="height: 100%">
                                                            <textarea id="content"
                                                                class="form-control @error('content') is-invalid @enderror"
                                                                name="content" required style="height: 250px;"></textarea>

                                                            @error('content')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group row mt-3">
                                                        <label for="name"
                                                            class="col-md-6 col-form-label text-md-right">{{ __('Carrière brouillon') }}</label>

                                                        <div class="col-md-6">
                                                            <select
                                                                class="form-control js-select @error('active') is-invalid @enderror"
                                                                name="active" value="{{ old('active') }}" required>
                                                                <option value="1">Oui</option>
                                                                <option value="0">Non</option>
                                                            </select>

                                                            @error('active')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror

                                                        </div>

                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="content"
                                                            class="col-md-12 col-form-label text-md-right">{{ __('Image de la carrière') }}</label>

                                                        <div class="col-md-12">
                                                            <input type="file" name="image" required @error('image')
                                                                is-invalid @enderror" accept="image/*" id="image"
                                                                class="form-control" />

                                                            @error('image')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group row mb-0 mt-2">
                                                        <div class="col-md-12 text-right">
                                                            <button type="submit" class="btn btn-secondary">
                                                                {{ __('Valider') }}
                                                            </button>
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
    </div>

    <script src="../../../js/input-file.js"></script>

    <script type="text/javascript">
        new InputFile({
            // options
        });

    </script>

    <script>
        CKEDITOR.replace('content', {
            language: 'fr',
            uiColor: '#9AB8F3',
            height: '250px'
        });

    </script>

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- Select 2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.js-select').select2();
        });

    </script>

@endsection
