@extends('layouts.app')

@section('title', $jobs->title)

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
                            <div style="background: url('../images/jobs/{{ $jobs->image }}');width: 100%;height: 416px;background-position: center;background-attachment: scroll;background-size: cover;background-repeat: no-repeat;"
                                title="{{ $jobs->title }}"></div>

                            <div class="video-meta-data d-flex align-items-center justify-content-between">
                                <h6 class="total-views"><i class="fas fa-eye"></i> 0 Vue(s)</h6>
                                <div class="like-dislike d-flex align-items-center">
                                    <button type="button"><i class="fas fa-thumbs-up"></i> 0
                                        J'aime(s)</button>
                                    <p><i class="fas fa-comments" aria-hidden="true"></i> 0 Commentaire(s)</p>
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
                                    <a href="#">Mise en ligne le {{ date('d/m/Y à H:i', strtotime($jobs->created_at)) }}</a>
                                    <a href="archive.html">{{ $jobs->category }}</a>
                                </div>
                                <h4 class="post-title">{{ $jobs->title }}</h4>

                                <div class="post-meta-2">
                                    <a href="#"><i class="fas fa-eye" aria-hidden="true"></i> 1034</a>
                                    <a href="#"><i class="fas fa-thumbs-up" aria-hidden="true"></i> 834</a>
                                    <a href="#"><i class="fas fa-comments" aria-hidden="true"></i> 234</a>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur sita adipiscing elit. Proin molestie accumsan
                                    orci suneget placerat. Etiama faucibuss orci quis posuere vestibulu. Ut id purusos
                                    ultricies, dictumax quam id, ullamcorper urna. Curabitur sitdown nisi vitae nisi
                                    vestotana vestibul ut non massa. Aliquam erat volutpat. Morbi nect nunc et orci euismode
                                    finibus. Donec lobortis venenatis turpis. Aenean act congue arcu, nect porttitor magna.
                                    Nam consequa ligula nibh, in maximus gravida. Vivamus nuornare masa. Quisque sed honcus
                                    leo, ullamcorper auctor mi. Maecenas mollis purus, mattis nisl condimentum. Nam eros
                                    elementu, congue diam imperdiet, interdum tellus.</p>
                                <p>Mauris dapibus turpis vel ialis tempor. Morbi turpis leon, pulvinar vitae convallis
                                    vitae, scelerisque necto eros. Suspendisse vitae pharetra risus. Pellentesque varius,
                                    felis in lacinia faucibus, ipsum liula aliquam nulla, non honcus nunc ipsum eu risus.
                                    Nunc finibus euismod magna sagittis. Sed dictum libero consectetur.</p>
                                <div class="row">
                                    <div class="col-12 col-lg-8">
                                        <p>Vivamus nisl metus, dictum sit amet porttitor sit amet, lobortis sit amet ipsum.
                                            Mauris ut quam non magna gravida egestas. Sed rutrum sapien eget lorem bibendum
                                            ullamcorper.</p>
                                        <ul>
                                            <li><i class="fas fa-check-circle" aria-hidden="true"></i> Duis blandit maximus
                                                tellus, sagittis volutpat tellus sandi.</li>
                                            <li><i class="fas fa-check-circle" aria-hidden="true"></i> Etiam vel auctor
                                                elit. Usaceros suscipit, lobortis felis non.</li>
                                            <li><i class="fas fa-check-circle" aria-hidden="true"></i> Integer sagittis
                                                finibus nequer, euster tincidunt misult.</li>
                                            <li><i class="fas fa-check-circle" aria-hidden="true"></i> Pellentesque euismod
                                                semeget diam ege</li>
                                        </ul>
                                        <p>Aliquam venenatis dui elit, et viverra mi maximus quis. Etiam vel auctor elit. Ut
                                            ac eros suscipit, lobortis felison, vulputate tellus. Suspendisse hendrerit
                                            aliquet lectus.</p>
                                    </div>
                                </div>
                                <p>Mauris nisi arcu, consectetur convallis fringilla quis, posuere ac mauris. Ut in placerat
                                    lorem. Donec cursus malesuada nibhem, eget consectetur posuere sed. Suspendisse auctor
                                    nec diamet consectetur. Etiam ac maurised nisib tincidunt viverra. Sed nulla lacus,
                                    convallis vel nunc sed, fringilla venenatis neque.</p>
                                <blockquote>
                                    <h6 class="quote-text">“Design is a funny word. Some people think design means how it
                                        looks. But of course, if you dig deeper, it's really how it works. The design of the
                                        Mac wasn't what it looked like, although that was part of it.”</h6>
                                    <h6 class="quote-name">STEVE JOBS</h6>
                                </blockquote>
                                <p>Phasellus laoreet mattis ultrices. Integer ex sem, ultrices eu sem in, laoreet vehicula
                                    ligula. Phasellus quistor blandit salah convallis augue. Sed velot dictum sapient. In
                                    pulvinar libero turpis. Quisque facilisis bigbang consenti. Nullam bendumaz, massan
                                    consequat in gravida porttitor, aguet lacus condimentum mauris, id blandit quam augue
                                    eget mana. Etiam denim jeans lacus, nascetur auge bibendum vel pulvinar viverra, mattis
                                    sit amet mi. Mauris fringilla, ex vitae maximus fringilla, neque sapien maximus justo,
                                    cursus risus neque sed nibh. Donec at urna eros scelerisque non nibh sed.</p>

                                <div class="like-dislike-share my-5">
                                    <h4 class="share">240<span>Share</span></h4>
                                    <a href="#" class="facebook"><i class="fab fa-facebook-f"></i> Share on
                                        Facebook</a>
                                    <a href="#" class="twitter"><i class="fab fa-twitter"></i> Share on
                                        Twitter</a>
                                </div>

                                <div class="post-author d-flex align-items-center">
                                    <div class="post-author-thumb">
                                        <img src="../test/52.jpg" alt="">
                                    </div>
                                    <div class="post-author-desc pl-4">
                                        <a href="#" class="author-name">Alan Shaerer</a>
                                        <p>Duis tincidunt turpis sodales, tincidunt nisi et, auctor nisi. Curabitur
                                            vulputate sapien eu metus ultricies fermentum nec vel augue. Maecenas eget
                                            lacinia est.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="related-post-area bg-white mb-30 px-30 pt-30 pb-0 box-shadow">

                            <div class="section-heading">
                                <h5>Related Post</h5>
                            </div>
                            <div class="row">

                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="single-blog-post style-4 mb-30">
                                        <div class="post-thumbnail">
                                            <img src="../test/29.jpg" alt="">
                                        </div>
                                        <div class="post-content">
                                            <a href="single-post.html" class="post-title">Dentists Are Smiling Over Painless
                                                Veneer</a>
                                            <div class="post-meta d-flex">
                                                <a href="#"><i class="fas fa-eye" aria-hidden="true"></i> 1034</a>
                                                <a href="#"><i class="fas fa-thumbs-up" aria-hidden="true"></i> 834</a>
                                                <a href="#"><i class="fas fa-comments" aria-hidden="true"></i> 234</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="single-blog-post style-4 mb-30">
                                        <div class="post-thumbnail">
                                            <img src="../test/30.jpg" alt="">
                                            <a href="video-post.html" class="video-play"><i class="fas fa-play"></i></a>
                                            <span class="video-duration">09:27</span>
                                        </div>
                                        <div class="post-content">
                                            <a href="single-post.html" class="post-title">Will The Democrats Be Able To
                                                Reverse</a>
                                            <div class="post-meta d-flex">
                                                <a href="#"><i class="fas fa-eye" aria-hidden="true"></i> 1034</a>
                                                <a href="#"><i class="fas fa-thumbs-up" aria-hidden="true"></i> 834</a>
                                                <a href="#"><i class="fas fa-comments" aria-hidden="true"></i> 234</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="single-blog-post style-4 mb-30">
                                        <div class="post-thumbnail">
                                            <img src="../test/28.jpg" alt="">
                                        </div>
                                        <div class="post-content">
                                            <a href="single-post.html" class="post-title">A Guide To Rocky Mountain
                                                Vacations</a>
                                            <div class="post-meta d-flex">
                                                <a href="#"><i class="fas fa-eye" aria-hidden="true"></i> 1034</a>
                                                <a href="#"><i class="fas fa-thumbs-up" aria-hidden="true"></i> 834</a>
                                                <a href="#"><i class="fas fa-comments" aria-hidden="true"></i> 234</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="comment_area clearfix bg-white mb-30 p-30 box-shadow">

                            <div class="section-heading">
                                <h5>COMMENTS</h5>
                            </div>
                            <ol>

                                <li class="single_comment_area">

                                    <div class="comment-content d-flex">

                                        <div class="comment-author">
                                            <img src="../test/53.jpg" alt="author">
                                        </div>

                                        <div class="comment-meta">
                                            <a href="#" class="comment-date">27 Aug 2019</a>
                                            <h6>Tomas Mandy</h6>
                                            <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                                adipisci velit, sed quia non numquam eius</p>
                                            <div class="d-flex align-items-center">
                                                <a href="#" class="like">like</a>
                                                <a href="#" class="reply">Reply</a>
                                            </div>
                                        </div>
                                    </div>
                                    <ol class="children">
                                        <li class="single_comment_area">

                                            <div class="comment-content d-flex">

                                                <div class="comment-author">
                                                    <img src="../test/54.jpg" alt="author">
                                                </div>

                                                <div class="comment-meta">
                                                    <a href="#" class="comment-date">27 Aug 2019</a>
                                                    <h6>Britney Millner</h6>
                                                    <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet,
                                                        consectetur, adipisci velit, sed quia non numquam eius</p>
                                                    <div class="d-flex align-items-center">
                                                        <a href="#" class="like">like</a>
                                                        <a href="#" class="reply">Reply</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ol>
                                </li>

                                <li class="single_comment_area">

                                    <div class="comment-content d-flex">

                                        <div class="comment-author">
                                            <img src="../test/55.jpg" alt="author">
                                        </div>

                                        <div class="comment-meta">
                                            <a href="#" class="comment-date">27 Aug 2019</a>
                                            <h6>Simon Downey</h6>
                                            <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                                adipisci velit, sed quia non numquam eius</p>
                                            <div class="d-flex align-items-center">
                                                <a href="#" class="like">like</a>
                                                <a href="#" class="reply">Reply</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ol>
                        </div>

                        <div class="post-a-comment-area bg-white mb-30 p-30 box-shadow clearfix">

                            <div class="section-heading">
                                <h5>LEAVE A REPLY</h5>
                            </div>

                            <div class="contact-form-area">
                                <form action="#" method="post">
                                    <div class="row">
                                        <div class="col-12 col-lg-6">
                                            <input type="text" class="form-control" id="name" placeholder="Your Name*"
                                                required="">
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <input type="email" class="form-control" id="email" placeholder="Your Email*"
                                                required="">
                                        </div>
                                        <div class="col-12">
                                            <textarea name="message" class="form-control" id="message" cols="30" rows="10"
                                                placeholder="Message*" required=""></textarea>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn mag-btn mt-30" type="submit">Submit Comment</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-5 col-xl-4">
                        <div class="sidebar-area bg-white mb-30 box-shadow">

                            <div class="single-sidebar-widget p-30">

                                <div class="social-followers-info">

                                    <a href="#" class="facebook-fans"><i class="fab fa-facebook-f"></i> Share on
                                        Fans</a>

                                    <a href="#" class="twitter-followers"><i class="fab fa-twitter"></i> Share on
                                        Followers</a>

                                </div>
                            </div>

                            <div class="single-sidebar-widget p-30">

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
                                <a href="#" class="add-img"><img src="../test/add2.png" alt=""></a>
                            </div>

                            <div class="single-sidebar-widget p-30">

                                <div class="section-heading">
                                    <h5>Hot Channels</h5>
                                </div>

                                <div class="single-youtube-channel d-flex">
                                    <div class="youtube-channel-thumbnail">
                                        <img src="../test/14.jpg" alt="">
                                    </div>
                                    <div class="youtube-channel-content">
                                        <a href="single-post.html" class="channel-title">TV Show</a>
                                        <a href="#" class="btn subscribe-btn"><i class="fas fa-play-circle"
                                                aria-hidden="true"></i> Subscribe</a>
                                    </div>
                                </div>

                                <div class="single-youtube-channel d-flex">
                                    <div class="youtube-channel-thumbnail">
                                        <img src="../test/15.jpg" alt="">
                                    </div>
                                    <div class="youtube-channel-content">
                                        <a href="single-post.html" class="channel-title">Game Channel</a>
                                        <a href="#" class="btn subscribe-btn"><i class="fas fa-play-circle"
                                                aria-hidden="true"></i> Subscribe</a>
                                    </div>
                                </div>

                                <div class="single-youtube-channel d-flex">
                                    <div class="youtube-channel-thumbnail">
                                        <img src="../test/16.jpg" alt="">
                                    </div>
                                    <div class="youtube-channel-content">
                                        <a href="single-post.html" class="channel-title">Sport Channel</a>
                                        <a href="#" class="btn subscribe-btn"><i class="fas fa-play-circle"
                                                aria-hidden="true"></i> Subscribe</a>
                                    </div>
                                </div>

                                <div class="single-youtube-channel d-flex">
                                    <div class="youtube-channel-thumbnail">
                                        <img src="../test/17.jpg" alt="">
                                    </div>
                                    <div class="youtube-channel-content">
                                        <a href="single-post.html" class="channel-title">Travel Channel</a>
                                        <a href="#" class="btn subscribe-btn"><i class="fas fa-play-circle"
                                                aria-hidden="true"></i> Subscribe</a>
                                    </div>
                                </div>

                                <div class="single-youtube-channel d-flex">
                                    <div class="youtube-channel-thumbnail">
                                        <img src="../test/18.jpg" alt="">
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
