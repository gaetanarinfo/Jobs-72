<div class="container mt-2 fadeOn">

    <h4 class="mb-3 text-center"><strong>Offres d'emploi</strong></h4>

    <div class="text-center mb-3">
        <img src="images/localisation.png" width="120px" alt="emplois" class="clignote" />
    </div>

    <div class="row mb-2">
        @if ($latestJobsCount != 0)
            @foreach ($latestJobs as $jobs)
                <div class="col-md-6">
                    <div class="card flex-md-row mb-4 box-shadow h-md-250">
                        <div class="card-body d-flex flex-column align-items-start">
                            <strong class="d-inline-block mb-2 text-success">{{ $jobs->category }}</strong>
                            <h3 class="mb-1">
                                <a class="text-dark"
                                    href="{{ url('emplois', [$jobs->id, $jobs->author]) }}">{{ $jobs->title }}</a>
                            </h3>
                            <div class="mb-1 text-muted mt-1"><i class="fas fa-clock text-warning" aria-hidden="true"></i> 
                                @if (now()->addDays(1)->addHours(2)->format('Y-m-d H:i:s') > $jobs->created_at)
                                    Publié aujourd'hui
                                @else
                                {{ $jobs->created_at->translatedFormat('l jS F Y à H:i') }}
                                @endif
                            </div>
                            <div class="mb-1 text-muted"> <i class="fas fa-map-pin text-secondary"></i>
                                <strong>{{ $jobs->localisation }}</strong>
                            </div>
                            <div class="mb-1">
                                <span class="badge bg-info">
                                    {{ $jobs->poste }}</span>
                                <span class="badge bg-success">
                                    {{ $jobs->type }}</span>
                                @if (now()->addDays(7)->addHours(2)->format('Y-m-d H:i:s') > $jobs->created_at)
                                    <span class="badge bg-danger"><i class="fab fa-hotjar text-white mr-1"></i>
                                        NOUVEAU</span>
                                @endif
                            </div>
                            <p class="card-text mb-auto">{{ $jobs->smallContent }}</p>
                            <a href="{{ url('emplois', [$jobs->id, $jobs->author]) }}"
                                class="btn btn-outline-success ripple-surface ripple-surface-dark mt-2">Postuler</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="text-center">
                <h4>Désolé, il n'y a pas d'offre d'emploi, pour le moment !</h4>
            </div>
        @endif
    </div>
</div>
