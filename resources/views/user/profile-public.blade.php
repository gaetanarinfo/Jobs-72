@extends('layouts.app')

@section('title', '- Profile de ' . $user->username)

@section('content')

    @include('components.head')

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
        <div class="row">
            <div class="col-md-12 text-center mt-3 mb-3">
                <h1>Profil de {{ $user->username }}</h1>
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
                                                    <img src="{{ asset($user->avatar) }}" width="140px"
                                                        alt="{{ $user->username }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                            <div class="text-center text-sm-left mb-2 mb-sm-0">
                                                <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">
                                                    @if ($user->show_lastname == 1)
                                                        {{ $user->lastname }} -@endif
                                                    @if ($user->show_firstname == 1)
                                                        {{ $user->firstname }}@endif
                                                </h4>
                                                <p class="mb-0">
                                                    @if ($user->show_email == 1)
                                                        <i class="fas fa-envelope-square"></i> <b><a
                                                                href="mailto:{{ $user->email }}">{{ $user->email }}</a></b>
                                                    @endif
                                                </p>
                                                <p class="mb-0">
                                                    @if ($user->show_web == 1)
                                                        <i class="fas fa-link"></i> <b><a
                                                                href="{{ $user->web }}" title="Site internet de {{ $user->username }}">{{ $user->web }}</a></b>
                                                    @endif
                                                </p>
                                                <div class="text-muted"><small>
                                                        @if ($user->show_username == 1)
                                                            {{ $user->username }} -@endif
                                                        @if ($user->show_phone == 1)
                                                            <i class="fas fa-phone"></i> <b>{{ $user->phone }}</b>
                                                        @endif
                                                    </small></div>
                                                <div class="mt-2">
                                                    @if ($user->show_facebook == 1)<a
                                                            href="{{ $user->facebook }}" class="btn btn-info mr-2"><i
                                                                class="fab fa-facebook-f"></i></a>@endif
                                                    @if ($user->show_twitter == 1)<a
                                                            href="{{ $user->twitter }}" class="btn btn-danger mr-2"><i
                                                                class="fab fa-twitter"></i></a>@endif
                                                    @if ($user->show_linkedin == 1)<a
                                                            href="{{ $user->linkedin }}" class="btn btn-warning mr-2"><i
                                                                class="fab fa-linkedin-in"></i></a>@endif
                                                    @if ($user->show_github == 1)<a
                                                            href="{{ $user->github }}" class="btn btn-secondary mr-2"><i
                                                                class="fab fa-github"></i></a>@endif
                                                </div>
                                            </div>
                                            <div class="text-right text-sm-right">
                                                <span class="badge @if ($user->roles ==
                                                'ROLES_USER') bg-success @elseif($user->roles ==
                                                'ROLES_ADMIN') bg-danger @elseif($user->roles ==
                                                    'ROLES_RECRUTER') bg-info @endif">@if ($user->roles == 'ROLES_USER')
                                                    Utilisateur @elseif($user->roles == 'ROLES_ADMIN')
                                                    Administrateur @elseif($user->roles == 'ROLES_RECRUTER')
                                                        Recruteur @endif</span>
                                                <div class="text-muted"><small>Inscrit le
                                                        {{ date('d/m/Y à H:i', strtotime($user->created_at)) }}</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="nav nav-tabs" style="justify-content: center;">
                                        <li class="nav-item active"><a href="" id="cvBtn" class="nav-link active">Le CV</a>
                                        </li>
                                    </ul>

                                    <div id="cv" class="pt-3 mb-3">

                                        <div id="tab-2" class="tab-pane" style="pointer-events: all;">

                                            @if ($user->cv != null || $user->show_cv == 1)
                                                <embed src="{{ asset('documents/cv/' . $user->cv) }}" width="100%"
                                                    height="700" type="application/pdf" />

                                                <hr />
                                            @endif

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

@endsection
