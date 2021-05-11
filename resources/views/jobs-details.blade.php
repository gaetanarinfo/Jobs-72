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
                                <h6 class="total-views"><i class="fas fa-eye"></i> 0 Vue(s)</h6>
                                <div class="like-dislike d-flex align-items-center">
                                    <button type="button"><i class="fas fa-thumbs-up"></i> 0
                                        J'aime(s)</button>
                                    <p><i class="fas fa-comments" aria-hidden="true"></i> 0 Postulant(s)</p>
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
                                    <a>{{ $jobs->category }}</a>
                                </div>
                                <h4 class="post-title">{{ $jobs->title }}</h4>

                                <div class="post-meta-2">
                                    <a><i class="fas fa-eye" aria-hidden="true"></i> 0</a>
                                    <a><i class="fas fa-thumbs-up" aria-hidden="true"></i> 0</a>
                                    <a><i class="fas fa-comments" aria-hidden="true"></i> 0</a>
                                </div>

                                {!! html_entity_decode($jobs->content) !!}

                                <hr />

                                <div class="row">
                                    <div class="col-12 col-lg-8">
                                        <h4 class="mb-3">Détail du poste</h4>
                                        <ul>
                                            <li><i class="fa fa-check-circle" aria-hidden="true"></i> Status :
                                                {{ $jobs->status }}</li>
                                            <li><i class="fa fa-check-circle" aria-hidden="true"></i> Type d'emploi :
                                                {{ $jobs->type }}</li>
                                            <li><i class="fa fa-check-circle" aria-hidden="true"></i> Salaire :
                                                {{ $jobs->salaire }}</li>
                                            <li><i class="fa fa-check-circle" aria-hidden="true"></i> Avantages : </li>
                                            @foreach (json_decode($jobs->avantages, true) as $key => $value)
                                                <li class="ml-3"><i class="fa fa-check" aria-hidden="true"></i>
                                                    {{ $value }}</li>
                                            @endforeach
                                            </li>
                                            <li><i class="fa fa-check-circle" aria-hidden="true"></i> Horaires :
                                                {{ $jobs->horaires }}</li>
                                            <li><i class="fa fa-check-circle" aria-hidden="true"></i> Télétravail :
                                                {{ $jobs->teletravail }}</li>
                                        </ul>
                                    </div>
                                </div>

                                <hr />

                                <div class="like-dislike-share my-4">
                                    <a href="#" class="facebook"><i class="fab fa-facebook-f"></i> Partager sur
                                        Facebook</a>
                                    <a href="#" class="twitter"><i class="fab fa-twitter"></i> Partager sur
                                        Twitter</a>
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
                                <h5>Annonces similaire</h5>
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
                                                <div class="post-meta d-flex">
                                                    <a><i class="fas fa-eye" aria-hidden="true"></i> {{ $dataLatests->vue }}</a>
                                                    <a><i class="fas fa-thumbs-up" aria-hidden="true"></i> {{ $dataLatests->likes }}</a>
                                                    <a><i class="fas fa-comments" aria-hidden="true"></i> {{ $dataLatests->postulant }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>

                    </div>

                    <div class="col-12 col-md-6 col-lg-5 col-xl-4">
                        <div class="sidebar-area bg-white mb-30 box-shadow">

                            <div class="single-sidebar-widget p-30">

                                <div class="social-followers-info">

                                    <a href="#" class="facebook-fans"><i class="fab fa-facebook-f"></i> Partager sur
                                        Facebook</a>

                                    <a href="#" class="twitter-followers"><i class="fab fa-twitter"></i> Partager sur
                                        Twitter</a>

                                </div>
                            </div>

                            <div class="single-sidebar-widget p-30" style="padding-top: 0px !important;">

                                <div class="section-heading">
                                    <h5>Categories</h5>
                                </div>

                                <ul class="catagory-widgets">
                                    <li><a href="#"><span><i class="fas fa-angle-double-right" aria-hidden="true"></i> Life
                                                Style</span> <span>35</span></a></li>
                                    <li><a href="#"><span><i class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                Travel</span> <span>30</span></a></li>
                                    <li><a href="#"><span><i class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                Foods</span> <span>13</span></a></li>
                                    <li><a href="#"><span><i class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                Game</span> <span>06</span></a></li>
                                    <li><a href="#"><span><i class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                Sports</span> <span>28</span></a></li>
                                    <li><a href="#"><span><i class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                Football</span> <span>08</span></a></li>
                                    <li><a href="#"><span><i class="fas fa-angle-double-right" aria-hidden="true"></i> TV
                                                Show</span> <span>13</span></a></li>
                                </ul>
                            </div>

                            <div class="single-sidebar-widget">
                                <a href="#" class="add-img"><img src="../../test/add2.png" alt=""></a>
                            </div>

                            <div class="single-sidebar-widget p-30">

                                <div class="section-heading">
                                    <h5>Hot Channels</h5>
                                </div>

                                <div class="single-youtube-channel d-flex">
                                    <div class="youtube-channel-thumbnail">
                                        <img src="../../test/14.jpg" alt="">
                                    </div>
                                    <div class="youtube-channel-content">
                                        <a href="single-post.html" class="channel-title">TV Show</a>
                                        <a href="#" class="btn subscribe-btn"><i class="fas fa-play-circle"
                                                aria-hidden="true"></i> Subscribe</a>
                                    </div>
                                </div>

                                <div class="single-youtube-channel d-flex">
                                    <div class="youtube-channel-thumbnail">
                                        <img src="../../test/15.jpg" alt="">
                                    </div>
                                    <div class="youtube-channel-content">
                                        <a href="single-post.html" class="channel-title">Game Channel</a>
                                        <a href="#" class="btn subscribe-btn"><i class="fas fa-play-circle"
                                                aria-hidden="true"></i> Subscribe</a>
                                    </div>
                                </div>

                                <div class="single-youtube-channel d-flex">
                                    <div class="youtube-channel-thumbnail">
                                        <img src="../../test/16.jpg" alt="">
                                    </div>
                                    <div class="youtube-channel-content">
                                        <a href="single-post.html" class="channel-title">Sport Channel</a>
                                        <a href="#" class="btn subscribe-btn"><i class="fas fa-play-circle"
                                                aria-hidden="true"></i> Subscribe</a>
                                    </div>
                                </div>

                                <div class="single-youtube-channel d-flex">
                                    <div class="youtube-channel-thumbnail">
                                        <img src="../../test/17.jpg" alt="">
                                    </div>
                                    <div class="youtube-channel-content">
                                        <a href="single-post.html" class="channel-title">Travel Channel</a>
                                        <a href="#" class="btn subscribe-btn"><i class="fas fa-play-circle"
                                                aria-hidden="true"></i> Subscribe</a>
                                    </div>
                                </div>

                                <div class="single-youtube-channel d-flex">
                                    <div class="youtube-channel-thumbnail">
                                        <img src="../../test/18.jpg" alt="">
                                    </div>
                                    <div class="youtube-channel-content">
                                        <a href="single-post.html" class="channel-title">LifeStyle Channel</a>
                                        <a href="#" class="btn subscribe-btn"><i class="fas fa-play-circle"
                                                aria-hidden="true"></i> Subscribe</a>
                                    </div>
                                </div>
                            </div>

                            <div class="single-sidebar-widget p-30">

                                <div class="section-heading">
                                    <h5>Newsletter</h5>
                                </div>
                                <div class="newsletter-form">
                                    <p>Subscribe our newsletter gor get notification about new updates, information
                                        discount, etc.</p>
                                    <form action="#" method="get">
                                        <input type="search" name="widget-search" placeholder="Enter your email">
                                        <button type="submit" class="btn mag-btn w-100">Subscribe</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
