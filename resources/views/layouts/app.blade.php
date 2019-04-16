<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Balagbag') }}</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<style type="text/css">
    body{
    font-family: "Roboto", "Arial", "Helvetica Neue", sans-serif;
    overflow-x: hidden;
    /*background-color: #CD5C5C;*/
    background-color: #111111;
    }
    h1, p{
        color: #ffffff;
    }
</style>
<body>
    <div id="app">   
        <main class="py-2">
            @yield('content')
        </main>
    </div>
    <script type="text/javascript" src="{{ asset('/js/app.js')}}"></script>
     <script type="text/javascript">
        AOS.init({
            offset: 200,
            duration: 2000
        });
     </script>    
</body>
</html>
