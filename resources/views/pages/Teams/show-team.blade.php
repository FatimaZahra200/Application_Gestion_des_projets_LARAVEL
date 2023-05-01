@extends('layouts.app')

@section('show-team')
<div class="content">
{{--     @include('layouts.navbar')
 --}}    <div class="conte">
        
        @if(Auth::user()->role_id == 1 or Auth::user()->role_id == 2 )
            <div class="main">
				<div class="title-page">
					<div class="row">
						<div class="col">
							<h2>{{$team->name}}</h2>
						</div>
						<div class="col button-right">
							<a href="{{ url('add-team') }}" class="btn btn-primary">Add new team</a>
						</div>
					</div>
				</div>
				
				<div class="card text-center pdm mt-3">
					<div class="row">
						<div class="col">
							<h4>Directeur project</h4>
							<p>
								@foreach($users as $user)
									@if($user->id == $team->directeur_id)
										{{$user->name}}
									@endif
								@endforeach
							</p>
						</div>
					</div>
				</div>
				<h2 class="text-center mb-4">Chefs</h2>
				<div class="row">
							@foreach($users as $user)
							<div class="col-6">

								<div class="card text-center pdm">
									@if($user->id == $project->chef_conception_id)
									      <h4>{{$user->name}}</h4>
									@elseif($user->id == $project->chef_des_id)
									      <h4>{{$user->name}}</h4>
									
									@elseif($user->id == $project->chef_dev_id)
											<h4>{{$user->name}}</h4>
									
									@elseif($user->id == $project->chef_test_id)
											<h4>{{$user->name}}</h4>
									@endif
							 	</div>
							</div> 	
							
							@endforeach

				</div>
					
			</div>
        @else
            <h1>no</h1>
        @endif
    </div>

</div>
    


@endsection






