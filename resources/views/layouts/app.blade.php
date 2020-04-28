<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/script.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
</head>

<body>
    <div id="app">

        @include('layouts.navbar.content')

        <main class="py-4">
            <div class="container-fluid">

                <div class="row justify-content-center">

                    @auth
                        <div class="col-md-3">
                            @yield('sidebar')
                        </div>
                    @endauth

                    <div class="col-md-9">

                        @include('common.success')
                        @include('common.errors')

                        @yield('content')

                    </div>

                </div>
            </div>
        </main>

    </div>
</body>

</html>
