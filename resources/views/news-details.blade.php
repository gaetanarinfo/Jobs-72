@extends('layouts.app')

@section('title', $news->title)

@section('content')

    <link rel="stylesheet" href="../css/styles-jobs.css" />
    <link rel="stylesheet" href="../css/template-jobs.css" />

    @include('components.head')

    <div class="container mt-3">
        <section class="post-details-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="single-video-area bg-white mb-30 box-shadow">
                            <div style="background: url('../images/news/{{ $news->image }}');width: 100%;height: 416px;background-position: center;background-attachment: scroll;background-size: cover;background-repeat: no-repeat;"
                                title="{{ $news->title }}"></div>

                            <div class="video-meta-data d-flex align-items-center justify-content-between">
                                <h6 class="total-views"><i class="fas fa-eye text-secondary"></i> {{ $news->vue }} Vue(s)
                                </h6>
                                <div class="like-dislike d-flex align-items-center">
                                    @if (Auth::user())
                                        @if ($likeVue->ip != $ipUser)
                                            <a href="{{ url('news/like', [$news->id, $news->author]) }}"
                                                class="mr-2"><i class="fas fa-thumbs-up text-danger"></i>
                                                {{ $news->likes }}
                                                J'aime(s)</a>
                                        @else
                                            <a class="mr-2 active"><i class="fas fa-thumbs-up text-danger"></i>
                                                {{ $news->likes }}
                                                J'aime(s)</a>
                                        @endif
                                    @else
                                        <a href="{{ route('login') }}" class="mr-2"><i
                                                class="fas fa-thumbs-up text-danger"></i>
                                            {{ $news->likes }}
                                            J'aime(s)</a>
                                    @endif
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
                                    <a href="#">Mise en ligne le
                                        {{ date('d/m/Y à H:i', strtotime($news->created_at)) }}</a>
                                    <a href="#">{{ $news->category }}</a>
                                </div>
                                <h4 class="post-title">{{ $news->title }}</h4>

                                <div class="post-meta-2">
                                    <a><i class="fas fa-eye text-secondary" aria-hidden="true"></i> {{ $news->vue }}</a>
                                    <a><i class="fas fa-thumbs-up text-danger" aria-hidden="true"></i>
                                        {{ $news->likes }}</a>
                                </div>

                                {!! html_entity_decode($news->content) !!}

                                <hr />

                                <div class="like-dislike-share my-4">
                                    <a target="_new"
                                        href="https://www.facebook.com/sharer/sharer.php?u=https://jobs-72.com/article/{{ $news->id }}"
                                        class="facebook btn-share"><i class="fab fa-facebook-f"></i> Partager sur
                                        Facebook</a>
                                    <a target="_new"
                                        href="https://twitter.com/intent/tweet?url=https://jobs-72.com/article/{{ $news->id }}&text={{ $news->smallContent }}"
                                        class="twitter btn-share"><i class="fab fa-twitter"></i> Partager sur
                                        Twitter</a>
                                </div>

                                <div class="post-author d-flex align-items-center">
                                    <div class="post-author-thumb">
                                        <img src="../../images/avatar/@foreach(user($news->author) as
                                        $user){{ $user->avatar }}@endforeach" width="100px"
                                        height="100px" alt="@foreach(user($news->author) as
                                        $user){{ $user->username }}@endforeach">
                                    </div>
                                    <div class="post-author-desc">
                                        <a href="#" class="author-name">
                                            @foreach (user($news->author) as $user)
                                                {{ $user->lastname }} {{ $user->firstname }} @endforeach
                                        </a>
                                        <p>
                                            @foreach (user($news->author) as $user)
                                                {{ $user->biography }}@endforeach
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="related-post-area bg-white mb-30 px-30 pt-30 pb-0 box-shadow">

                            <div class="section-heading">
                                <h5>Article similaires</h5>
                            </div>
                            <div class="row">
                                @foreach ($latestNews as $dataLatests)
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="single-blog-post style-4 mb-30">
                                        <div class="post-thumbnail">
                                            <img src="../../images/jobs/{{ $dataLatests->image }}"
                                            alt="{{ $dataLatests->title }}">
                                        </div>
                                        <div class="post-content">
                                            <a href="{{ route('news', $dataLatests->id) }}"
                                                class="post-title">{{ $dataLatests->title }}</a>
                                            <div class="mb-3">{{ $dataLatests->smallContent }}</div>    
                                            <a href="{{ route('news', $dataLatests->id) }}"
                                                class="btn btn-info mb-3 ripple-surface">Lire la suite...</a>
                                            <div class="post-meta d-flex">
                                                <a><i class="fas fa-eye text-secondary" aria-hidden="true"></i>
                                                    {{ $dataLatests->vue }}</a>
                                                <a><i class="fas fa-thumbs-up text-danger" aria-hidden="true"></i>
                                                    {{ $dataLatests->likes }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="comment_area clearfix bg-white mb-30 p-30 box-shadow">

                            <div class="section-heading">
                                <h5>COMMENTAIRE(S) {{ $countComment }}</h5>
                            </div>
                            <ol>
                                @if ($countComment != 0)
                                    @foreach ($commentAll as $comments)
                                    <li class="single_comment_area">

                                        <div class="comment-content d-flex">

                                            <div class="comment-author">
                                                <img src="../../images/avatar/@foreach(user($comments->author) as
                                                $user){{ $user->avatar }}@endforeach" alt="@foreach(user($comments->author) as
                                                $user){{ $user->username }}@endforeach" width="70px"
                                        height="70px">
                                            </div>

                                            <div class="comment-meta">
                                                <a href="#" class="comment-date">Le {{ date('d/m/Y à H:i', strtotime($comments->created_at)) }}</a>
                                                <h6>@foreach(user($comments->author) as $user){{ $user->lastname }} {{ $user->firstname }}@endforeach</h6>
                                                <p>{{ $comments->content }}</p>
                                                <div class="d-flex align-items-center">
                                                    @if (Auth::user())
                                                            <a href="{{ route('like_news', [$comments->news_id, $comments->user_id]) }}" class="like"><i class="fas fa-thumbs-up mr-0 text-danger"></i> J'aime <b>({{ $comments->likes }})</b></a>
                                                    @else
                                                        <a href="{{ route('login') }}" class="like"><i class="fas fa-thumbs-up mr-0 text-danger"></i> J'aime <b>({{ $comments->likes }})</b></a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                @else
                                    <li class="text-danger text-center"><b>Aucun commentaire pour le moment.</b></li>    
                                @endif
                                

                            </ol>
                        </div>

                        <div class="post-a-comment-area bg-white mb-30 p-30 box-shadow clearfix">

                            <div class="section-heading">
                                <h5>LAISSER UN COMMENTAIRE</h5>
                            </div>

                            <div class="contact-form-area">
                                <form action="{{ route('post_comment', $news->id) }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <textarea name="content" class="form-control" cols="30" rows="10"
                                                placeholder="Votre message *" required></textarea>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn mag-btn mt-30">Poster le commentaire</button>
                                        </div>
                                    </div>
                                </form>
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
                                        href="https://www.facebook.com/sharer/sharer.php?u=https://jobs-72.com/article/{{ $news->id }}"
                                        class="facebook-fans btn-share"><i class="fab fa-facebook-f"></i> Partager sur
                                        Facebook
                                        <a target="_new"
                                            href="https://twitter.com/intent/tweet?url=https://jobs-72.com/article/{{ $news->id }}&text={{ $news->smallContent }}"
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
                                            <span>{{ category('Ressources Humaines') }}</span></a></li>

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
                                        src="../../images/jobs/publicite/{{ $publicite->image }}"
                                        alt="{{ $news->title }}"></a>
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
