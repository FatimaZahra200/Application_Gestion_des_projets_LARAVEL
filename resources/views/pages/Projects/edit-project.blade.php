@extends('layouts.app')

@section('edit-project')
    <div class="content">
         <div class="main">
            <div class="title-page">
                <div class="row">
                    <div class="col">
                        <h2>{{ __('Edit project') }}</h2>
                    </div>
                </div>
            </div>
            <div class="box-white">
                <form method="POST" action="{{ url('update-project') }}">
                    @csrf
                    <input type="hidden" name="id" value="{{ $project->id }}">

                    @if(Auth::user()->role_id == 1 or Auth::user()->role_id == 2)


                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $project->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="client" class="col-md-4 col-form-label text-md-end">{{ __('client') }}</label>

                            <div class="col-md-6">
                                <select name="client_id" class="form-select @error('client') is-invalid @enderror" >
                                    <option value='0'>Select</option>
                                    @foreach($clients as $client)
                                        <option value="{{ $client->id }}" {{$project->client_id == $client->id ? 'selected' : ''}}>{{ $client->name }}</option>
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
                            <label for="directeur-project" class="col-md-4 col-form-label text-md-end">{{ __('Directeur project') }}</label>

                            <div class="col-md-6">
                                <select name="directeur_id" class="form-select @error('user') is-invalid @enderror" >
                                    <option>Select</option>
                                    @foreach($users as $user)
                                        @if($user->role_id == "2")
                                            <option value="{{ $user->id }}" {{$project->directeur_id == $user->id ? 'selected' : ''}}>{{ $user->name }}</option>
                                        @endif
                                    @endforeach
                                </select>

                                @error('directeur-project')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea id="description" type="text" class="form-control " name="description"></textarea> 
                            </div>
                        </div>
                             
                        <div class="row mb-3">
                            <label for="date_debut" class="col-md-4 col-form-label text-md-end">{{ __('Date debut') }}</label>

                            <div class="col-md-6">
                                <input id="date_début" type="date" class="form-control " name="date_début">
                            </div>
                        </div> 
                        <div class="row mb-3">
                            <label for="date_fin" class="col-md-4 col-form-label text-md-end">{{ __('Date fin') }}</label>

                            <div class="col-md-6">
                                <input id="date_fin" type="date" class="form-control " name="date_fin">
                            </div>
                        </div> 
                        <div class="row mb-3">
                            <label for="statut" class="col-md-4 col-form-label text-md-end">{{ __('Statut') }}</label>

                            <div class="col-md-6">
                                <select name="statut" class="form-select" >
                                    <option value="0">select</option>
                                    <option value="1" {{ $project->statut == 1 ? 'selected' : ''}}>Under review</option>
                                    <option value="2" {{ $project->statut == 2 ? 'selected' : ''}}>In progress</option>
                                    <option value="3" {{ $project->statut == 3 ? 'selected' : ''}}>On test</option>
                                    <option value="4" {{ $project->statut == 4 ? 'selected' : ''}}>Completed</option>
                                    <option value="5" {{ $project->statut == 5 ? 'selected' : ''}}>Canceled</option>

                                </select>  
                            </div>
                        </div>
                         {{-- @elseif(Auth::user()->role_id == 2 or Auth::user()->role_id == 1) --}}
                        <div class="row mb-3">
                            <label for="chef" class="col-md-4 col-form-label text-md-end">{{ __('Chef of conception') }}</label>

                            <div class="col-md-6">
                                <select name="chef_conception_id" class="form-select @error('user') is-invalid @enderror" >
                                    <option>Select</option>
                                    @foreach($users as $user)
                                        @if($user->role_id == "3")
                                            <option value="{{ $user->id }}" {{$project->chef_conception_id == $user->id ? 'selected' : ''}}>{{ $user->name }}</option>
                                        @endif
                                    @endforeach
                                </select>

                                @error('chef_conception_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                             </div>
                         </div>    
                       

    
                            
                       
                        <div class="row mb-3">
                            <label for="chef_des_id" class="col-md-4 col-form-label text-md-end">{{ __('Chef of design') }}</label>

                            <div class="col-md-6">
                                <select name="chef_des_id" class="form-select @error('user') is-invalid @enderror" >
                                    <option>Select</option>
                                    @foreach($users as $user)
                                        @if($user->role_id == "4")
                                            <option value="{{ $user->id }}" {{$project->chef_des_id == $user->id ? 'selected' : ''}}>{{ $user->name }}</option>
                                        @endif
                                    @endforeach
                                </select>

                                @error('chef_des_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                       
                        </div>
                        <div class="row mb-3">
                            <label for="chef_dev_id" class="col-md-4 col-form-label text-md-end">{{ __('Chef of developpement') }}</label>

                            <div class="col-md-6">
                                <select name="chef_dev_id" class="form-select @error('user') is-invalid @enderror" >
                                    <option>Select</option>
                                    @foreach($users as $user)
                                        @if($user->role_id == "5")
                                            <option value="{{ $user->id }}" {{$project->chef_dev_id== $user->id ? 'selected' : ''}}>{{ $user->name }}</option>
                                        @endif
                                    @endforeach
                                </select>

                                @error('chef_dev_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                       
                        </div>
                        <div class="row mb-3">
                            <label for="chef_test_id" class="col-md-4 col-form-label text-md-end">{{ __('Chef of test') }}</label>

                            <div class="col-md-6">
                                <select name="chef_test_id" class="form-select @error('user') is-invalid @enderror" >
                                    <option>Select</option>
                                    @foreach($users as $user)
                                        @if($user->role_id == "6")
                                            <option value="{{ $user->id }}" {{$project->chef_test_id== $user->id ? 'selected' : ''}}>{{ $user->name }}</option>
                                        @endif
                                    @endforeach
                                </select>

                                @error('chef_test_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        </div>
                    
                    
                   
                       
                    

                        {{-- <div class="row mb-3">
                            <label for="groups" class="col-md-4 col-form-label text-md-end">{{ __('Groups of conception') }}</label>

                                <div class="col-md-6">
                                    <select name="groupe_id[]" class="form-select @error('groupe_id') is-invalid @enderror" >
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
                        </div> --}}
                    @endif

                    

                    
                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                </div> 
                    <div class="row mt-4">
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