{{-- @extends('layouts.app')

@section('content')
<div class="loginMembers">
    <div class="container">
        <div class="row justify-content-center">
            <div class="custom-width-form">
                <div class="form-login"></br>
                    <h4>Client Login</h4>
                    <form method="post" action="{{ route('client.login') }}">
                      @csrf
                        
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form3Example3">Email address</label>
                            <input type="email" id="form3Example3" name="email"  class="form-control form-control-lg"
                                 placeholder="Enter a valid email address" />
                        </div>

                      
                        <div class="form-outline mb-3">
                           <label class="form-label" for="form3Example4">Password</label>
                           <input type="password" id="form3Example4"  name="password"  class="form-control form-control-lg"
                           placeholder="Enter password" />
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            Checkbox 
                            <div class="form-check mb-0">
                                 <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                                 <label class="form-check-label" for="form2Example3"> Remember me </label>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
@extends('layouts.app')

@section('content')

<!-- Page Content -->
<div class="loginMembers" style="background-image: url('img/login.jpg'); background-repeat: no-repeat;background-size: cover;">
    <div class="container" > 
        <div class="row justify-content-center">
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
                    <h4>Client Login</h4>
                    <form method="post" action="{{ route('client.login') }}">
                      @csrf
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form3Example3">Email address</label>
                            <input type="email" id="form3Example3" name="email"  class="form-control form-control-lg"
                                 placeholder="Enter a valid email address" />
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-3">
                           <label class="form-label" for="form3Example4">Password</label>
                           <input type="password" id="form3Example4"  name="password"  class="form-control form-control-lg"
                           placeholder="Enter password" />
                        </div>

                         {{-- <div class="d-flex justify-content-between align-items-center">  --}}
                            <!-- Checkbox -->
                            <div class="form-check mb-0">
                                 <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                                 <label class="form-check-label" for="form2Example3"> Remember me </label>
                            </div> 
                        </div> 
                                 <input type="submit" value="Login" name="submit" id="submit"/>
                        </div> 
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection