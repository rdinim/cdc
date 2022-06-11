<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Poltekbang Surabaya Career Development Center</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
    <div id="app">
        {{-- memanggil navigasi --}}
        @include('partials.-admin-header')

         {{-- memanggil sidebar --}}
         @include('partials.-admin-sidebar')

        {{-- memanggil isi halaman --}}
        <main>
            @yield('content')
        </main>

        {{-- memanggil footer --}}
        @include('partials.admin-footer')
    </div>

    <script>
        var menu;
        document.getElementById('menu-btn').addEventListener('click', function(e){
            if( menu == undefined ) {
                menu = document.getElementById('menu');
            }
            menu.classList.toggle("hidden");
        });
    </script>

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</body>
</html>
