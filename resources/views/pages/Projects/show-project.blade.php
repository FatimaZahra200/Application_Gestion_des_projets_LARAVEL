@extends('layouts.app')

@section('show-project')
<div class="content">
{{--     @include('layouts.navbar')
 --}}    <div class="conte">
        
        @if(Auth::user()->role_id == 1 or Auth::user()->role_id == 2 or Auth::user()->role_id == 4 or Auth::user()->role_id == 5 or Auth::user()->role_id == 6)
            <div class="main">
				<div class="title-page">
					<div class="row">
						<div class="col">
							<h2>{{$project->name}}</h2>
						</div>
						<div class="col button-right">
							<a href="{{ url('add-project-group') }}" class="btn btn-primary">Add new project</a>
						</div>
					</div>
				</div>
				
				<div class="card text-center pdm mt-3">
					<div class="row">
						<div class="col">
							<h4>Client</h4>
							<p>
								@foreach($clients as $client)
								    @if($client->id == $project->client_id)

										{{$client->name}}
									@endif	
								@endforeach
							</p>
						</div>
						<div class="col">
							<h4>Directeur de projet</h4>
							@foreach($users as $user)
								@if($user->id == $project->directeur_id)
									{{$user->name}}
								@endif
							@endforeach
						</div>
					</div>
				</div>
				<h2 class="text-center mb-4">chefs</h2>
				<div class="row">
					@foreach($users as $user)
						<div class="col-6">
							<div class="card text-center pdm">
								{{-- <h4>{{$group->name}}</h4> --}}
							@if($user->id == $project->chef_conception_id)
									{{$user->name}}
							@endif
							@if($user->id == $project->chef_des_id)
									{{$user->name}}
							@endif
							@if($user->id == $project->chef_dev_id)
									{{$user->name}}
							@endif
							@if($user->id == $project->chef_test_id)
									{{$user->name}}
							@endif
							</div>
							
						</div>
					@endforeach
				</div>
					
			</div>
       <!--  @else
            <h1>no</h1> -->
        @endif
    </div>

</div>
    


@endsection






