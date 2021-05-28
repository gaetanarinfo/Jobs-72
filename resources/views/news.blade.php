@extends('layouts.app')

@section('title', '- Toute nos actualités')

@section('content')

    @include('components.head')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg navbar-light bg-light mt-3" style="padding: 9px 5px 0px 5px;">
                    <div class="container-fluid">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
                                <li class="breadcrumb-item active"><a>Actualités</a></li>
                            </ol>
                        </nav>
                    </div>
                </nav>
            </div>
        </div>
    </div>

    <div class="container mt-5">

        <h3 class="mb-3 text-center"><strong>Toutes nos actualités</strong></h3>

        <hr />

        <div class="container">
            <div class="row">
                <div class="col-md-6 m-auto text-center">
                    <img src="{{ asset('images/actus.png') }}" alt="news" class="clignote">
                </div>
            </div>
        </div>

        <hr />
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-left">
                    <form action="{{ route('search_cat') }}" method="POST" id="search_form_news_cat">
                        <div id="search_count_news_cat"></div>
                        <div class="d-inline-block mr-1">
                            <select class="form-control js-select" id="search_cat_input">
                                <option value="">Sélectionner un catégorie</option>
                                <option value="Emploi">Emploi</option>
                                <option value="Annonce officiel">Annonce officiel</option>
                                <option value="Actualité">Actualité</option>
                            </select>
                        </div>
                        <button type="submit" class="d-inline-block btn btn-warning ripple-surface ripple-surface-dark"><i
                                class="fas fa-check"></i></button>
                    </form>
                </div>

                <div class="col-md-6 text-right">
                    <form action="{{ route('search_news') }}" method="POST" id="search_form_news">
                        <div id="search_count_news"></div>
                        <div class="d-inline-block mr-1">
                            <input class="form-control" type="text" name="search_input" id="search_input"
                                placeholder="Rechercher un article" />
                        </div>
                        <button type="submit" class="d-inline-block btn btn-info ripple-surface ripple-surface-dark"><i
                                class="fas fa-search"></i></button>
                    </form>
                </div>
            </div>
        </div>

        <hr />

        <div id="load_news" class="text-center"></div>

        <div class="row" id="search_res_news">
            @foreach ($newsAll as $news)
                <div class="col-lg-4 col-md-12 mb-4">
                    <div class="card">
                        <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                            <img src="images/news/{{ $news->image }}" class="img-fluid" />
                            <a href="{{ route('news', $news->id) }}">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                            </a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $news->title }}</h5>
                            <div class="mb-1 text-muted"><i class="fas fa-clock text-warning" aria-hidden="true"></i>
                                Mise
                                en ligne le
                                {{ date('d/m/Y à H:i', strtotime($news->created_at)) }}</div>
                            <p class="card-text">
                                {{ $news->smallContent }}
                            </p>
                            <a href="{{ route('news', $news->id) }}"
                                class="btn btn-outline-success ripple-surface ripple-surface-dark">Lire la
                                suite</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center">
            {!! $newsAll->links() !!}
        </div>

    </div>

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

    <script src="{{ asset('js/search_news.js') }}"></script>

@endsection
