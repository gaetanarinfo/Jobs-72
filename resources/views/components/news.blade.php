    <div class="container mt-5 fadeOn">
        <!--Section: Content-->
        <section class="text-center">
            <h4 class="mb-3"><strong>Actualités du jour</strong></h4>

            <div class="text-center mb-3">
                <img src="images/actus.png" width="120px" alt="actus" class="clignote" />
            </div>

            <div class="row">
                @foreach ($latestNews as $news)
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
                                <div class="mb-1 text-muted"><i class="fas fa-clock text-warning"
                                        aria-hidden="true"></i> Mise en ligne le
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
        </section>
        <!--Section: Content-->
    </div>
