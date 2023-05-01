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

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        


        <!-- Styles -->
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">  

        
    {{-- <style>
        body  {
          background-image: url("img.jfif");
          background-color: #b8b2b2;
        }
    </style> --}}
    </head>
    <body class="antialiased" >
        <div class="content-fr">
            <div class="container">
                <h1 class="text-center">{{ __('Welcome !') }}</h1>
                
                @if (Route::has('login'))
                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                        @auth
                            <a class="text-center btn Login" href="{{ url('/home') }}" class="btn btn-light">{{ __('Dashboard') }}</a>
                        @else
                            <a class="text-center btn Login" href="{{ url('/clientLogin') }}" class="btn btn-light">{{ __('Log in') }}</a>
                        @endauth
                    </div>
                @endif
            </div>
        </div>
    </body>
</html>
