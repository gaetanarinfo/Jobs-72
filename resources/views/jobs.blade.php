@extends('layouts.app')

@section('title', '- Nos offres d\'emplois')

@section('content')

    @include('components.head')

    <div class="container mt-5">

        <h3 class="mb-3 text-center"><strong>Nos offres d'emploi</strong></h3>

        <hr />

        @if ($jobsCount > 0)
            <div class="container">
                <div class="row">
                    <div class="col-md-6 m-auto text-center">
                        <img src="{{ asset('images/city-buildings.png') }}" alt="city" class="build" />
                        <p class="text-center build" style="font-size: 30px;color: #3d2462;line-height: 1.5;">
                            {{ $jobsCount }} offre(s) qui pourraient vous convenir !</p>
                    </div>
                </div>
            </div>

            <div class="container mb-2">
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

        <div class="container">
            <div class="row">
                <div class="col-md-12 text-right">
                    <form action="{{ route('order_tel') }}" method="POST" id="form_tel">
                        <div class="form-check d-inline-block mr-1" style="position: relative;top: -3px;left: -13px;">
                            <input class="form-check-input" type="checkbox" value="1" required id="btn_check" />
                            <label class="form-check-label" for="flexCheckDefault">
                                Télétravail uniquement ?
                            </label>
                        </div>
                        <button id="btn_check_valid" type="submit"
                            class="d-inline-block btn btn-success ripple-surface ripple-surface-dark"><i class="fas fa-check"></i></button>
                        <a id="btn_check_reset"
                            class="btn btn-danger ripple-surface ripple-surface-dark" style="display: none;"><i class="fas fa-times"></i></a>
                    </form>
                </div>
            </div>
        </div>

        <hr />

        <div id="load_tel" class="text-center"></div>

        <div class="row mb-2" id="tel_res"></div>

        <div class="row mb-2" id="tel_res2">
            @foreach ($jobsAll as $jobs)
                <div class="col-md-6">
                    <div class="card flex-md-row mb-4 box-shadow h-md-250" style="min-height: 390px;">
                        <div class="card-body d-flex flex-column align-items-start">
                            <strong class="d-inline-block mb-2 text-success">{{ $jobs->category }}</strong>
                            <h3 class="mb-0">
                                <a class="text-dark"
                                    href="{{ url('emplois', [$jobs->id, $jobs->author]) }}">{{ $jobs->title }}</a>
                            </h3>
                            <div class="mb-1 text-muted mt-1"><i class="fas fa-clock text-warning" aria-hidden="true"></i>
                                Mise en ligne le {{ date('d/m/Y à H:i', strtotime($jobs->created_at)) }}</div>
                            <div class="mb-1 text-muted"> <i class="fas fa-map-pin text-secondary"></i>
                                <strong>{{ $jobs->localisation }}</strong>
                            </div>
                            <p class="card-text mb-auto">{{ $jobs->smallContent }}</p>
                            <a href="{{ url('emplois', [$jobs->id, $jobs->author]) }}"
                                class="btn btn-outline-success ripple-surface ripple-surface-dark mt-2">Postuler</a>
                        </div>
                        <img class="card-img-right flex-auto d-none d-md-block" alt="{{ $jobs->title }}"
                            style="position: relative;width: 267px;top: 19px;left: -10px;height: 192px;"
                            src="images/jobs/{{ $jobs->image }}">
                    </div>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center">
            {!! $jobsAll->links() !!}
        </div>
    </div>


@endsection
