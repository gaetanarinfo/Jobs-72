@extends('layouts.app')

@section('title', '- Editer le poste - ' . $jobs->title)

@section('content')

    @include('components.head')

    <link rel="stylesheet" type="text/css" href="{{ asset('css/input-file.css') }}">

    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center mt-3 mb-3">
                <h1>Editer le poste - {{ $jobs->title }}</h1>
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
                                                    action="{{ route('update_jobs_post', $jobs->id) }}">
                                                    @csrf

                                                    <div class="form-group row">
                                                        <label for="name"
                                                            class="col-md-6 col-form-label text-md-right">{{ __('Titre du poste') }}</label>

                                                        <div class="col-md-6">
                                                            <input id="title" type="text"
                                                                class="form-control @error('title') is-invalid @enderror"
                                                                name="title" required autocomplete="title" autofocus
                                                                value="{{ $jobs->title }}">

                                                            @error('title')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="email"
                                                            class="col-md-6 col-form-label text-md-right">{{ __('Catégorie du poste') }}</label>

                                                        <div class="col-md-6">
                                                            <select
                                                                class="form-control js-select @error('category') is-invalid @enderror"
                                                                name="category" value="{{ old('category') }}" required
                                                                autocomplete="category">
                                                                <option value="{{ $jobs->category }}" selected>
                                                                    {{ $jobs->category }}
                                                                </option>
                                                                <option>--------------</option>
                                                                <option value="Ressources-Humaines">Ressources Humaines
                                                                </option>
                                                                <option value="Commercial">Commercial</option>
                                                                <option value="Distribution-et-Grande-Distribution">
                                                                    Distribution et Grande Distribution</option>
                                                                <option
                                                                    value="Informatique-et-Technologie-de-l’information">
                                                                    Informatique et Technologie de l’information</option>
                                                                <option value="Logistique">Logistique</option>
                                                                <option value="Temps-partiel">Temps partiel</option>
                                                                <option value="Maintenance-et-Réparation">Maintenance et
                                                                    Réparation</option>
                                                                <option value="Tourisme">Tourisme</option>
                                                                <option value="Finance">Finance</option>
                                                                <option value="Alternance">Alternance</option>
                                                                <option value="Fashion">Fashion</option>
                                                                <option value="Marketing-et-Communication">Marketing et
                                                                    Communication</option>
                                                                <option value="Restauration">Restauration</option>
                                                                <option value="Transport">Transport</option>
                                                                <option value="Environnement-et-Développement-durable">
                                                                    Environnement et Développement durable</option>
                                                                <option value="Sécurité">Sécurité</option>
                                                                <option value="Banque">Banque</option>
                                                                <option value="Psychologue">Psychologue</option>
                                                                <option value="Hôtellerie">Hôtellerie</option>
                                                                <option value="Cadres-et-Direction">Cadres et Direction
                                                                </option>
                                                                <option value="Santé">Santé</option>
                                                            </select>

                                                            @error('category')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="poste"
                                                            class="col-md-6 col-form-label text-md-right">{{ __('Contrat du poste') }}</label>

                                                        <div class="col-md-6">
                                                            <select
                                                                class="form-control js-select @error('poste') is-invalid @enderror"
                                                                name="poste" value="{{ old('poste') }}" required
                                                                autocomplete="poste">
                                                                <option selected value="">Sélectionner un contrat
                                                                </option>
                                                                <option value="{{ $jobs->poste }}" selected>
                                                                    {{ $jobs->poste }}
                                                                </option>
                                                                <option>--------------</option>
                                                                <option value="CDD">CDD
                                                                </option>
                                                                <option value="CDI">CDI
                                                                </option>
                                                                <option value="STAGE">STAGE
                                                                </option>
                                                                <option value="INTERIMAIRE">INTÉRIMAIRE
                                                                </option>
                                                            </select>

                                                            @error('poste')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="smallContent"
                                                            class="col-md-12 col-form-label text-md-right">{{ __('Courte description du poste') }}</label>

                                                        <div class="col-md-12">
                                                            <textarea id="smallContent"
                                                                class="form-control @error('smallContent') is-invalid @enderror"
                                                                name="smallContent" required maxlength="160"
                                                                style="height: 133px;">{{ $jobs->smallContent }}</textarea>

                                                            @error('smallContent')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="content"
                                                            class="col-md-12 col-form-label text-md-right">{{ __('Description du poste') }}</label>

                                                        <div class="col-md-12" style="height: 100%">
                                                            <textarea id="content"
                                                                class="form-control @error('content') is-invalid @enderror"
                                                                name="content" required
                                                                style="height: 250px;">{{ $jobs->content }}</textarea>

                                                            @error('content')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group row mt-3">
                                                        <label for="name"
                                                            class="col-md-6 col-form-label text-md-right">{{ __('Localisation du poste') }}</label>

                                                        <div class="col-md-6">
                                                            <input id="localisation" type="text"
                                                                class="form-control @error('localisation') is-invalid @enderror"
                                                                name="localisation" value="{{ $jobs->localisation }}"
                                                                required autocomplete="localisation" autofocus
                                                                placeholder="Ex: Le mans, France">

                                                            @error('localisation')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group row mt-1">
                                                        <label for="name"
                                                            class="col-md-6 col-form-label text-md-right">{{ __('Emplois visible') }}</label>

                                                        <div class="col-md-6">
                                                            <select
                                                                class="form-control js-select @error('active') is-invalid @enderror"
                                                                name="active" value="{{ old('active') }}" required
                                                                autocomplete="active">
                                                                <option value="@if ($jobs->active ==
                                                                1) 1 @else 0 @endif" selected
                                                                    >@if ($jobs->active == 1)Oui
                                                                    @else Non @endif
                                                                </option>
                                                                <option>--------------</option>
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

                                                    <div class="form-group row mt-1">
                                                        <label for="name"
                                                            class="col-md-6 col-form-label text-md-right">{{ __('Status du poste') }}</label>

                                                        <div class="col-md-6">
                                                            <input id="status" type="text"
                                                                class="form-control @error('status') is-invalid @enderror"
                                                                name="status" value="{{ $jobs->status }}" required
                                                                autocomplete="status" autofocus
                                                                placeholder="Ex: Cadre, Employé">

                                                            @error('status')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group row mt-1">
                                                        <label for="type"
                                                            class="col-md-6 col-form-label text-md-right">{{ __('Type du poste') }}</label>

                                                        <div class="col-md-6">
                                                            <input id="type" type="text"
                                                                class="form-control @error('type') is-invalid @enderror"
                                                                name="type" value="{{ $jobs->type }}" required
                                                                autocomplete="type" autofocus
                                                                placeholder="Ex: Temps plein, CDI">

                                                            @error('type')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group row mt-1">
                                                        <label for="name"
                                                            class="col-md-6 col-form-label text-md-right">{{ __('Salaire du poste') }}</label>

                                                        <div class="col-md-6">
                                                            <input id="salaire" type="text"
                                                                class="form-control @error('salaire') is-invalid @enderror"
                                                                name="salaire" value="{{ $jobs->salaire }}" required
                                                                autocomplete="salaire" autofocus
                                                                placeholder="Ex: Jusqu'à 46 000,00€ par an">

                                                            @error('salaire')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <hr />
                                                    <div class="form-group row mt-1">
                                                        <label for="name"
                                                            class="col-md-6 col-form-label text-md-right">{{ __('Avantages du poste') }}</label>

                                                        <div class="col-md-6">

                                                            @foreach (json_decode($jobs->avantages, true) as $key => $value)

                                                                <input class="form-control mb-2" type="text"
                                                                    name='avantages[{{ $key }}]'
                                                                    value='{{ $value }}'>

                                                            @endforeach

                                                        </div>

                                                    </div>
                                                    <hr />
                                                    <div class="form-group row mt-3">
                                                        <label for="name"
                                                            class="col-md-6 col-form-label text-md-right">{{ __('Horaire du poste') }}</label>

                                                        <div class="col-md-6">
                                                            @foreach (json_decode($jobs->horaires, true) as $key => $value)

                                                                <input class="form-control mb-2" type="text"
                                                                    name='horaires[{{ $key }}]'
                                                                    value='{{ $value }}'>

                                                            @endforeach

                                                            @error('horaires')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <hr />
                                                    <div class="form-group row mt-1">
                                                        <label for="name"
                                                            class="col-md-6 col-form-label text-md-right">{{ __('Télétravail') }}</label>

                                                        <div class="col-md-6">
                                                            <select
                                                                class="form-control js-select @error('teletravail') is-invalid @enderror"
                                                                name="teletravail" value="{{ old('teletravail') }}"
                                                                required autocomplete="teletravail">
                                                                <option value="@if ($jobs->teletravail
                                                                == 1) 1 @else 0 @endif"
                                                                    selected>@if ($jobs->teletravail == 1)Oui
                                                                    @else Non @endif
                                                                </option>
                                                                <option>--------------</option>
                                                                <option value="1">Oui</option>
                                                                <option value="0">Non</option>
                                                            </select>

                                                            @error('teletravail')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group row mt-1">
                                                        <label for="name"
                                                            class="col-md-6 col-form-label text-md-right">{{ __('Expèrience exigée pour le poste') }}</label>

                                                        <div class="col-md-6">
                                                            <input id="experience" type="text"
                                                                class="form-control @error('experience') is-invalid @enderror"
                                                                name="experience" value="{{ $jobs->experience }}"
                                                                required autocomplete="experience" autofocus
                                                                placeholder="Ex: Expérience exigée de 3 An(s)">

                                                            @error('experience')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group row mt-1">
                                                        <label for="name"
                                                            class="col-md-6 col-form-label text-md-right">{{ __('Expèrience exigée pour le poste') }}</label>

                                                        <div class="col-md-6">

                                                            <select
                                                                class="form-control js-select @error('experience_exiger') is-invalid @enderror"
                                                                name="experience_exiger"
                                                                value="{{ old('experience_exiger') }}" required
                                                                autocomplete="experience_exiger">
                                                                <option value="@if ($jobs->
                                                                    experience_exiger == 1) 1 @else 0 @endif" selected>@if ($jobs->experience_exiger == 1)Oui
                                                                    @else Non @endif
                                                                </option>
                                                                <option>--------------</option>
                                                                <option value="1">Oui</option>
                                                                <option value="0">Non</option>
                                                            </select>

                                                            @error('experience_exiger')
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
