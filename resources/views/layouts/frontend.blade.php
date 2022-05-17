<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel CRUD</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{URL::asset('frontend/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{URL::asset('frontend/css/custom.css') }}">


     
    </head>
    <body class="antialiased">
        <div>
            @include('layouts.inc.navbar')
            @yield('content')

        </div>

        <script src="{{URL::asset('frontend/js/jquery-3.6.0.min.js')}}"></script>
        <script src="{{URL::asset('frontend/js/bootstrap.bundle.min.js')}}"></script>
    </body>
</html>
