

    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
       
        
        <div class="container">
             <h3>FIS CODERS</h3>
         </div>
         <div class="container">

            {{-- <div>
                <i  id="menu-btn" class="fas fa-bars"></i>
            </div> --}}
           @if(Auth::user()->role_id == 1 )
           <a class="navbar-brand" href="{{ url('/') }}">
               {{--  {{ config('app.name', 'Laravel') }} --}}
               Administrateur Dashboard
            </a>
            @elseif(Auth::user()->role_id == 2)
           <a class="navbar-brand" href="{{ url('/') }}">
               {{--  {{ config('app.name', 'Laravel') }} --}}
               Directeur Dashboard
            </a>
            @else(Auth::user()->role_id == 3 or Auth::user()->role_id == 4 or Auth::user()->role_id == 5  or Auth::user()->role_id == 6 )
           <a class="navbar-brand" href="{{ url('/') }}">
               {{--  {{ config('app.name', 'Laravel') }} --}}
               Chef of project Dashboard
            </a>
            @endif
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif
 
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li> 
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fa fa-user-o" aria-hidden="true" widh></i> {{ Auth::user()->name }}
                            </a>
                           
                            
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a href="{{ url('user-edit/'.Auth::user()->id )}}" class="dropdown-item">Edit profil</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
