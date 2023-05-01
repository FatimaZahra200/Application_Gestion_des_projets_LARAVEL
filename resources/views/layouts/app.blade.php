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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
       

        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 sm:block">
                @auth

                    @if($page !== "home-client")
                    
                        @include('layouts.navbar')

                        <main class="flex">
                        
                            @include('layouts.sidebar')

                        @else
                             
                        <main>


                    @endif

                    
                        @if ($page == "register")
                            
                                @yield('register')

                        @elseif($page == "users")

                            @yield('users')

                        @elseif($page == "edit-user")

                            @yield('edit-user')

                        @elseif($page == "groups")

                            @yield('groups')

                        @elseif($page == "add-group")

                            @yield('add-group')

                        @elseif($page == "show-group")

                            @yield('show-group')

                        @elseif($page == "edit-group")

                            @yield('edit-group')

                        @elseif($page == "teams")

                            @yield('teams')

                        @elseif($page == "add-team")

                            @yield('add-team')

                        @elseif($page == "show-team")

                            @yield('show-team')

                        @elseif($page == "edit-team")
                            @yield('edit-team')

                            
                        @elseif($page == "clients")
                            @yield('clients')
                            

                          @elseif($page == "add-client")

                            @yield('add-client')

                        @elseif($page == "show-client")

                            @yield('show-client')

                        @elseif($page == "edit-client")

                            @yield('edit-client')

                        @elseif($page == "project")

                            @yield('project')
                            

                        @elseif($page == "add-project")

                            @yield('add-project')

                        @elseif($page == "show-project")

                            @yield('show-project')

                        @elseif($page == "edit-project")

                            @yield('edit-project')

                        @elseif($page == "home")

                            @yield('home')


                        @elseif($page == "home-client")

                            @yield('home-client')

                        @elseif($page == "project")

                            @yield('project')

                        @else

                            @yield('home')

                        @endif

                    </main>
                @else
                    <main class="">
                        @yield('content')
                    </main>
                @endauth
            </div>
        @endif

        
    </div>
</body>
</html>