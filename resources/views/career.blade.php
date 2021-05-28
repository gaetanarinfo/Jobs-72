@extends('layouts.app')

@section('title', '- Nos offres d\'emplois')

@section('content')

    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}" />

    @include('components.head')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg navbar-light bg-light mt-3" style="padding: 9px 5px 0px 5px;">
                    <div class="container-fluid">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
                                <li class="breadcrumb-item active"><a>{{ $category }}</a></li>
                            </ol>
                        </nav>
                    </div>
                </nav>
            </div>
        </div>
    </div>

    <div class="container mt-3">

        <h3 class="mb-3 text-center"><strong>Nos Conseils Carrière</strong></h3>

        <hr />

        <div id="load_news" class="text-center"></div>

        <div class="container mt-5 fadeOn" style="display: block !important;">
            <div class="owl-carousel owl-2" style="display: block !important;">
                @foreach ($careers as $career)
                    <div style="width: 418.667px; margin-right: 20px;float: none;" class="owl-item">
                        <div class="media-29101">
                            <img src="{{ asset('images/career/' . careerImg($career->category)) }}"
                                alt="{{ $career->title }}" class="img-fluid">
                            <span class="badge {{ careerCat($career->category) }} mb-2">{{ $career->category }}</span>
                            <h3 class="mb-1 mt-1">{{ $career->title }}</h3>
                            <p class="mt-0">{{ $career->smallContent }}</p>
                            <a href="{{ route('career', [$career->id, strtolower(str_replace('?', '', str_replace(' ', '-', $career->title)))]) }}"
                                class="btn btn-info">En savoir plus</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="d-flex justify-content-center">
            {!! $careers->links() !!}
        </div>

    @endsection
