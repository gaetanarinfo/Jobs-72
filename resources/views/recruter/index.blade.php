@extends('layouts.app')

@section('title', '- Mon espace recruteur')

@section('content')

    @include('components.head')

    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center mt-3 mb-3">
                <h1>Mon espace recruteur</h1>
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
                                                    <img src="../../images/avatar/{{ Auth::user()->avatar }}" width="140px"
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
                                        <li class="nav-item"><a href="" id="jobsBtn" class="active nav-link">Mes emplois</a>
                                        </li>
                                        <li class="nav-item"><a href="" id="jobsBtn2" class="nav-link">Mes candidatures
                                                refusée</a></li>
                                        <li class="nav-item"><a href="" id="jobsBtn3" class="nav-link">Mes candidatures
                                                accepter</a></li>
                                        <li class="nav-item"><a href="" id="jobsBtn4" class="nav-link">Mes candidatures
                                                en attente</a></li>
                                        <li class="nav-item"><a href="" id="creditsBtn" class="nav-link">Gérer mes
                                                crédits</a></li>
                                        <li class="nav-item"><a href="" id="transacBtn" class="nav-link">Gérer mes
                                                transactions</a></li>
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
                                            <div class="row table-responsive">

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
                                                    <tbody class="text-center" style="vertical-align: middle;">
                                                        @foreach ($jobsAll as $jobs)
                                                            <tr>
                                                                <td>
                                                                    <span class="text-bold">
                                                                        <span><a
                                                                                href="{{ url('emplois', [$jobs->id, $jobs->author]) }}">{{ $jobs->title }}</a></span>
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

                                                                    <a href="{{ url('/recruter/emplois/update', [$jobs->id]) }}"
                                                                        class="btn btn-warning btn-sm px-3 mr-1">
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

                                                <div class="d-flex justify-content-center">
                                                    {!! $jobsAll->links() !!}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col d-flex justify-content-end">
                                                    <span class="badge bg-info mr-2"
                                                        style="display: block;position: relative;height: 27px;padding: 8px 10px;color: white;top: 5px;right: 8px;"><i
                                                            class="fas fa-tags mr-1"></i>Mise à jour de l'offre d'emploi
                                                        Gratuite</span>
                                                    @if ($jobsAllCount < 1 || Auth::user()->credits > 1)
                                                        <span class="badge bg-warning"
                                                            style="display: block;position: relative;height: 27px;padding: 8px 10px;color: white;top: 5px;right: 8px;"><i
                                                                class="fas fa-tags mr-1"></i>(1 annonces Gratuite)</span>
                                                        <a href="{{ url('recruter/emplois/create') }}"
                                                            class="btn btn-success ml-1">Déposer une offre</a>
                                                    @else
                                                        <span class="badge bg-danger"
                                                            style="display: block;position: relative;height: 27px;padding: 8px 10px;color: white;top: 5px;right: 8px;"><i
                                                                class="fas fa-tags mr-1"></i>Vous avez épuisé toutes vos
                                                            offres</span>
                                                        <a href="" class="btn btn-warning ml-1">Merci d'acheter des
                                                            crédits</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="jobs2" class="pt-3" style="display: none;">

                                        <div class="col-md-12">
                                            <div class="text-left badge bg-danger">Candidature refusée
                                                ({{ $jobsRefusedCount }})</div>

                                            <hr />
                                        </div>

                                        <div class="row">

                                            <table class="table table-hover text-nowrap">
                                                <thead class="text-center">
                                                    <tr>
                                                        <th scope="col">Titre</th>
                                                        <th scope="col">Date de la demande</th>
                                                        <th scope="col">Postulant</th>
                                                        <th scope="col">Motivation</th>
                                                        <th scope="col">CV</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-center" style="vertical-align: middle;">
                                                    @foreach ($jobsRefused as $jobs)
                                                        <tr>
                                                            <td>
                                                                <span class="text-bold">
                                                                    <span><a
                                                                            href="{{ url('emplois', [$jobs->id, $jobs->author]) }}">{{ $jobs->title }}</a></span>
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
                                                                    {{ $jobs->author }}
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <div
                                                                    style="width: 330px !important;overflow: auto;white-space: initial;text-align: left;">
                                                                    {{ $jobs->motivation }}
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <a href="{{ url('documents/cv') }} {{ $jobs->cv }}"
                                                                    target="_blank">CV</a>
                                                            </td>
                                                            <td>
                                                                <a href="{{ url('/recruter/apply/delete', [$jobs->id]) }}"
                                                                    class="btn btn-danger btn-sm px-3">
                                                                    <i class="fas fa-trash"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>

                                            <div class="d-flex justify-content-center">
                                                {!! $jobsRefused->links() !!}
                                            </div>
                                        </div>

                                    </div>

                                    <div id="jobs3" class="pt-3" style="display: none;">

                                        <div class="col-md-12">
                                            <div class="text-left badge bg-info">Candidature accepter
                                                ({{ $jobsCheckCount }})</div>

                                            <hr />
                                        </div>

                                        <div class="row">

                                            <table class="table table-hover text-nowrap">
                                                <thead class="text-center">
                                                    <tr>
                                                        <th scope="col">Titre</th>
                                                        <th scope="col">Date de la demande</th>
                                                        <th scope="col">Postulant</th>
                                                        <th scope="col">Motivation</th>
                                                        <th scope="col">CV</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-center" style="vertical-align: middle;">
                                                    @foreach ($jobsCheck as $jobs)
                                                        <tr>
                                                            <td>
                                                                <span class="text-bold">
                                                                    <span><a
                                                                            href="{{ url('emplois', [$jobs->id, $jobs->author]) }}">{{ $jobs->title }}</a></span>
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
                                                                    {{ $jobs->author }}
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <div
                                                                    style="width: 330px !important;overflow: auto;white-space: initial;text-align: left;">
                                                                    {{ $jobs->motivation }}
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <a href="{{ url('documents/cv') }} {{ $jobs->cv }}"
                                                                    target="_blank">CV</a>
                                                            </td>
                                                            <td>
                                                                <a href="{{ url('/recruter/apply/delete', [$jobs->id]) }}"
                                                                    class="btn btn-danger btn-sm px-3">
                                                                    <i class="fas fa-trash"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>

                                            <div class="d-flex justify-content-center">
                                                {!! $jobsCheck->links() !!}
                                            </div>
                                        </div>

                                    </div>

                                    <div id="jobs4" class="pt-3" style="display: none;">

                                        <div class="col-md-12">
                                            <div class="text-left badge bg-warning">Candidature en attente
                                                ({{ $jobsPendingCount }})</div>

                                            <hr />
                                        </div>

                                        <div class="row">

                                            <table class="table table-hover text-nowrap">
                                                <thead class="text-center">
                                                    <tr>
                                                        <th scope="col">Titre</th>
                                                        <th scope="col">Date de la demande</th>
                                                        <th scope="col">Postulant</th>
                                                        <th scope="col">Motivation</th>
                                                        <th scope="col">CV</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-center" style="vertical-align: middle;">
                                                    @foreach ($jobsPending as $jobs)
                                                        <tr>
                                                            <td>
                                                                <span class="text-bold">
                                                                    <span><a
                                                                            href="{{ url('emplois', [$jobs->id, $jobs->author]) }}">{{ $jobs->title }}</a></span>
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
                                                                    {{ $jobs->author }}
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <div
                                                                    style="width: 330px !important;overflow: auto;white-space: initial;text-align: left;">
                                                                    {{ $jobs->motivation }}
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <a href="{{ url('documents/cv') }} {{ $jobs->cv }}"
                                                                    target="_blank">CV</a>
                                                            </td>
                                                            <td>
                                                                <a href="{{ url('/recruter/apply/validate', [$jobs->id]) }}"
                                                                    class="btn btn-success btn-sm px-3">
                                                                    <i class="fas fa-check"></i>
                                                                </a>
                                                                <a href="{{ url('/recruter/apply/refused', [$jobs->id]) }}"
                                                                    class="btn btn-danger btn-sm px-3">
                                                                    <i class="fas fa-times"></i>
                                                                </a>
                                                                <a href="{{ url('/recruter/apply/delete', [$jobs->id]) }}"
                                                                    class="btn btn-danger btn-sm px-3">
                                                                    <i class="fas fa-trash"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>

                                            <div class="d-flex justify-content-center">
                                                {!! $jobsCheck->links() !!}
                                            </div>
                                        </div>

                                    </div>

                                    <div id="credits" class="pt-3" style="display: none;">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title"><i class="fas fa-coins mr-1 text-info"></i>
                                                            Pack 10 offres d'emplois</h5>
                                                        <p class="card-text">
                                                            Acheter ce pack pour créer 10 offres d'emploi, c'est offre sont
                                                            libre d'accès,<br>
                                                            et peuvent être modifié à tout moment.<br>
                                                            <small class="text-danger"><b>Attention ! Si vous supprimez
                                                                    votre annonce, la demande de remboursement,<br>
                                                                    ne pourras ne pas être faite.</b></small>
                                                        </p>
                                                        <hr />
                                                        <div class="form-group row mb-3">
                                                            <div class="col-md-6">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        value="0" id="cgv-confirm" required />
                                                                    <label class="form-check-label" for="cgv-confirm">
                                                                        <a
                                                                            href="{{ url('cgv') }}">{{ __('Conditions Général De Vente') }}</a>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <a id="cgv-confirm-btn" href="" class="btn btn-success"
                                                            style="display: none;">Acheter
                                                            maintenant</a>

                                                        <div class="mt-3" id="paypal1"
                                                            style="display: none;max-width: 310px;margin: 0 auto;">
                                                            <hr />
                                                            <div id="smart-button-container">
                                                                <div style="text-align: center;">
                                                                    <div id="paypal-button-container"></div>
                                                                </div>
                                                            </div>
                                                            ATOU5-sqzkvt2rLQxvmaM_JA4Rln1U2ON6oyABn09HP0wHut6n_SpN2Q-kSeFwsY5StfnuwurG5D2sso
                                                            <script
                                                                src="https://www.paypal.com/sdk/js?client-id=AV4qzI2CIHQXfnIiz2c4KnhJGEl7NSxuF_Vf6XknxAtya93sz1eUXzL-tTVttGRKRHbQvpNOZukRkdSO&currency=EUR"
                                                                data-sdk-integration-source="button-factory"></script>
                                                            <script>
                                                                function initPayPalButton() {
                                                                    paypal.Buttons({
                                                                        style: {
                                                                            shape: 'pill',
                                                                            color: 'blue',
                                                                            layout: 'horizontal',
                                                                            label: 'pay',
                                                                            tagline: true
                                                                        },

                                                                        createOrder: function(data, actions) {
                                                                            return actions.order.create({
                                                                                purchase_units: [{
                                                                                    "description": "Pack 10 offres d'emplois",
                                                                                    "amount": {
                                                                                        "currency_code": "EUR",
                                                                                        "value": 10
                                                                                    }
                                                                                }]
                                                                            });
                                                                        },

                                                                        onApprove: function(data, actions) {
                                                                            return actions.order.capture().then(
                                                                                function(details) {
                                                                                    document.location =
                                                                                        `{{ url('/recruter/credits/create/10', csrf_token()) }}`;
                                                                                });
                                                                        },

                                                                        onError: function(err) {
                                                                            document.location =
                                                                                `{{ url('/recruter/credits/error') }}`;
                                                                        }
                                                                    }).render('#paypal-button-container');
                                                                }
                                                                initPayPalButton();

                                                            </script>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title"><i
                                                                class="fas fa-coins mr-1 text-warning"></i> Pack 26 offres
                                                            d'emplois</h5>
                                                        <p class="card-text">
                                                            Acheter ce pack pour créer 26 offres d'emploi, c'est offre sont
                                                            libre d'accès,<br>
                                                            et peuvent être modifié à tout moment.<br>
                                                            <small class="text-danger"><b>Attention ! Si vous supprimez
                                                                    votre annonce, la demande de remboursement,<br>
                                                                    ne pourras ne pas être faite.</b></small>
                                                        </p>
                                                        <hr />
                                                        <div class="form-group row mb-3">
                                                            <div class="col-md-6">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        value="0" id="cgv-confirm2" required />
                                                                    <label class="form-check-label" for="cgv-confirm2">
                                                                        <a
                                                                            href="{{ url('cgv') }}">{{ __('Conditions Général De Vente') }}</a>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <a id="cgv-confirm-btn2" href="" class="btn btn-success"
                                                            style="display: none;">Acheter maintenant</a>

                                                        <div class="mt-3"
                                                            style="display: none;max-width: 310px;margin: 0 auto;"
                                                            id="paypal2">
                                                            <hr />
                                                            <div id="smart-button-container2">
                                                                <div style="text-align: center;">
                                                                    <div id="paypal-button-container2"></div>
                                                                </div>
                                                            </div>

                                                            <script>
                                                                function initPayPalButton2() {
                                                                    paypal.Buttons({
                                                                        style: {
                                                                            shape: 'pill',
                                                                            color: 'blue',
                                                                            layout: 'horizontal',
                                                                            label: 'pay',
                                                                            tagline: true
                                                                        },

                                                                        createOrder: function(data, actions) {
                                                                            return actions.order.create({
                                                                                purchase_units: [{
                                                                                    "description": "Pack 26 offres d'emplois",
                                                                                    "amount": {
                                                                                        "currency_code": "EUR",
                                                                                        "value": 26
                                                                                    }
                                                                                }]
                                                                            });
                                                                        },

                                                                        onApprove: function(data, actions) {
                                                                            return actions.order.capture().then(
                                                                                function(details) {
                                                                                    document.location =
                                                                                        `{{ url('/recruter/credits/create/26', csrf_token()) }}`;
                                                                                });
                                                                        },

                                                                        onError: function(err) {
                                                                            document.location =
                                                                                `{{ url('/recruter/credits/error') }}`;
                                                                        }
                                                                    }).render('#paypal-button-container2');
                                                                }
                                                                initPayPalButton2();

                                                            </script>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="transac" class="pt-3" style="display: none;">
                                        <div class="row">

                                            <table class="table table-hover text-nowrap">
                                                <thead class="text-center">
                                                    <tr>
                                                        <th scope="col">Titre</th>
                                                        <th scope="col">Date de création</th>
                                                        <th scope="col">Prix</th>
                                                        <th scope="col">Transaction</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-center" style="vertical-align: middle;">
                                                    @foreach ($transactionsAll as $trans)
                                                        <tr>
                                                            <td>
                                                                <span class="text-bold">
                                                                    {{ $trans->title }}
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <span>
                                                                    <i class="far fa-clock me-1 text-secondary"></i><span>Le
                                                                        {{ date('d/m/Y à H:i', strtotime($trans->created_at)) }}</span>
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <span>
                                                                    <i class="fas fa-euro-sign me-1 text-success"></i>
                                                                    {{ $trans->price }}
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <span class="text-bold"><i
                                                                        class="fas fa-sync me-1 text-info"></i>
                                                                    {{ $trans->transaction }}</span>
                                                            </td>
                                                            <td>

                                                                @if ($trans->status == 0)
                                                                    <span>
                                                                        <i
                                                                            class="fas fa-times me-1 text-danger"></i><span>Annulée</span>
                                                                    @else
                                                                        <span>
                                                                            <i
                                                                                class="fas fa-check me-1 text-success"></i><span>Traiter</span>
                                                                @endif

                                                            </td>
                                                            <td>
                                                                <a href="{{ url('/recruter/credits/delete', [$trans->id]) }}"
                                                                    class="btn btn-danger btn-sm px-3 mr-1">
                                                                    <i class="fas fa-trash"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <div class="d-flex justify-content-center">
                                                {!! $jobsAll->links() !!}
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
        var jobsBtn = document.getElementById('jobsBtn'),
            jobsBtn2 = document.getElementById('jobsBtn2'),
            jobsBtn3 = document.getElementById('jobsBtn3'),
            jobsBtn4 = document.getElementById('jobsBtn4'),
            transacBtn = document.getElementById('transacBtn'),
            creditsBtn = document.getElementById('creditsBtn'),
            displayJobs1 = document.getElementById('jobs1'),
            displayJobs2 = document.getElementById('jobs2'),
            displayJobs3 = document.getElementById('jobs3'),
            displayJobs4 = document.getElementById('jobs4'),
            displayTransac = document.getElementById('transac'),
            displayCredits = document.getElementById('credits');

        jobsBtn.addEventListener('click', function(e) {

            e.preventDefault();

            jobsBtn.classList.add('active');
            jobsBtn2.classList.remove('active');
            jobsBtn3.classList.remove('active');
            jobsBtn4.classList.remove('active');
            transacBtn.classList.remove('active');
            creditsBtn.classList.remove('active');

            displayJobs1.style.display = 'block';
            displayJobs2.style.display = 'none';
            displayJobs3.style.display = 'none';
            displayJobs4.style.display = 'none';
            displayTransac.style.display = 'none';
            displayCredits.style.display = 'none';

            return false;

        });

        jobsBtn2.addEventListener('click', function(e) {

            e.preventDefault();

            jobsBtn.classList.remove('active');
            jobsBtn2.classList.add('active');
            jobsBtn3.classList.remove('active');
            jobsBtn4.classList.remove('active');
            transacBtn.classList.remove('active');
            creditsBtn.classList.remove('active');

            displayJobs1.style.display = 'none';
            displayJobs2.style.display = 'block';
            displayJobs3.style.display = 'none';
            displayJobs4.style.display = 'none';
            displayTransac.style.display = 'none';
            displayCredits.style.display = 'none';

            return false;

        });

        jobsBtn3.addEventListener('click', function(e) {

            e.preventDefault();

            jobsBtn.classList.remove('active');
            jobsBtn2.classList.remove('active');
            jobsBtn3.classList.add('active');
            jobsBtn4.classList.remove('active');
            transacBtn.classList.remove('active');
            creditsBtn.classList.remove('active');

            displayJobs1.style.display = 'none';
            displayJobs2.style.display = 'none';
            displayJobs3.style.display = 'block';
            displayJobs4.style.display = 'none';
            displayTransac.style.display = 'none';
            displayCredits.style.display = 'none';

            return false;

        });

        jobsBtn4.addEventListener('click', function(e) {

            e.preventDefault();

            jobsBtn.classList.remove('active');
            jobsBtn2.classList.remove('active');
            jobsBtn3.classList.remove('active');
            jobsBtn4.classList.add('active');
            transacBtn.classList.remove('active');
            creditsBtn.classList.remove('active');

            displayJobs1.style.display = 'none';
            displayJobs2.style.display = 'none';
            displayJobs3.style.display = 'none';
            displayJobs4.style.display = 'block';
            displayTransac.style.display = 'none';
            displayCredits.style.display = 'none';

            return false;

        });

        transacBtn.addEventListener('click', function(e) {

            e.preventDefault();

            jobsBtn.classList.remove('active');
            jobsBtn2.classList.remove('active');
            jobsBtn3.classList.remove('active');
            jobsBtn4.classList.remove('active');
            transacBtn.classList.add('active');
            creditsBtn.classList.remove('active');

            displayJobs1.style.display = 'none';
            displayJobs2.style.display = 'none';
            displayJobs3.style.display = 'none';
            displayJobs4.style.display = 'none';
            displayTransac.style.display = 'block';
            displayCredits.style.display = 'none';

            return false;

        });

        creditsBtn.addEventListener('click', function(e) {

            e.preventDefault();

            jobsBtn.classList.remove('active');
            jobsBtn2.classList.remove('active');
            jobsBtn3.classList.remove('active');
            jobsBtn4.classList.remove('active');
            transacBtn.classList.remove('active');
            creditsBtn.classList.add('active');

            displayJobs1.style.display = 'none';
            displayJobs2.style.display = 'none';
            displayJobs3.style.display = 'none';
            displayJobs4.style.display = 'none';
            displayTransac.style.display = 'none';
            displayCredits.style.display = 'block';

            return false;

        });

        var cgv_confirm = document.getElementById('cgv-confirm'),
            cgv_confirm_btn = document.getElementById('cgv-confirm-btn'),
            cgv_confirm2 = document.getElementById('cgv-confirm2'),
            cgv_confirm_btn2 = document.getElementById('cgv-confirm-btn2'),
            paypal1 = document.getElementById('paypal1'),
            paypal2 = document.getElementById('paypal2');

        cgv_confirm.onchange = function() {
            this.checked = true;
            cgv_confirm_btn.style.display = '';

            cgv_confirm_btn.addEventListener('click', function(e) {
                e.preventDefault();
                paypal1.style.display = 'block';
            })
        };

        cgv_confirm2.onchange = function() {
            this.checked = true;
            cgv_confirm_btn2.style.display = '';

            cgv_confirm_btn2.addEventListener('click', function(e) {
                e.preventDefault();
                paypal2.style.display = 'block';
            })
        };

    </script>

@endsection
