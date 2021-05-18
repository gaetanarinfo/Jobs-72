@extends('layouts.app')

@section('title', '- Mon profil')

@section('content')

    @include('components.head')

    <link rel="stylesheet" type="text/css" href="css/input-file.css">

    <style>
        .select-hidden {
            display: none;
            visibility: hidden;
            padding-right: 10px;
        }

        .select {
            cursor: pointer;
            display: block;
            margin-top: 0.5em !important;
            position: relative;
            font-size: 13px;
            line-height: 23px;
            color: #fff;
            width: 220px;
            height: 40px;
            margin: 0 auto;
        }

        .select-styled {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background-color: #c0392b;
            padding: 8px 15px;
            -moz-transition: all 0.2s ease-in;
            -o-transition: all 0.2s ease-in;
            -webkit-transition: all 0.2s ease-in;
            transition: all 0.2s ease-in;
        }

        .select-styled:after {
            content: "";
            width: 0;
            height: 0;
            border: 7px solid transparent;
            border-color: #fff transparent transparent transparent;
            position: absolute;
            top: 16px;
            right: 10px;
        }

        .select-styled:hover {
            background-color: #b83729;
        }

        .select-styled:active,
        .select-styled.active {
            background-color: #ab3326;
        }

        .select-styled:active:after,
        .select-styled.active:after {
            top: 9px;
            border-color: transparent transparent #fff transparent;
        }

        .select-options {
            display: none;
            position: absolute;
            top: 100%;
            right: 0;
            left: 0;
            z-index: 999;
            margin: 0;
            padding: 0;
            list-style: none;
            background-color: #ab3326;
        }

        .select-options li {
            margin: 0;
            padding: 12px 0;
            text-indent: 15px;
            border-top: 1px solid #962d22;
            -moz-transition: all 0.15s ease-in;
            -o-transition: all 0.15s ease-in;
            -webkit-transition: all 0.15s ease-in;
            transition: all 0.15s ease-in;
        }

        .select-options li:hover {
            color: #c0392b;
            background: #fff;
        }

        .select-options li[rel="hide"] {
            display: none;
        }

    </style>

    <div class="container">
        <div class="row flex-lg-nowrap">
            <div class="col-12 col-lg-auto mb-3" style="width: 217px;">
                <div class="card p-3">
                    <div class="e-navlist e-navlist--active-bg">
                        <ul class="nav">
                            <li class="nav-item"><a class="nav-link px-2 active" href="{{ url('profile') }}"><i
                                        class="fas fa-fw fa-user mr-1 text-secondary"></i><span>Profil</span></a></li>
                            <li class="nav-item"><a class="nav-link px-2" href=""><i
                                        class="fas fa-fw fa-flag mr-1 text-info"></i><span>Offres d'emploi</span></a></li>
                            <li class="nav-item"><a class="nav-link px-2" href=""><i
                                        class="fas fa-fw fa-cog mr-1 text-warning"></i><span>Conseils carrière</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

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
                                                <div class="mt-2">
                                                    <button class="btn btn-primary" type="button" data-mdb-toggle="modal"
                                                        data-mdb-target="#changeAvatar">
                                                        <i class="fa fa-fw fa-camera"></i>
                                                        <span>Modifier la photo</span>
                                                    </button>
                                                </div>
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
                                    <ul class="nav nav-tabs" style="justify-content: center;">
                                        <li class="nav-item"><a href="" id="settingBtn"
                                                class="active nav-link">Paramètre</a></li>
                                        <li class="nav-item"><a href="" id="cvBtn" class="nav-link">Mon CV</a></li>
                                        <li class="nav-item"><a href="" id="viewBtn" class="nav-link">Visibilité</a></li>
                                        <li class="nav-item"><a href="" id="jobsBtn" class="nav-link">Mes offres
                                                postulées</a></li>
                                    </ul>

                                    <div id="setting" class="pt-3">

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
                                            <form class="form" method="POST" action="/profile">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>Nom</label>
                                                                    @if (Auth::user()->show_lastname == 0)<i
                                                                            class="far fa-eye-slash"
                                                                            data-mdb-toggle="tooltip"
                                                                        title="Non Visible"></i>@else<i
                                                                            class="fas fa-eye ml-2"
                                                                            data-mdb-toggle="tooltip" title="Visible"></i>
                                                                    @endif
                                                                    <input class="form-control mt-2" type="text"
                                                                        name="lastname"
                                                                        value="{{ Auth::user()->lastname }}">
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>Prénom</label>
                                                                    @if (Auth::user()->show_firstname == 0)<i
                                                                            class="far fa-eye-slash"
                                                                            data-mdb-toggle="tooltip"
                                                                        title="Non Visible"></i>@else<i
                                                                            class="fas fa-eye ml-2"
                                                                            data-mdb-toggle="tooltip" title="Visible"></i>
                                                                    @endif
                                                                    <input class="form-control mt-2" type="text"
                                                                        name="firstname"
                                                                        value="{{ Auth::user()->firstname }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row  mt-2 mb-2">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>Téléphone</label>
                                                                    @if (Auth::user()->show_phone == 0)<i
                                                                            class="far fa-eye-slash"
                                                                            data-mdb-toggle="tooltip"
                                                                        title="Non Visible"></i>@else<i
                                                                            class="fas fa-eye ml-2"
                                                                            data-mdb-toggle="tooltip" title="Visible"></i>
                                                                    @endif
                                                                    <input class="form-control mt-2" maxlength="14"
                                                                        pattern="[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}"
                                                                        type="tel" name="phone" placeholder="00-00-00-00-00"
                                                                        value="{{ Auth::user()->phone }}">
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>Email</label>
                                                                    @if (Auth::user()->show_email == 0)<i
                                                                            class="far fa-eye-slash"
                                                                            data-mdb-toggle="tooltip"
                                                                        title="Non Visible"></i>@else<i
                                                                            class="fas fa-eye ml-2"
                                                                            data-mdb-toggle="tooltip" title="Visible"></i>
                                                                    @endif
                                                                    <input class="form-control mt-2" type="text"
                                                                        name="email" value="{{ Auth::user()->email }}">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row  mt-2 mb-2">
                                                            <div class="col">
                                                                <label>Biographie</label>
                                                                <textarea class="form-control mt-2" maxlength="160"
                                                                    style="height: 200px;"
                                                                    name="biography">{{ Auth::user()->biography }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 col-sm-6 mb-3 m-auto">
                                                        <hr>
                                                        <div class="mb-2"><b>Changer le mot de passe</b></div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>Votre mot de passe</label>
                                                                    <input class="form-control mt-2" name="password"
                                                                        type="password" placeholder="••••••••">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-2">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>Confirmer le mot de passe</label>
                                                                    <input class="form-control mt-2" name="passwordComfirm"
                                                                        type="password" placeholder="••••••••">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col d-flex justify-content-end">
                                                        <button class="btn btn-success" type="submit">Sauvegarder</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <form class="form" method="POST" action="/profile-notif">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <div class="row">
                                                    <div class="col-12 col-sm-12 mb-3">
                                                        <hr>
                                                        <div class="mb-2"><b>Rester en contact</b></div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <label>Notifications que vous revcevez par email (Il ne sont
                                                                    pas gênant)</label>

                                                                <hr />

                                                                <div class="custom-controls-stacked px-2">
                                                                    <div class=" mb-2 mt-2">

                                                                        <div class="text-center">
                                                                            <label class="custom-control-label"
                                                                                for="news">Actualité</label>
                                                                        </div>

                                                                        <select name="notification_news"
                                                                            class="form-control mt-2">
                                                                            <option value="@if (Auth::user()->notification_news == 1) 1 @else 0 @endif"
                                                                                >
                                                                                Actualité
                                                                            </option>
                                                                            <option disabled>----------</option>
                                                                            <option value="0">Non
                                                                            </option>
                                                                            <option value="1">Oui
                                                                            </option>
                                                                        </select>

                                                                        <hr />

                                                                    </div>
                                                                    <div class="custom-control">

                                                                        <div class="text-center">
                                                                            <label class="custom-control-label"
                                                                                for="newsletter">Newsletter</label>
                                                                        </div>

                                                                        <select name="notification_newsletter"
                                                                            class="form-control mt-2">
                                                                            <option value="@if (Auth::user()->notification_newsletter ==
                                                                            1) 1 @else 0 @endif">
                                                                                Newsletter
                                                                            </option>
                                                                            <option disabled>----------</option>
                                                                            <option value="0">Non
                                                                            </option>
                                                                            <option value="1">Oui
                                                                            </option>
                                                                        </select>

                                                                        <hr />

                                                                    </div>
                                                                    <div class="custom-control mt-2">

                                                                        <div class="text-center">
                                                                            <label class="custom-control-label"
                                                                                for="emplois">Emplois</label>
                                                                        </div>

                                                                        <select name="notification_jobs"
                                                                            class="form-control mt-2">
                                                                            <option value="@if (Auth::user()->notification_jobs == 1) 1 @else 0 @endif"
                                                                                >
                                                                                Emplois
                                                                            </option>
                                                                            <option disabled>----------</option>
                                                                            <option value="0">Non
                                                                            </option>
                                                                            <option value="1">Oui
                                                                            </option>
                                                                        </select>

                                                                        <hr />

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col d-flex justify-content-end">
                                                                <button class="btn btn-success" type="submit">Sauvegarder
                                                                    les notifications</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <div id="cv" class="pt-3 mb-3" style="display: none;">
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

                                        <div id="tab-2" class="tab-pane" style="pointer-events: all;">

                                            <div class="alert alert-secondary text-center" role="alert"
                                                data-mdb-color="primary">
                                                @if (Auth::user()->show_cv == 0)<i
                                                        class="far fa-eye-slash mr-2"></i> CV non visible par les recruteurs
                                                @else<i class="fas fa-eye mr-2"></i> CV visible par les recruteurs
                                                @endif
                                            </div>

                                            @if (Auth::user()->cv != null)
                                                <embed src="documents/cv/{{ Auth::user()->cv }}" width="100%"
                                                    height="700" type="application/pdf" />

                                                <hr />
                                            @endif

                                            <div class="text-center">
                                                <form enctype="multipart/form-data" action="/cv" method="POST">

                                                    <div class="text-center">
                                                        <input type="file" name="cvdoc" accept="application/pdf" id="cvdoc"
                                                            class="form-control" />
                                                    </div>

                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                                    <button type="submit"
                                                        class="btn btn-secondary mt-3">Sauvegarder</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="view" class="pt-3 mb-3" style="display: none;">

                                        <div id="tab-3" class="tab-pane" style="pointer-events: all;">
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
                                                <form class="form" method="POST" action="/profile-visibility">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label>Profil public nom</label>
                                                                        @if (Auth::user()->show_lastname == 0)<i
                                                                                class="far fa-eye-slash"
                                                                                data-mdb-toggle="tooltip"
                                                                            title="Non Visible"></i>@else<i
                                                                                class="fas fa-eye ml-2"
                                                                                data-mdb-toggle="tooltip"
                                                                                title="Visible"></i>@endif

                                                                        <select name="show_lastname"
                                                                            class="custom-select sources mt-2">
                                                                            <option selected disabled>
                                                                                @if (Auth::user()->show_lastname == 1)
                                                                                Visible par les recruteurs @else Non
                                                                                    visible par les recruteurs @endif
                                                                            </option>
                                                                            <option disabled>----------</option>
                                                                            <option value="0">Non visible par les recruteurs
                                                                            </option>
                                                                            <option value="1">Visible par les recruteurs
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label>Profil public prénom</label>
                                                                        @if (Auth::user()->show_firstname == 0)<i
                                                                                class="far fa-eye-slash"
                                                                                data-mdb-toggle="tooltip"
                                                                            title="Non Visible"></i>@else<i
                                                                                class="fas fa-eye ml-2"
                                                                                data-mdb-toggle="tooltip"
                                                                                title="Visible"></i>@endif

                                                                        <select name="show_firstname"
                                                                            class="form-control mt-2">
                                                                            <option selected disabled>
                                                                                @if (Auth::user()->show_firstname == 1)
                                                                                Visible par les recruteurs @else Non
                                                                                    visible par les recruteurs @endif
                                                                            </option>
                                                                            <option disabled>----------</option>
                                                                            <option value="0">Non visible par les recruteurs
                                                                            </option>
                                                                            <option value="1">Visible par les recruteurs
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row  mt-2 mb-2">
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label>Profil public téléphone</label>
                                                                        @if (Auth::user()->show_phone == 0)<i
                                                                                class="far fa-eye-slash"
                                                                                data-mdb-toggle="tooltip"
                                                                            title="Non Visible"></i>@else<i
                                                                                class="fas fa-eye ml-2"
                                                                                data-mdb-toggle="tooltip"
                                                                                title="Visible"></i>@endif

                                                                        <select name="show_phone" class="form-control mt-2">
                                                                            <option selected disabled>
                                                                                @if (Auth::user()->show_phone == 1)
                                                                                Visible par les recruteurs @else Non
                                                                                    visible par les recruteurs @endif
                                                                            </option>
                                                                            <option disabled>----------</option>
                                                                            <option value="0">Non visible par les recruteurs
                                                                            </option>
                                                                            <option value="1">Visible par les recruteurs
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label>Profil public email</label>
                                                                        @if (Auth::user()->show_email == 0)<i
                                                                                class="far fa-eye-slash"
                                                                                data-mdb-toggle="tooltip"
                                                                            title="Non Visible"></i>@else<i
                                                                                class="fas fa-eye ml-2"
                                                                                data-mdb-toggle="tooltip"
                                                                                title="Visible"></i>@endif

                                                                        <select name="show_email" class="form-control mt-2">
                                                                            <option selected disabled>
                                                                                @if (Auth::user()->show_email == 1)
                                                                                Visible par les recruteurs @else Non
                                                                                    visible par les recruteurs @endif
                                                                            </option>
                                                                            <option disabled>----------</option>
                                                                            <option value="0">Non visible par les recruteurs
                                                                            </option>
                                                                            <option value="1">Visible par les recruteurs
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row  mt-2 mb-2">

                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label>Profil public nom d'utilisateur</label>
                                                                        @if (Auth::user()->show_username == 0)<i
                                                                                class="far fa-eye-slash"
                                                                                data-mdb-toggle="tooltip"
                                                                            title="Non Visible"></i>@else<i
                                                                                class="fas fa-eye ml-2"
                                                                                data-mdb-toggle="tooltip"
                                                                                title="Visible"></i>@endif

                                                                        <select name="show_username"
                                                                            class="form-control mt-2">
                                                                            <option selected disabled>
                                                                                @if (Auth::user()->show_username == 1)
                                                                                Visible par les recruteurs @else Non
                                                                                    visible par les recruteurs @endif
                                                                            </option>
                                                                            <option disabled>----------</option>
                                                                            <option value="0">Non visible par les recruteurs
                                                                            </option>
                                                                            <option value="1">Visible par les recruteurs
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label>Profil public cv</label>
                                                                        @if (Auth::user()->show_cv == 0)<i
                                                                                class="far fa-eye-slash"
                                                                                data-mdb-toggle="tooltip"
                                                                            title="Non Visible"></i>@else<i
                                                                                class="fas fa-eye ml-2"
                                                                                data-mdb-toggle="tooltip"
                                                                                title="Visible"></i>@endif

                                                                        <select name="show_cv" class="form-control mt-2">
                                                                            <option selected disabled>
                                                                                @if (Auth::user()->show_cv == 1)
                                                                                Visible par les recruteurs @else Non
                                                                                    visible par les recruteurs @endif
                                                                            </option>
                                                                            <option disabled>----------</option>
                                                                            <option value="0">Non visible par les recruteurs
                                                                            </option>
                                                                            <option value="1">Visible par les recruteurs
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col d-flex justify-content-end">
                                                            <button class="btn btn-success"
                                                                type="submit">Sauvegarder</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="jobs" class="pt-3 mb-3" style="display: none;">
                                        <div id="tab-1" class="tab-pane active" style="pointer-events: all;">
                                            @foreach ($saveJobs as $jobs)
                                                @foreach ($saveJobs2 as $jobs2)
                                                    <div class="col-md-12">
                                                        <div class="card flex-md-row mb-4 box-shadow h-md-250">
                                                            <div class="card-body d-flex flex-column align-items-start">
                                                                <strong
                                                                    class="d-inline-block mb-2 text-success">{{ $jobs->category }}</strong>
                                                                <h3 class="mb-0">
                                                                    <a class="text-dark" href="#">{{ $jobs->title }}</a>
                                                                </h3>
                                                                <div class="mb-1 text-muted mt-1"><i
                                                                        class="fas fa-clock text-warning"
                                                                        aria-hidden="true"></i> Mise en ligne le
                                                                    {{ date('d/m/Y à H:i', strtotime($jobs->created_at)) }}
                                                                </div>
                                                                <div class="mb-1 text-muted"> <i
                                                                        class="fas fa-map-pin text-secondary"></i>
                                                                    <strong>{{ $jobs->localisation }}</strong>
                                                                </div>
                                                                <p class="card-text mb-auto">{{ $jobs->smallContent }}
                                                                </p>
                                                                <a href="{{ url('jobs', [$jobs->id, $jobs->author]) }}"
                                                                    class="btn btn-outline-success ripple-surface ripple-surface-dark mt-2">Voir
                                                                    l'emploi</a>

                                                                <div class="mt-2 text-right">
                                                                    @if ($jobs2->status == 2)
                                                                        <h6 class="d-inline-block"><span
                                                                                class="badge bg-success">Accepter par
                                                                                l'employeur</span>
                                                                        </h6>
                                                                    @elseif($jobs2->status == 1)
                                                                        <h6 class="d-inline-block"><span
                                                                                class="badge bg-danger">Refusée par
                                                                                l'employeur</span>
                                                                        </h6>
                                                                    @elseif($jobs2->status == 0)
                                                                        <h6 class="d-inline-block"><span
                                                                                class="badge bg-warning">En attente de
                                                                                validation</span>
                                                                        </h6>
                                                                    @endif
                                                                </div>

                                                            </div>
                                                            <img class="card-img-right flex-auto d-none d-md-block"
                                                                alt="{{ $jobs->title }}"
                                                                style="position: relative;width: 267px;top: 19px;left: -10px;height: 192px;"
                                                                src="images/jobs/{{ $jobs->image }}">
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endforeach

                                            <div class="d-flex justify-content-center">
                                                {!! $saveJobs->links() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-3 mb-3" style="width: 285px;">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="px-xl-3">
                                    @if (Auth::user()->cv != null)
                                        <a href="{{ url('profile-cv-remove') }}" class="btn btn-block btn-danger">
                                            <i class="fa fa-trash"></i>
                                            <span>Supprimer le CV</span>
                                        </a>
                                    @endif

                                    <a href="{{ url('profile-remove') }}" class="btn btn-block btn-danger">
                                        <i class="fa fa-trash"></i>
                                        <span>Supprimer le compte</span>
                                    </a>

                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                                            document.getElementById('logout-form').submit();"
                                        class="btn btn-block btn-secondary">
                                        <i class="fas fa-sign-out-alt"></i>
                                        <span>Déconnexion</span>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title font-weight-bold">Contactez-nous</h6>
                                <p class="card-text">Obtenez une aide rapide et gratuite de nos assistants.</p>
                                <button type="button" class="btn btn-warning">Nous contacter</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="changeAvatar" tabindex="-1" aria-labelledby="changeAvatars" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="changeAvatars">Modifier la photo de profil</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <form enctype="multipart/form-data" action="/profile-picture" method="POST">
                    <div class="modal-body">
                        <div class="text-center">
                            <input type="file" name="file-1" accept="image/*" id="file-1" class="form-control" />
                        </div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">
                            Fermer
                        </button>
                        <button type="submit" class="btn btn-primary">Sauvegarder</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="js/custom-file-input.js"></script>

    <script src="js/input-file.js"></script>

    <script type="text/javascript">
        new InputFile({
            // options
        });

    </script>

    <script type="text/javascript">
        var settingBtn = document.getElementById('settingBtn'),
            cvBtn = document.getElementById('cvBtn'),
            viewBtn = document.getElementById('viewBtn'),
            jobsBtn = document.getElementById('jobsBtn'),
            displaySetting = document.getElementById('setting'),
            displayCv = document.getElementById('cv'),
            displayView = document.getElementById('view'),
            displayJobs = document.getElementById('jobs'),
            tab1 = document.getElementById('tab-1'),
            tab2 = document.getElementById('tab-2'),
            tab2 = document.getElementById('tab-3');

        settingBtn.addEventListener('click', function(e) {

            e.preventDefault();

            settingBtn.classList.add('active');
            cvBtn.classList.remove('active');
            viewBtn.classList.remove('active');
            jobsBtn.classList.remove('active');

            displaySetting.style.display = 'block';
            displayCv.style.display = 'none';
            displayView.style.display = 'none';
            displayJobs.style.display = 'none';

            return false;

        });

        cvBtn.addEventListener('click', function(e) {

            e.preventDefault();

            settingBtn.classList.remove('active');
            cvBtn.classList.add('active');
            viewBtn.classList.remove('active');
            jobsBtn.classList.remove('active');

            displaySetting.style.display = 'none';
            displayCv.style.display = 'block';
            displayView.style.display = 'none';
            displayJobs.style.display = 'none';

            return false;

        });

        viewBtn.addEventListener('click', function(e) {

            e.preventDefault();

            settingBtn.classList.remove('active');
            cvBtn.classList.remove('active');
            viewBtn.classList.add('active');
            jobsBtn.classList.remove('active');

            displaySetting.style.display = 'none';
            displayCv.style.display = 'none';
            displayView.style.display = 'block';
            displayJobs.style.display = 'none';

            return false;

        });

        jobsBtn.addEventListener('click', function(e) {

            e.preventDefault();

            settingBtn.classList.remove('active');
            cvBtn.classList.remove('active');
            viewBtn.classList.remove('active');
            jobsBtn.classList.add('active');

            displaySetting.style.display = 'none';
            displayCv.style.display = 'none';
            displayView.style.display = 'none';
            displayJobs.style.display = 'block';

            return false;

        });

    </script>

    <script>
        $('select').each(function() {
            var $this = $(this),
                numberOfOptions = $(this).children('option').length;

            $this.addClass('select-hidden');
            $this.wrap('<div class="select"></div>');
            $this.after('<div class="select-styled"></div>');

            var $styledSelect = $this.next('div.select-styled');
            $styledSelect.text($this.children('option').eq(0).text());

            var $list = $('<ul />', {
                'class': 'select-options'
            }).insertAfter($styledSelect);

            for (var i = 0; i < numberOfOptions; i++) {
                $('<li />', {
                    text: $this.children('option').eq(i).text(),
                    rel: $this.children('option').eq(i).val()
                }).appendTo($list);
            }

            var $listItems = $list.children('li');

            $styledSelect.click(function(e) {
                e.stopPropagation();
                $('div.select-styled.active').not(this).each(function() {
                    $(this).removeClass('active').next('ul.select-options').hide();
                });
                $(this).toggleClass('active').next('ul.select-options').toggle();
            });

            $listItems.click(function(e) {
                e.stopPropagation();
                $styledSelect.text($(this).text()).removeClass('active');
                $this.val($(this).attr('rel'));
                $list.hide();
                //console.log($this.val());
            });

            $(document).click(function() {
                $styledSelect.removeClass('active');
                $list.hide();
            });

        });

    </script>

@endsection
