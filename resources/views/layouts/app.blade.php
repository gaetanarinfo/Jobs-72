<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Jobs-72 - @yield('title') - Trouvez le job qu'il vous faut</title>
    <meta name="Description" content="Trouvez le job qu'il vous faut sur le site d'emploi Monster. Parcourez des milliers d'offres, publiez votre CV et boostez votre carrière grâce à nos conseils !">
    <meta name="affiliate" content="jobs" />

    <!-- Primary Meta Tags -->
    <meta name="title" content="Jobs-72 - @yield('title') - Trouvez le job qu'il vous faut">
    <meta name="description"
        content="Trouvez le job qu'il vous faut sur le site d'emploi Monster. Parcourez des milliers d'offres, publiez votre CV et boostez votre carrière grâce à nos conseils !">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://jobs-72.com">
    <meta property="og:title" content="Jobs-72 - @yield('title') - Trouvez le job qu'il vous faut">
    <meta property="og:description"
        content="Trouvez le job qu'il vous faut sur le site d'emploi Monster. Parcourez des milliers d'offres, publiez votre CV et boostez votre carrière grâce à nos conseils !">
    <meta property="og:image"
        content="https://jobs-72.com/images/entreprises.jpg">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://jobs-72.com/">
    <meta property="twitter:title" content="Jobs-72 - @yield('title') - Trouvez le job qu'il vous faut">
    <meta property="twitter:description"
        content="Trouvez le job qu'il vous faut sur le site d'emploi Monster. Parcourez des milliers d'offres, publiez votre CV et boostez votre carrière grâce à nos conseils !">
    <meta property="twitter:image"
        content="https://jobs-72.com/images/entreprises.jpg">

    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}" />
    <link rel="icon" href="{{ asset('favicon.png') }}" />

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script id="mcjs">
        ! function(c, h, i, m, p) {
            m = c.createElement(h), p = c.getElementsByTagName(h)[0], m.async = 1, m.src = i, p.parentNode.insertBefore(
                m, p)
        }(document, "script",
            "https://chimpstatic.com/mcjs-connected/js/users/323b76c27f8fc884498a39970/33773a9dcc8a7f2014d93886b.js");

    </script>
</head>

<body>
    <div id="app">

        <!-- Navbar -->
        @include('components.navbar')

        <!-- Body -->
        <main class="py-4 pt-0">
            @yield('content')
        </main>
        <!-- Body -->

        <!-- Footer -->
        @include('components.footer')
    </div>
</body>

</html>
