<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
    <title>@yield('title', 'Mi cuenta | Oferta Complementaria')</title>
    <link rel="icon" href="{{ asset('assets/logoSena.png') }}">
    <meta property="og:title" content="@yield('og_title', 'Mi cuenta | Oferta Complementaria')">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/general.css') }}">
    <link rel="stylesheet" href="{{ asset('css/grupos.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="http://cdn.tutorialzine.com/misc/enhance/v2.js" async></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/general.js') }}"></script>
    @yield('extra_styles')
</head>
<body>
    @include('partials.header')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')
    
    @yield('extra_scripts')
</body>
</html>