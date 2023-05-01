{{-- <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @include('client.navbar')
       <main class="flex">

        @include('client.sidebar')
        <div class="content">


            @if ($page == "home")
                            
                @yield('home-client')

            @elseif($page == "project")

                @yield('project')

            @endif
            

        </div>



    </div>
</body>
</html> --}}

@extends('layouts.app')

@section('home-client')
<div class="content">
    <h1>test</h1>
</div>
@endsection