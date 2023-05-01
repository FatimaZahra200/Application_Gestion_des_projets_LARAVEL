@extends('layouts.app')

@section('add-group')
    <div class="content">
        {{-- @include('layouts.navbar') --}} 
        <div class="main" >
            <div class="title-page"> 
                <div class="row">
                    <div class="col">
                        <h2>{{ __('Add new group') }}</h2>
                    </div>
                </div>
            </div>
            <div class="box-white" style="bg: transparent;">
                <form method="POST" action="{{ url('add-new-group') }}">
                    @csrf
                   
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="type_group" class="col-md-4 col-form-label text-md-end">{{ __('Type group') }}</label>

                        <div class="col-md-6">
                            <select name="type_group" class="form-select @error('type_group') is-invalid @enderror" >
                                <option>Select</option>
                                @foreach($typeGroups as $typeGroup)
                                    
                                        <option value="{{ $typeGroup->id }}">{{ $typeGroup->name }}</option>
                                     
                                @endforeach
                            </select>

                            @error('chef-project')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        @if(Auth::user()->role_id == 1)
                        <label for="chef-project" class="col-md-4 col-form-label text-md-end">{{ __('Chef project') }}</label>

                        <div class="col-md-6">
                            <select name="chef_project_id" class="form-select @error('membres') is-invalid @enderror" >
                                <option>Select</option>
                                @foreach($users as $user)
                                    @if($user->role_id == "3" or $user->role_id == "4" or $user->role_id == "5" or $user->role_id == "6")
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endif
                                @endforeach
                            </select>

                            @error('chef-project')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        @elseif(Auth::user()->role_id == 3  or Auth::user()->role_id == 4 or Auth::user()->role_id == 5 or Auth::user()->role_id == 6)
                        <input type="hidden" name="chef_project_id" value="{{Auth::user()->id}}">
                    @endif
                    </div>

                    <div class="row mb-3">
                        <label for="membres" class="col-md-4 col-form-label text-md-end">{{ __('Members of group') }}</label>

                        <div class="col-md-6">
                            <select name="membre_id[]" class="form-select @error('membre_id') is-invalid @enderror" multiple data-mdb-placeholder="Example placeholder" multiple>
                                @if(Auth::user()->role_id == "3")
                                    @foreach($users as $user)
                                        @if($user->role_id == "7") 
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endif
                                    @endforeach     
                                @elseif(Auth::user()->role_id == "4")
                                    @foreach($users as $user)
                                        @if($user->role_id == "8") 
                                             <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endif     
                                    @endforeach 
                                @elseif(Auth::user()->role_id == "5")
                                    @foreach($users as $user)
                                        @if($user->role_id == "9") 
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endif    
                                    @endforeach 
                                @elseif(Auth::user()->role_id == "6")
                                    @foreach($users as $user)
                                        @if($user->role_id == "10") 
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endif    
                                    @endforeach 
                                @endif                           
                            </select>

                            @error('membres')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>

                    <div class="row mb-0">
                        @if(Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('success') }}
                            </div>
                        @elseif(Session::has('failed'))
                            <div class="alert alert-danger" role="alert">
                                {{ Session::get('failed') }}
                            </div>
                        @endif
                    </div>
                </form>
            </div>
                        
        </div>
    </div>
@endsection
