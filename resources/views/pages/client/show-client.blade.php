@extends('layouts.app')

@section('show-client')
<div class="content">
{{--     @include('layouts.navbar')
 --}}    <div class="conte">
        
        @if(Auth::user()->role_id == 1)
            <div class="main">
				<div class="title-page">
					<div class="row">
						<div class="col">
							<h2>Client</h2>
						</div>
						<div class="col button-right">
							<a href="{{ url('add-client') }}" class="btn btn-primary">Add new client</a>
						</div>
					</div>
				</div>
				
				<div class="card text-center pdm mt-3">
					<div class="row">
						<div class="col">
							<h4> Nom du client</h4>
							  <p>
							  	{{$clients->name}}
							  </p>
						</div>
						
					</div>
				</div>
				<h2 class="text-center mb-4">les projets de ce client</h2>
				<div class="row">
					@foreach($projects as $project)
					   @if($clients->id==$project->client_id)
						<div class="col-6">
							<div class="card text-center pdm">
								<h4>{{$project->name}}</h4>
							</div>
						</div>
						@endif
					@endforeach
				</div>
					
			</div>
        @else
            <h1>no</h1>
        @endif
    </div>

</div>
    


@endsection