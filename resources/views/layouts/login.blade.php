<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'JMC') }}</title>

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/default.css') }}" rel="stylesheet">
</head>
<body class="signin">

    @yield('content')

    <script src="{{ asset('js/jquery-1.11.1.min.js') }}" defer></script>
    <script src="{{ asset('js/jquery-migrate-1.2.1.min.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('js/modernizr.min.js') }}" defer></script>
    <script src="{{ asset('js/pace.min.js') }}" defer></script>
    <script src="{{ asset('js/retina.min.js') }}" defer></script>
    <script src="{{ asset('js/jquery.cookies.js') }}" defer></script>
    <script src="{{ asset('js/custom.js') }}" defer></script>
</body>
</html>
