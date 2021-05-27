<link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}" />

<style>
    .active {
        cursor: pointer;
        text-decoration: none;
        pointer-events: all;
    }

</style>

<div class="container mt-5 fadeOn" id="career">
    <!--Section: Content-->
    <section class="text-center">
        <h4 class="mb-4"><strong>TOP Conseils Carrière</strong></h4>
    </section>

    <div class="owl-carousel owl-2">

        <div class="media-29101">
            <img src="{{ asset('images/career/Career-Advice-Position1@2x-01.webp') }}" alt="Image" class="img-fluid">
            <span class="badge bg-info mb-2">Cv</span>
            <h3 class="mb-1 mt-1">Les tendances CV du moment</h3>
            <p class="mt-0">Le CV est le premier contact entre le candidat et le recruteur mais il se limite plus à
                un
                document qui
                relate la somme des expériences acquises. Pour Pauline Lahary, la fondatrice de my cv factory, le CV
                représente désormais ce qu’est le candidat dans sa globalité. Et c’est ce CV qui attire l’œil des
                entreprises.</p>
            <a href="{{ route('career', [1, strtolower(str_replace(' ', '-', 'Les tendances CV du moment'))]) }}" class="btn btn-info">En savoir plus</a>
        </div>

        <div class="media-29101">
            <img src="{{ asset('images/career/Career-Advice-Position2@2x-01.webp') }}" alt="Image" class="img-fluid">
            <span class="badge bg-warning mb-2">Entretien d’embauche</span>
            <h3 class="mb-1 mt-1">5 conseils pour réussir un entretien vidéo</h3>
            <p class="mt-0">Crise sanitaire oblige, les contacts physiques sont évités autant que possible et les
                entretiens d'embauche en présentiel reportés. Et il est probable que les entreprises qui sont toujours à
                la recherche de candidats passent à des entretiens vidéo via des outils comme Skype ou FaceTime...
            </p>
            <a href="{{ route('career', 2) }}" class="btn btn-info">En savoir plus</a>
        </div>

        <div class="media-29101">
            <img src="{{ asset('images/career/Career-Advice-Position3@2x-01.webp') }}" alt="Image" class="img-fluid">
            <span class="badge bg-success mb-2">Jeunes Diplômés</span>
            <h3 class="mb-1 mt-1">Convaincre quand on est jeune diplômé</h3>
            <p class="mt-0">Pas facile de se « vendre » face à un recruteur quand la case « Expériences professionnelles
                » de son CV est quasi vide. Marie Hathroubi, Directrice Recrutement & Formation chez Hays nous explique
                qu’heureusement, il existe d’autres façons de convaincre son futur employeur.
            </p>
            <a href="{{ route('career', 3) }}" class="btn btn-info">En savoir plus</a>
        </div>

        <div class="media-29101">
            <img src="{{ asset('images/career/Career-Advice-Position4@2x-01.webp') }}" alt="Image" class="img-fluid">
            <span class="badge bg-danger mb-2">Seniors</span>
            <h3 class="mb-1 mt-1">Senior : CV par compétence ou expérience ?</h3>
            <p class="mt-0">Comment résumer ses expertises et compétences accumulées au fil des années ? L’exercice est
                un challenge
                qui demande une bonne dose de réflexion pour réaliser un CV synthétique et cohérent.</p>
            <a href="{{ route('career', 4) }}" class="btn btn-info">En savoir plus</a>
        </div>

        <div class="media-29101">
            <img src="{{ asset('images/career/Career-Advice-Position5@2x-01.webp') }}" alt="Image" class="img-fluid">
            <span class="badge bg-secondary mb-2">Vie en entreprise</span>
            <h3 class="mb-1 mt-1">Comment bien gérer le télétravail ?</h3>
            <p class="mt-0">A l’issue du confinement, moult études se sont succédé pour interroger les salariés sur leur
                appréciation
                du télétravail, une pratique inédite pour nombre d’entre eux. Si en 2018, seulement 3% des salariés
                français télétravaillaient de façon encadrée, un sondage Odaxa du 9 avril révélait qu’à la fin mars,
                24...</p>
            <a href="{{ route('career', 5) }}" class="btn btn-info">En savoir plus</a>
        </div>

    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
