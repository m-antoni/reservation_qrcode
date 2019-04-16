<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Balagbag Traverse</title>
        <!-- Compiled CSS with dependencies -->
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">
        <!-- Frameworks and Libraries -->
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/bttn.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/iziModal.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/jquery.fancybox.min.css') }}">
        <!-- MY CUSTOM STYLE -->
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/homepage.css') }}">
    </head>
<body class="is-preload">
    @include('partials.navbar')

    @yield('content')

	<script type="text/javascript" src="{{asset('/js/app.js')}}"></script>
	<script type="text/javascript" src="{{asset('/js/iziModal.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('/js/navbar-fixed.js')}}"></script>
	<script type="text/javascript" src="{{asset('/js/jquery.fancybox.min.js')}}"></script>
    {{-- download template --}}
    <script type="text/javascript" src="{{asset('/js/browser.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/breakpoints.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/util.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/main.js')}}"></script>
    </body>
</html>