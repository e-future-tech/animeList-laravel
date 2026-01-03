<!doctype html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/x-icon" href="{{ asset('images/logo/01.webp') }}">

    <title>@yield('title')</title>
    @livewireStyles

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="d-flex flex-column min-vh-100">
    @include('layouts.nav')

    <main class="my-5">
        @yield('content')

        @livewireScripts
    </main>

    <footer class="py-5 bg-dark text-light text-center mt-auto">
        <p>
            This site was created in 2025, by Mr. E.
        </p>
    </footer>
</body>

</html>