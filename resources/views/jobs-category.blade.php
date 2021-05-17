@extends('layouts.app')

@section('title', '- Nos offres d\'emplois')

@section('content')

    @include('components.head')

    <div class="container mt-5">

        <h3 class="mb-3 text-center"><strong>Nos offres d'emploi - {{ $category }}</strong></h3>
    
       <hr/>
    
        <div class="row mb-2">
            @foreach($jobsCat as $jobs)
            <div class="col-md-6">
                <div class="card flex-md-row mb-4 box-shadow h-md-250" style="min-height: 390px;">
                    <div class="card-body d-flex flex-column align-items-start">
                        <strong class="d-inline-block mb-2 text-success">{{ $jobs->category }}</strong>
                        <h3 class="mb-0">
                            <a class="text-dark" href="{{ url('emplois', [$jobs->id, $jobs->author]) }}">{{ $jobs->title }}</a>
                        </h3>
                        <div class="mb-1 text-muted mt-1"><i class="fas fa-clock text-warning" aria-hidden="true"></i> Mise en ligne le {{ date('d/m/Y à H:i', strtotime($jobs->created_at)) }}</div>
                        <div class="mb-1 text-muted"> <i class="fas fa-map-pin text-secondary"></i> <strong>{{ $jobs->localisation }}</strong></div>
                        <p class="card-text mb-auto">{{ $jobs->smallContent }}</p>
                        <a href="{{ url('emplois', [$jobs->id, $jobs->author]) }}" class="btn btn-outline-success ripple-surface ripple-surface-dark mt-2">Postuler</a>
                    </div>
                    <img class="card-img-right flex-auto d-none d-md-block" alt="{{ $jobs->title }}"
                        style="position: relative;width: 267px;top: 19px;left: -10px;height: 192px;"
                        src="../images/jobs/{{ $jobs->image }}">
                </div>
            </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center">
            {!! $jobsCat->links() !!}
        </div>
    </div>
    

@endsection