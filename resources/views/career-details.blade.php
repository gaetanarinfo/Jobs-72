@extends('layouts.app')

@section('title', $career->title)

@section('content')

    <link rel="stylesheet" href="{{ asset('css/styles-jobs.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/template-jobs.css') }}" />

    @include('components.head')

    <div class="container mt-3">
        <section class="post-details-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="single-video-area bg-white mb-30 box-shadow">
                            <div style="background: url('../../../images/career/news/{{ $career->image }}');width: 100%;height: 416px;background-position: top;background-attachment: scroll;background-size: cover;background-repeat: no-repeat;"
                                title="{{ $career->title }}"></div>
                        </div>
                    </div>
                </div>

                <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4" style="padding: 9px 5px 0px 5px;">
                    <div class="container-fluid">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('career-category', [strtolower(str_replace('?', '', str_replace(' ', '-', $career->category)))]) }}">{{ $career->category }}</a></li>
                                <li class="breadcrumb-item active"><a>{{ $career->title }}</a></li>
                            </ol>
                        </nav>
                    </div>
                </nav>

                <div class="row justify-content-center">

                    <div class="col-12 col-xl-8">
                        <div class="post-details-content bg-white mb-30 p-30 box-shadow">
                            <div class="blog-content">
                                <div class="post-meta">
                                    <a>{{ $career->created_at->translatedFormat('l jS F Y à H:i') }}</a>
                                    <a href="{{ route('career-category', [strtolower(str_replace('?', '', str_replace(' ', '-', $career->category)))]) }}">{{ $career->category }}</a>
                                </div>
                                <h4 class="post-title">{{ $career->title }}</h4>

                                {!! html_entity_decode($career->content) !!}

                                <hr />

                                <div class="like-dislike-share my-4">
                                    <a target="_new"
                                        href="https://www.facebook.com/sharer/sharer.php?u=https://jobs-72.com/conseil-carriere/article/{{ $career->id }}/{!! strtolower(str_replace(' ', '-', $career->title)) !!}"
                                        class="facebook btn-share"><i class="fab fa-facebook-f"></i> Partager sur
                                        Facebook</a>
                                    <a target="_new"
                                        href="https://twitter.com/intent/tweet?url=https://jobs-72.com/conseil-carriere/article/{{ $career->id }}&text={{ $career->smallContent }}"
                                        class="twitter btn-share"><i class="fab fa-twitter"></i> Partager sur
                                        Twitter</a>
                                </div>

                                <div class="post-author d-flex align-items-center">
                                    <div class="post-author-thumb">
                                        <img src="../../../@foreach (user($career->author) as
                                        $user){{ $user->avatar }} @endforeach" width="100px"
                                        height="100px" alt="@foreach (user($career->author) as $user){{ $user->username }}@endforeach">
                                    </div>
                                    <div class="post-author-desc">
                                        <a class="author-name">
                                            @foreach (user($career->author) as $user)
                                                {{ $user->lastname }} {{ $user->firstname }} @endforeach
                                        </a>
                                        <p>
                                            @foreach (user($career->author) as $user)
                                                {{ $user->biography }}@endforeach
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-5 col-xl-4">

                        <div class="sidebar-area bg-white mb-30 box-shadow">

                            <div class="single-sidebar-widget p-30">

                                <div class="social-followers-info">

                                    <a target="_new"
                                        href="https://www.facebook.com/sharer/sharer.php?u=https://jobs-72.com/conseil-carriere/article/{{ $career->id }}"
                                        class="facebook-fans btn-share"><i class="fab fa-facebook-f"></i> Partager sur
                                        Facebook
                                        <a target="_new"
                                            href="https://twitter.com/intent/tweet?url=https://jobs-72.com/conseil-carriere/article/{{ $career->id }}/{!! strtolower(str_replace(' ', '-', $career->title)) !!}&text={{ $career->smallContent }}"
                                            class="twitter-followers btn-share"><i class="fab fa-twitter"></i> Partager
                                            sur
                                            Twitter</a>

                                </div>
                            </div>

                            <div class="single-sidebar-widget p-30" style="padding-top: 0px !important;">

                                <div class="section-heading">
                                    <h5>Nos catégories</h5>
                                </div>

                                <ul class="catagory-widgets">
                                    <li><a href="{{ url('emplois', ['Ressources-Humaines']) }}"><span><i
                                                    class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                Emploi Ressources Humaines</span>
                                            <span>{{ category('Ressources-Humaines') }}</span></a></li>

                                    <li><a href="{{ url('emplois', ['Commercial']) }}"><span><i
                                                    class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                Emploi Commercial</span> <span>{{ category('Commercial') }}</span></a>
                                    </li>

                                    <li><a href="{{ url('emplois', ['Distribution-et-Grande-Distribution']) }}"><span><i
                                                    class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                Emploi Distribution et Grande Distribution</span>
                                            <span>{{ category('Distribution et Grande Distribution') }}</span></a></li>

                                    <li><a href="{{ url('emplois', ['Informatique-et-Technologie-de-l’information']) }}"><span><i
                                                    class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                Emploi Informatique et Technologie de l’information</span>
                                            <span>{{ category('Informatique et Technologie de l’information') }}</span></a>
                                    </li>

                                    <li><a href="{{ url('emplois', ['Logistique']) }}"><span><i
                                                    class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                Emploi Logistique</span> <span>{{ category('Logistique') }}</span></a>
                                    </li>

                                    <li><a href="{{ url('emplois', ['Temps-partiel']) }}"><span><i
                                                    class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                Emploi Temps partiel</span>
                                            <span>{{ category('Temps partiel') }}</span></a></li>

                                    <li><a href="{{ url('emplois', ['Maintenance-et-Réparation']) }}"><span><i
                                                    class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                Emploi Maintenance et Réparation</span>
                                            <span>{{ category('Maintenance et Réparation') }}</span></a></li>

                                    <li><a href="{{ url('emplois', ['Tourisme']) }}"><span><i
                                                    class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                Emploi Tourisme</span> <span>{{ category('Tourisme') }}</span></a></li>

                                    <li><a href="{{ url('emplois', ['Finance']) }}"><span><i
                                                    class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                Emploi Finance</span> <span>{{ category('Finance') }}</span></a></li>

                                    <li><a href="{{ url('emplois', ['Alternance']) }}"><span><i
                                                    class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                Emploi Alternance</span> <span>{{ category('Alternance') }}</span></a>
                                    </li>

                                    <li><a href="{{ url('emplois', ['Fashion']) }}"><span><i
                                                    class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                Emploi Fashion</span> <span>{{ category('Fashion') }}</span></a></li>

                                    <li><a href={{ url('emplois', ['Marketing-et-Communication']) }}"><span><i
                                                    class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                Emploi Marketing et Communication</span>
                                            <span>{{ category('Marketing et Communication') }}</span></a></li>

                                    <li><a href="{{ url('emplois', ['Restauration']) }}"><span><i
                                                    class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                Emploi Restauration</span>
                                            <span>{{ category('Restauration') }}</span></a></li>

                                    <li><a href="{{ url('emplois', ['Transport']) }}"><span><i
                                                    class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                Emploi Transport</span> <span>{{ category('Transport') }}</span></a></li>

                                    <li><a href="{{ url('emplois', ['Environnement-et-Développement-durable']) }}"><span><i
                                                    class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                Emploi Environnement et Développement durable</span>
                                            <span>{{ category('Environnement et Développement durable') }}</span></a>
                                    </li>

                                    <li><a href="{{ url('emplois', ['Sécurité']) }}"><span><i
                                                    class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                Emploi Sécurité</span> <span>{{ category('Sécurité') }}</span></a></li>

                                    <li><a href="{{ url('emplois', ['Banque']) }}"><span><i
                                                    class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                Emploi Banque</span> <span>{{ category('Banque') }}</span></a></li>

                                    <li><a href="{{ url('emplois', ['Psychologue']) }}"><span><i
                                                    class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                Emploi Psychologue</span> <span>{{ category('Psychologue') }}</span></a>
                                    </li>

                                    <li><a href="{{ url('emplois', ['Hôtellerie']) }}"><span><i
                                                    class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                Emploi Hôtellerie</span> <span>{{ category('Hôtellerie') }}</span></a>
                                    </li>

                                    <li><a href="{{ url('emplois', ['Cadres-et-Direction']) }}"><span><i
                                                    class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                Emploi Cadres et Direction</span>
                                            <span>{{ category('Cadres et Direction') }}</span></a></li>

                                    <li><a href="{{ url('emplois', ['Santé']) }}"><span><i
                                                    class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                Emploi Santé</span>
                                            <span>{{ category('Santé') }}</span></a></li>
                                </ul>
                            </div>

                            <div class="single-sidebar-widget">
                                <a href="{{ $publicite->url }}" target="_new" class="add-img"><img
                                        src="../../../images/jobs/publicite/{{ $publicite->image }}"
                                        alt="{{ $career->title }}"></a>
                            </div>


                            <div class="single-sidebar-widget p-30">

                                <div class="section-heading">
                                    <h5>Newsletter</h5>
                                </div>
                                <div class="newsletter-form">
                                    <p>Abonnez-vous à notre newsletter pour recevoir des notifications sur les nouvelles
                                        mises à jour, informations etc.</p>

                                    <a href="{{ url('newsletter') }}" class="btn mag-btn w-100">S'abonner</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
