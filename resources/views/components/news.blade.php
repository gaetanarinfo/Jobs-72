    <div class="container mt-2 fadeOn">
        <!--Section: Content-->
        <section class="text-center">
            <h4 class="mb-3"><strong>Actualités du jour</strong></h4>

            <div class="text-center mb-3">
                <img src="images/actus.png" width="120px" alt="actus" class="clignote" />
            </div>

            <div class="container-fluid">
                <div class="row card-mobile">
                    @if ($latestNewsCount != 0)
                        @foreach ($latestNews as $news)

                            <div class="col-10 mt-0 mb-0 m-auto">
                                <div class="card" style="box-shadow: 0 0 20px 0 rgb(0 0 0 / 28%);border-top-right-radius: 4px;border-bottom-right-radius: 4px;">
                                    <div class="card-horizontal">
                                        <div class="img-square-wrapper">
                                            <img class=""
                                                style="display: block;position: relative;top: 0;left: 0;width: 294px;"
                                                src="images/news/{{ $news->image }}" alt="{{ $news->title }}">
                                        </div>
                                        <div class="card-body">
                                            <a href="{{ route('news', $news->id) }}" title="{{ $news->title }}">
                                                <h6 class="card-title text-left">{{ $news->title }}</h6>
                                            </a>
                                            <p style="font-size: 15px;" class="card-text text-left">
                                                {{ $news->smallContent }}</p>
                                        </div>
                                    </div>
                                    <div class="card-footer foo text-left">
                                        <span class="badge bg-info"
                                            style="padding: 10px 12px !important;line-height: 14px;"><i
                                                class="fas fa-clock text-white mr-0" aria-hidden="true"></i>
                                            {{ $news->created_at->translatedFormat('l jS F Y à H:i') }}</span>
                                        <a style="width: 135px; height: 32px; padding: 10px 12px;line-height: 14px; font-weight: 600 !important;"
                                            href="{{ route('news', $news->id) }}"
                                            class="btn btn-secondary ripple-surface ripple-surface-dark ml-2">Lire
                                            la
                                            suite...</a>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="col-md-6 m-auto">
                                        <hr style="text-align: center;">
                                    </div>
                                </div>

                            </div>

                        @endforeach
                    @else
                        <div class="text-center mt-2">
                            <h4>Désolé, il n'y a pas d'actualité en ligne, pour le moment !</h4>
                        </div>
                    @endif
                </div>

                <div class="row card-m">
                    @if ($latestNewsCount != 0)
                        @foreach ($latestNews as $news)

                            <div class="col-lg-4 col-md-12 mb-4">
                                <div class="card">
                                    <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                        <img width="112px" src="images/news/{{ $news->image }}" class="img-fluid"
                                            alt="{{ $news->title }}" />
                                        <a href="{{ route('news', $news->id) }}">
                                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);">
                                            </div>
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $news->title }}</h5>
                                        <div class="mb-1 text-muted"><i class="fas fa-clock text-warning"
                                                aria-hidden="true"></i> Mise
                                            en ligne le {{ $news->created_at->translatedFormat('l jS F Y à H:i') }}
                                        </div>
                                        <p class="card-text">
                                            {{ $news->smallContent }}
                                        </p>
                                        <a href="{{ route('news', $news->id) }}"
                                            class="btn btn-outline-success ripple-surface ripple-surface-dark">Lire la
                                            suite</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="col-md-6 m-auto">
                                    <hr style="text-align: center;">
                                </div>
                            </div>

                        @endforeach
                    @else
                        <div class="text-center mt-2">
                            <h4>Désolé, il n'y a pas d'actualité en ligne, pour le moment !</h4>
                        </div>
                    @endif
                </div>
        </section>
        <!--Section: Content-->
    </div>
