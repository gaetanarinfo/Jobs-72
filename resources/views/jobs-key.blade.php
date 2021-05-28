@extends('layouts.app')

@section('title', '- Nos offres d\'emplois')

@section('content')

    @include('components.head')

    <div class="container mt-5">

        <h3 class="mb-3 text-center"><strong>Nos offres d'emploi - {{ $key }}</strong></h3>

        <hr />

        @if ($jobsKeyCount > 0)
            <div class="container">
                <div class="row">
                    <div class="col-md-5 m-auto text-center">
                        <img src="{{ asset('images/city-buildings.png') }}" alt="city" class="build" />
                        <p class="text-center build" style="font-size: 30px;color: #3d2462;line-height: 1.5;">Nous avons
                            trouvé
                            {{ $jobsKeyCount }} ooffre(s) qui pourraient vous convenir !</p>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-5 m-auto text-center">
                        <img src="{{ asset('images/fleche-bas.png') }}" alt="fleche-bas" style="max-width: 126px;"
                            class="clignote" />
                    </div>
                </div>
            </div>
        @else
            <div class="container">
                <div class="row">
                    <div class="col-md-5 m-auto text-center">
                        <img src="{{ asset('images/city-buildings.png') }}" alt="city" class="build" />
                        <p class="text-center build" style="font-size: 30px;color: #3d2462;line-height: 1.5;">Désolé a ce
                            jour il n'éxiste pas d'offre</p>
                    </div>
                </div>
            </div>
        @endif

        <hr />

        <div class="row mb-2">
            @foreach ($jobsKey as $jobs)
                <div class="col-md-6">
                    <div class="card flex-md-row mb-4 box-shadow h-md-250">
                        <div class="card-body d-flex flex-column align-items-start">
                            <strong class="d-inline-block mb-2 text-success">{{ $jobs->category }}</strong>
                            <h3 class="mb-1">
                                <a class="text-dark"
                                    href="{{ url('emplois', [$jobs->id, $jobs->author]) }}">{{ $jobs->title }}</a>
                            </h3>
                            <div class="mb-1 text-muted mt-1"><i class="fas fa-clock text-warning" aria-hidden="true"></i>
                                @if (now()->addDays(1)->addHours(2)->format('Y-m-d H:i:s') > $jobs->created_at)
                                    Publié aujourd'hui
                                @else
                                    Mise en ligne le {{ date('d/m/Y à H:i', strtotime($jobs->created_at)) }}
                                @endif
                            </div>
                            <div class="mb-1 text-muted"> <i class="fas fa-map-pin text-secondary"></i>
                                <strong>{{ $jobs->localisation }}</strong>
                            </div>
                            <div class="mb-1">
                                <span class="badge bg-info">
                                    {{ $jobs->poste }}</span>
                                <span class="badge bg-success">
                                    {{ $jobs->type }}</span>
                                @if (now()->addDays(7)->addHours(2)->format('Y-m-d H:i:s') > $jobs->created_at)
                                    <span class="badge bg-danger"><i class="fab fa-hotjar text-white mr-1"></i>
                                        NOUVEAU</span>
                                @endif
                            </div>
                            <p class="card-text mb-auto">{{ $jobs->smallContent }}</p>
                            <a href="{{ url('emplois', [$jobs->id, $jobs->author]) }}"
                                class="btn btn-outline-success ripple-surface ripple-surface-dark mt-2">Postuler</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center">
            {!! $jobsKey->links() !!}
        </div>
    </div>


@endsection
