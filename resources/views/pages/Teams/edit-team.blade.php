@extends('layouts.app')

@section('edit-team')
    <div class="content">
{{--         @include('layouts.navbar')
 --}}        <div class="main">
            <div class="title-page">
                <div class="row">
                    <div class="col">
                        <h2>{{ __('Edit team') }}</h2>
                    </div>
                </div>
            </div>
            <div class="box-white">
                <form method="POST" action="{{ url('update-team') }}">
                    @csrf
                    <input type="hidden" name="id" value="{{ $team->id }}">
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $team->name }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    
                     
                    <div class="row mb-3"> 
                        @if(Auth::user()->role_id == 1)
                    
                            <label for="directeur-project" class="col-md-4 col-form-label text-md-end">{{ __('Directeur  project') }}</label>
                            <div class="col-md-6">
                                <select name="directeur_id" class="form-select @error('groups') is-invalid @enderror" >
                                    <option>Select</option>
                                    @foreach($users as $user)
                                        @if($user->role_id == "2")
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                    
                                @error('directeur-project')
                                    <span classgroups="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        @elseif(Auth::user()->role_id == 2)
                            <input type="hidden" name="directeur_id" value="{{Auth::user()->id}}">
                        @endif
                    </div>
                    

                    <div class="row mb-3">
                        <label for="groups" class="col-md-4 col-form-label text-md-end">{{ __('Groups of conception') }}</label>

                        <div class="col-md-6">
                            <select name="groupe_id[]" class="form-select @error('groupe_id') is-invalid @enderror" >
                                <option value="0" >Select</option>
                                @foreach($groups as $group)
                                    @if($group->type_group == "1" )
                                         <option value="{{ $group->id }}">{{ $group->name }}</option>
                                    @endif
                                @endforeach
                            </select>

                            @error('groups')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="groups" class="col-md-4 col-form-label text-md-end">{{ __('Groups of design') }}</label>

                        <div class="col-md-6">
                            <select name="groupe_id[]" class="form-select @error('groupe_id') is-invalid @enderror" >
                                <option value="0" >Select</option>
                                @foreach($groups as $group)
                                    @if($group->type_group == "2" )
                                         <option value="{{ $group->id }}">{{ $group->name }}</option>
                                    @endif
                                @endforeach
                            </select>

                            @error('groups')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="groups" class="col-md-4 col-form-label text-md-end">{{ __('Groups of developpement') }}</label>

                        <div class="col-md-6">
                            <select name="groupe_id[]" class="form-select @error('groupe_id') is-invalid @enderror" >
                                <option value="0" >Select</option>
                                @foreach($groups as $group)
                                    @if($group->type_group == "3" )
                                         <option value="{{ $group->id }}">{{ $group->name }}</option>
                                     @endif
                                @endforeach
                            </select>

                            @error('groups')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="groups" class="col-md-4 col-form-label text-md-end">{{ __('Groups of test') }}</label>

                        <div class="col-md-6">
                            <select name="groupe_id[]" class="form-select @error('groupe_id') is-invalid @enderror" >
                                <option value="0" >Select</option>
                                @foreach($groups as $group)
                                    @if($group->type_group == "4" )
                                         <option value="{{ $group->id }}">{{ $group->name }}</option>
                                    @endif
                                @endforeach
                            </select>

                            @error('groups')
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
