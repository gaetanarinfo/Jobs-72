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

        @foreach ($latestCareers as $career)
            <div class="media-29101">
                <img src="{{ asset('images/career/' . careerImg($career->category)) }}" alt="{{ $career->title }}"
                    class="img-fluid">
                <span class="badge {{ careerCat($career->category) }} mb-2">{{ $career->category }}</span>
                <h3 class="mb-1 mt-1">{{ $career->title }}</h3>
                <p class="mt-0">{{ $career->smallContent }}</p>
                <a href="{{ route('career', [$career->id, strtolower(str_replace('?', '', str_replace(' ', '-', $career->title)))]) }}"
                    class="btn btn-info">En savoir plus</a>
            </div>
        @endforeach

    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
