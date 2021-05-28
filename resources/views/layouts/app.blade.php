<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Jobs-72 @yield('title') - Trouvez le job qu'il vous faut</title>
    <meta name="Description"
        content="Trouvez le job qu'il vous faut sur le site d'emploi Jobs-72. Parcourez des milliers d'offres, publiez votre CV et boostez votre carrière grâce à nos conseils !">
    <meta name="affiliate" content="jobs" />

    <!-- Primary Meta Tags -->
    <meta name="title" content="Jobs-72 @yield('title') - Trouvez le job qu'il vous faut">
    <meta name="description"
        content="Trouvez le job qu'il vous faut sur le site d'emploi Jobs-72. Parcourez des milliers d'offres, publiez votre CV et boostez votre carrière grâce à nos conseils !">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://jobs-72.com">
    <meta property="og:title" content="Jobs-72 @yield('title') - Trouvez le job qu'il vous faut">
    <meta property="og:description"
        content="Trouvez le job qu'il vous faut sur le site d'emploi Jobs-72. Parcourez des milliers d'offres, publiez votre CV et boostez votre carrière grâce à nos conseils !">
    <meta property="og:image" content="https://jobs-72.com/images/entreprises.jpg">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://jobs-72.com/">
    <meta property="twitter:title" content="Jobs-72 @yield('title') - Trouvez le job qu'il vous faut">
    <meta property="twitter:description"
        content="Trouvez le job qu'il vous faut sur le site d'emploi Jobs-72. Parcourez des milliers d'offres, publiez votre CV et boostez votre carrière grâce à nos conseils !">
    <meta property="twitter:image" content="https://jobs-72.com/images/entreprises.jpg">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}" />
    <link rel="icon" href="{{ asset('favicon.png') }}" />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- CKEditor -->
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

    <!-- themify icon -->
    <link rel="stylesheet" href="{{ asset('css/plugins/themify-icons/themify-icons.css') }}">

    <!-- Select2 -->
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-SLGJ8YKWG7"></script>

    <!-- Stepper -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">

    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-SLGJ8YKWG7');

    </script>
</head>

<body>
    <div id="app">

        @include('components.cookie')

        <!-- Navbar -->
        @include('components.navbar')

        <!-- Body -->
        <main class="py-4 pt-0">
            @yield('content')
        </main>
        <!-- Body -->

        @include('components.modals')

        <!-- Footer -->
        @include('components.footer')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

</body>

</html>
