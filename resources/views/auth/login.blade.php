@extends('layouts.app')

@section('content')

<!-- Page Content -->
<div class="loginMembers" style="background-image: url('img/clogin.webp') ; background-repeat: no-repeat;background-size: cover;">
    <div class="container">
            <div class="custom-width-form">
                
            <div class="form-login"></br>
                 @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                    <h4>Membre Login</h4>
                    <form method="post" action="{{ route ('login') }}" >
                        @csrf
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <label for="email" class="form-label">{{ __('Email Address') }}</label>

                            <input id="email" type="email"  class="form-control form-control-lg"  @error('email') is-invalid @enderror name="email" value="{{ old('email') }}" placeholder="Enter a valid email address"required autocomplete="email" autofocus>

                            @error('email')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                             
                        </div>

                        <div class="form-outline mb-4">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password"  placeholder="Enter password" required autocomplete="current-password">

                                     @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                         </span>
                                     @enderror
                        </div>

                        {{-- <div class="d-flex justify-content-between align-items-center"> --}}
                            <div class="form-check mb-0">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                            
                        </div> 
                        <div class="form-outline mb-4" >
                        <input type="submit" value="Login" name="submit" id="submit"/>
                       </div>
                        </div>
                            
                        {{-- </div> --}}

                        {{-- <div class="row mb-0">
                            <div class="text-center text-lg-start mt-4 pt-2">
                                <button type="submit" class="btn btn-primary"> {{ __('Login') }}
                                </button>
                            </div>
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div> --}}
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection