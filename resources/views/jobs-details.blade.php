@extends('layouts.app')

@section('title', $jobs->title)

@section('content')

    <link rel="stylesheet" href="../../css/styles-jobs.css" />
    <link rel="stylesheet" href="../../css/template-jobs.css" />

    @include('components.head')

    <div class="container mt-3">
        <section class="post-details-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="single-video-area bg-white mb-30 box-shadow">
                            <div style="background: url('../../images/jobs/{{ $jobs->image }}');width: 100%;height: 416px;background-position: center;background-attachment: scroll;background-size: cover;background-repeat: no-repeat;"
                                title="{{ $jobs->title }}"></div>

                            <div class="video-meta-data d-flex align-items-center justify-content-between">
                                <h6 class="total-views"><i class="fas fa-eye text-secondary"></i> {{ $jobs->vue }} Vue(s)
                                </h6>
                                <div class="like-dislike d-flex align-items-center">
                                    @if (Auth::user())
                                        @if ($likeVue->ip != $ipUser)
                                            <a href="{{ url('emplois/like', [$jobs->id, $jobs->author]) }}"
                                                class="mr-2"><i class="fas fa-thumbs-up text-danger"></i>
                                                {{ $jobs->likes }}
                                                J'aime(s)</a>
                                        @else
                                            <a class="mr-2 active"><i class="fas fa-thumbs-up text-danger"></i>
                                                {{ $jobs->likes }}
                                                J'aime(s)</a>
                                        @endif
                                    @else
                                        <a href="{{ route('login') }}" class="mr-2"><i
                                                class="fas fa-thumbs-up text-danger"></i>
                                            {{ $jobs->likes }}
                                            J'aime(s)</a>
                                    @endif
                                    <p><i class="fas fa-coffee text-info"></i> {{ $jobs->apply }}
                                        Postulant(s)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">

                    <div class="col-12 col-xl-8">
                        <div class="post-details-content bg-white mb-30 p-30 box-shadow">
                            <div class="blog-content">
                                <div class="post-meta">
                                    <a>Mise en ligne le
                                        {{ date('d/m/Y à H:i', strtotime($jobs->created_at)) }}</a>
                                    <a href="{{ url('jobs', $jobs->category) }}">Emplois {{ $jobs->category }}</a>
                                </div>
                                <h4 class="post-title">{{ $jobs->title }}</h4>

                                <div class="post-meta-2">
                                    <a><i class="fas fa-eye text-secondary" aria-hidden="true"></i> {{ $jobs->vue }}</a>
                                    <a><i class="fas fa-thumbs-up text-danger" aria-hidden="true"></i>
                                        {{ $jobs->likes }}</a>
                                    <a><i class="fas fa-coffee text-info"></i> {{ $jobs->apply }}</a>
                                </div>

                                {!! html_entity_decode($jobs->content) !!}

                                <hr />

                                <div class="row">
                                    <div class="col-12 col-lg-8">
                                        <h4 class="mb-3">Détail du poste</h4>
                                        <ul>
                                            <li><i class="fa fa-check-circle text-warning" aria-hidden="true"></i> Status :
                                                {{ $jobs->status }}</li>
                                            <li><i class="fa fa-check-circle text-warning" aria-hidden="true"></i> Type
                                                d'emploi :
                                                {{ $jobs->type }}</li>
                                            <li><i class="fa fa-check-circle text-warning" aria-hidden="true"></i> Salaire :
                                                {{ $jobs->salaire }}</li>
                                            <li><i class="fa fa-check-circle text-warning" aria-hidden="true"></i> Avantages
                                                : </li>
                                            @foreach (json_decode($jobs->avantages, true) as $key => $value)
                                                <li class="ml-3"><i class="fa fa-check text-success" aria-hidden="true"></i>
                                                    {{ $value }}</li>
                                            @endforeach
                                            </li>
                                            <li><i class="fa fa-check-circle text-warning" aria-hidden="true"></i> Horaires
                                                :</li>

                                            @foreach (json_decode($jobs->horaires, true) as $key => $value)
                                                <li class="ml-3"><i class="fa fa-check text-success" aria-hidden="true"></i>
                                                    {{ $value }}</li>
                                            @endforeach

                                            <li><i class="fa fa-check-circle text-warning" aria-hidden="true"></i>
                                                Télétravail :
                                                {{ $jobs->teletravail }}</li>
                                        </ul>

                                        <hr />

                                        <h4 class="mb-3">Profil Souhaité</h4>
                                        <ul>
                                            <li><i class="fa fa-check-circle text-warning" aria-hidden="true"></i>
                                                <b>Expérience</b>
                                            </li>
                                            <li class="ml-3"><i class="fa fa-check text-success" aria-hidden="true"></i>
                                                {{ $jobs->experience }} @if ($jobs->experience_exiger == 1)<i
                                                        class="fas fa-exclamation-triangle text-danger"
                                                        data-mdb-toggle="tooltip"
                                                        title="Cette expérience est indispensable"></i>@endif
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <hr />

                                <div class="like-dislike-share my-4">
                                    <a target="_new"
                                        href="https://www.facebook.com/sharer/sharer.php?u=https://jobs-72.com/emplois/{{ $jobs->id }}/{{ $jobs->author }}"
                                        class="facebook btn-share"><i class="fab fa-facebook-f"></i> Partager sur
                                        Facebook</a>
                                    <a target="_new"
                                        href="https://twitter.com/intent/tweet?url=https://jobs-72.com/emplois/{{ $jobs->id }}/{{ $jobs->author }}&text={{ $jobs->smallContent }}"
                                        class="twitter btn-share"><i class="fab fa-twitter"></i> Partager sur
                                        Twitter</a>
                                </div>

                                <hr>

                                <div class="my-4 text-right">
                                    <div class="form-group">
                                        <form method="POST"
                                            action="{{ url('/emplois/apply', [$jobs->id, $jobs->author]) }}"
                                            class="mb-2">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <div style="text-align: left !important;"><label class="mb-2">Vos
                                                    motivations</label></div>
                                            @if (Auth::user())
                                                <textarea name="motivation" required class="form-control mb-2" @if ($apply->author != Auth::user()->username || $apply->jobs_id != $jobs->id) @else disabled @endif maxlength="160"
                                                    style="height: 150px;"></textarea>
                                                <input hidden name="id" value="{{ $jobs->id }}">
                                            @else
                                                <textarea class="form-control mb-2" disabled maxlength="160"
                                                    style="height: 150px;"></textarea>
                                            @endif

                                            @if (Auth::user())
                                                @if ($apply->author != Auth::user()->username || $apply->jobs_id != $jobs->id)
                                                    <button type="submit"
                                                        class="btn btn-outline-info ripple-surface ripple-surface-dark mt-2"><i
                                                            class="fas fa-coffee mr-2"></i> Postuler à cette offre</button>
                                                @else
                                                    <a
                                                        class="btn btn-outline-info ripple-surface ripple-surface-dark mt-2 active"><i
                                                            class="fas fa-coffee mr-2"></i> Vous avez déjà postuler à cette
                                                        offre</a>
                                                @endif
                                            @else
                                                <a href="{{ route('login') }}"
                                                    class="btn btn-outline-info ripple-surface ripple-surface-dark mt-2"><i
                                                        class="fas fa-coffee mr-2"></i> Postuler à cette offre</a>
                                            @endif
                                        </form>
                                    </div>
                                </div>

                                <div class="post-author d-flex align-items-center">
                                    <div class="post-author-thumb">
                                        <img src="../../images/avatar/{{ $userJobs->avatar }}" width="100px"
                                            height="100px" alt="">
                                    </div>
                                    <div class="post-author-desc">
                                        <a href="#" class="author-name">{{ $userJobs->lastname }}
                                            {{ $userJobs->firstname }}</a>
                                        <p>{{ $userJobs->biography }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="related-post-area bg-white mb-30 px-30 pt-30 pb-0 box-shadow">

                            <div class="section-heading">
                                <h5>Emplois similaire</h5>
                            </div>
                            <div class="row">

                                @foreach ($latestJobs as $dataLatests)
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="single-blog-post style-4 mb-30">
                                            <div class="post-thumbnail">
                                                <img src="../../images/jobs/{{ $dataLatests->image }}"
                                                    alt="{{ $dataLatests->title }}">
                                            </div>
                                            <div class="post-content">
                                                <a href="{{ url('jobs', [$dataLatests->id, $dataLatests->author]) }}"
                                                    class="post-title">{{ $dataLatests->title }}</a>
                                                <a href="{{ url('jobs', [$dataLatests->id, $dataLatests->author]) }}"
                                                    class="btn btn-outline-success ripple-surface ripple-surface-dark mt-0 mb-2">Postuler</a>
                                                <div class="post-meta d-flex">
                                                    <a><i class="fas fa-eye text-secondary" aria-hidden="true"></i>
                                                        {{ $dataLatests->vue }}</a>
                                                    <a><i class="fas fa-thumbs-up text-danger" aria-hidden="true"></i>
                                                        {{ $dataLatests->likes }}</a>
                                                    <a><i class="fas fa-coffee text-info" aria-hidden="true"></i>
                                                        {{ $dataLatests->apply }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>

                    </div>

                    <div class="col-12 col-md-6 col-lg-5 col-xl-4">

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

                        <div class="sidebar-area bg-white mb-30 box-shadow">

                            <div class="single-sidebar-widget p-30">

                                <div class="social-followers-info">

                                    <a target="_new"
                                        href="https://www.facebook.com/sharer/sharer.php?u=https://jobs-72.com/emplois/{{ $jobs->id }}/{{ $jobs->author }}"
                                        class="facebook-fans btn-share"><i class="fab fa-facebook-f"></i> Partager sur
                                        Facebook
                                        <a target="_new"
                                            href="https://twitter.com/intent/tweet?url=https://jobs-72.com/emplois/{{ $jobs->id }}/{{ $jobs->author }}&text={{ $jobs->smallContent }}"
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
                                    <li><a href="{{ url('jobs', ['Ressources-Humaines']) }}"><span><i
                                                    class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                Emploi Ressources Humaines</span>
                                            <span>{{ category('Ressources Humaines') }}</span></a></li>

                                    <li><a href="{{ url('jobs', ['Commercial']) }}"><span><i
                                                    class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                Emploi Commercial</span> <span>{{ category('Commercial') }}</span></a>
                                    </li>

                                    <li><a href="{{ url('jobs', ['Distribution-et-Grande-Distribution']) }}"><span><i
                                                    class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                Emploi Distribution et Grande Distribution</span>
                                            <span>{{ category('Distribution et Grande Distribution') }}</span></a></li>

                                    <li><a href="{{ url('jobs', ['Informatique-et-Technologie-de-l’information']) }}"><span><i
                                                    class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                Emploi Informatique et Technologie de l’information</span>
                                            <span>{{ category('Informatique et Technologie de l’information') }}</span></a>
                                    </li>

                                    <li><a href="{{ url('jobs', ['Logistique']) }}"><span><i
                                                    class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                Emploi Logistique</span> <span>{{ category('Logistique') }}</span></a>
                                    </li>

                                    <li><a href="{{ url('jobs', ['Temps-partiel']) }}"><span><i
                                                    class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                Emploi Temps partiel</span>
                                            <span>{{ category('Temps partiel') }}</span></a></li>

                                    <li><a href="{{ url('jobs', ['Maintenance-et-Réparation']) }}"><span><i
                                                    class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                Emploi Maintenance et Réparation</span>
                                            <span>{{ category('Maintenance et Réparation') }}</span></a></li>

                                    <li><a href="{{ url('jobs', ['Tourisme']) }}"><span><i
                                                    class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                Emploi Tourisme</span> <span>{{ category('Tourisme') }}</span></a></li>

                                    <li><a href="{{ url('jobs', ['Finance']) }}"><span><i
                                                    class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                Emploi Finance</span> <span>{{ category('Finance') }}</span></a></li>

                                    <li><a href="{{ url('jobs', ['Alternance']) }}"><span><i
                                                    class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                Emploi Alternance</span> <span>{{ category('Alternance') }}</span></a>
                                    </li>

                                    <li><a href="{{ url('jobs', ['Fashion']) }}"><span><i
                                                    class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                Emploi Fashion</span> <span>{{ category('Fashion') }}</span></a></li>

                                    <li><a href={{ url('jobs', ['Marketing-et-Communication']) }}"><span><i
                                                    class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                Emploi Marketing et Communication</span>
                                            <span>{{ category('Marketing et Communication') }}</span></a></li>

                                    <li><a href="{{ url('jobs', ['Restauration']) }}"><span><i
                                                    class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                Emploi Restauration</span>
                                            <span>{{ category('Restauration') }}</span></a></li>

                                    <li><a href="{{ url('jobs', ['Transport']) }}"><span><i
                                                    class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                Emploi Transport</span> <span>{{ category('Transport') }}</span></a></li>

                                    <li><a href="{{ url('jobs', ['Environnement-et-Développement-durable']) }}"><span><i
                                                    class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                Emploi Environnement et Développement durable</span>
                                            <span>{{ category('Environnement et Développement durable') }}</span></a>
                                    </li>

                                    <li><a href="{{ url('jobs', ['Sécurité']) }}"><span><i
                                                    class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                Emploi Sécurité</span> <span>{{ category('Sécurité') }}</span></a></li>

                                    <li><a href="{{ url('jobs', ['Banque']) }}"><span><i
                                                    class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                Emploi Banque</span> <span>{{ category('Banque') }}</span></a></li>

                                    <li><a href="{{ url('jobs', ['Psychologue']) }}"><span><i
                                                    class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                Emploi Psychologue</span> <span>{{ category('Psychologue') }}</span></a>
                                    </li>

                                    <li><a href="{{ url('jobs', ['Hôtellerie']) }}"><span><i
                                                    class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                Emploi Hôtellerie</span> <span>{{ category('Hôtellerie') }}</span></a>
                                    </li>

                                    <li><a href="{{ url('jobs', ['Cadres-et-Direction']) }}"><span><i
                                                    class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                Emploi Cadres et Direction</span>
                                            <span>{{ category('Cadres et Direction') }}</span></a></li>

                                    <li><a href="{{ url('jobs', ['Santé']) }}"><span><i class="fas fa-angle-double-right"
                                                    aria-hidden="true"></i>
                                                Emploi Santé</span>
                                            <span>{{ category('Santé') }}</span></a></li>
                                </ul>
                            </div>

                            <div class="single-sidebar-widget">
                                <a href="{{ $publicite->url }}" target="_new" class="add-img"><img
                                        src="../../images/jobs/publicite/{{ $publicite->image }}"
                                        alt="{{ $jobs->title }}"></a>
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
