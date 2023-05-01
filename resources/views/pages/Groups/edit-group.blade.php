@extends('layouts.app')

@section('edit-group')
    <div class="content"> 
       {{--  @include('layouts.navbar') --}}  
        <div class="main"> 
            <div class="title-page">
                <div class="row">
                    <div class="col">
                        <h2>{{ __('Edit group') }}</h2>
                    </div>
                </div> 
            </div>
            <div class="box-white">
                <form method="POST" action="{{ url('update-group') }}">
                    @csrf 

                    <input type="hidden" name="id" value="{{ $group->id }}">
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $group->name }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="chef-project" class="col-md-4 col-form-label text-md-end">{{ __('Type group') }}</label>

                        <div class="col-md-6">
                            <select name="type_group" class="form-select @error('type_group') is-invalid @enderror" >
                                <option>Select</option>
                                @foreach($typeGroups as $typeGroup)
                                    <option value="{{ $typeGroup->id }}" {{$group->type_group == $typeGroup->id ? 'selected' : ''}}>{{ $typeGroup->name }}</option>
                                    
                                @endforeach
                            </select>

                            @error('type_group')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="membres" class="col-md-4 col-form-label text-md-end">{{ __('Members of group') }}</label>

                        <div class="col-md-6">
                            <select name="membre_id[]" class="form-select @error('membre_id') is-invalid @enderror" multiple data-mdb-placeholder="Example placeholder" multiple>
                                @if(Auth::user()->role_id == "3")
                                    @foreach($users as $user)
                                        @if($user->role_id == "7") 
                                            <option value="{{ $user->id }}" {{$group->chef_project_id == $user->id ? 'selected' : ''}}>{{ $user->name }}</option>
                                        @endif
                                    @endforeach     
                                @elseif(Auth::user()->role_id == "4")
                                    @foreach($users as $user)
                                        @if($user->role_id == "8") 
                                             <option value="{{ $user->id }}" {{$group->chef_project_id == $user->id ? 'selected' : ''}}>{{ $user->name }}</option>
                                        @endif     
                                    @endforeach 
                                @elseif(Auth::user()->role_id == "5")
                                    @foreach($users as $user)
                                        @if($user->role_id == "9") 
                                            <option value="{{ $user->id }}" {{$group->chef_project_id == $user->id ? 'selected' : ''}}>{{ $user->name }}</option>
                                        @endif    
                                    @endforeach 
                                @elseif(Auth::user()->role_id == "6")
                                    @foreach($users as $user)
                                        @if($user->role_id == "10") 
                                            <option value="{{ $user->id }}" {{$group->chef_project_id == $user->id ? 'selected' : ''}}>{{ $user->name }}</option>
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
