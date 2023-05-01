@extends('layouts.app')

@section('project')
<div class="content">
{{--     @include('layouts.navbar')
 --}}    <div class="conte">
        @if(Auth::user()->role_id == 1 or  Auth::user()->role_id == 2)
            <div class="main">
				<div class="title-page">
					<div class="row">
						<div class="col">
							<h2>Projects</h2>
						</div>
						 @if(Auth::user()->role_id == 1)
						<div class="col button-right">
							<a href="{{ url('add-project') }}" class="btn btn-primary">Add new project</a>
						</div>
						@endif
					</div>
				</div>
				<div class="table-light">
					@if(Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @elseif(Session::has('failed'))
                        <div class="alert alert-danger" role="alert">
                            {{ Session::get('failed') }}
                        </div>
                    @endif
					<table class="table table-hover">
					  <thead>
					    <tr>
					      <th scope="col">#</th>
					      <th scope="col">Name</th>
					      <th scope="col">Client</th>
					      <th scope="col">Directeur</th>
					      <th scope="col">date debut</th>
					      <th scope="col">date fin</th>
 						  <th scope="col">statut</th>
					      <th scope="col">statut de payement</th>
					      <th scope="col">Action</th>
					    </tr>
					  </thead>
					  <tbody>
					  	@forelse ($projects as $project)
                            <tr>
                            	<th scope="row">{{ $project->id }}</th>
						      	<td >{{ $project->name }}</td>
						      	<td>
						      		@foreach($clients as $client)
						      			@if($project->client_id == $client->id)
						      				{{ $client->name }}
						      			@endif
						      		@endforeach	
						      	</td>
						      	<td>
						      		@foreach($users as $user)
						      			@if($project->directeur_id == $user->id)
						      				{{ $user->name }}
						      			@endif
						      		@endforeach
						      	</td>
						      	<td>{{ $project->date_debut }}</td>
						      	<td>{{ $project->date_fin }}</td>
						      	<td>{{ $project->statut}}</td>

						      	<td>
						      		@if($project->statut_payement == "1")
						      			payée
						      		@elseif($project->statut_payement == "2")
						      			non payée
						      		@else
						      			demi-payee
						      		@endif
						      	</td>
						      	<td>
						      		<a href="{{ url('project-edit/'.$project->id )}}" class="btn btn-primary">Edit</a>
						      		<a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">delet</a>
						      		<a href="{{ url('project-show/'.$project->id )}}" class="btn btn-info">Show</a>
						      	</td>
						      	<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
										    <div class="modal-header">
										      <h5 class="modal-title" id="staticBackdropLabel">Warning</h5>
										      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										    </div>
										    <div class="modal-body">
										      <p>Are you sure you want to delete this project ??</p>
										    </div>
										    <div class="modal-footer">
										      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
										      <a href="{{ url('delete-project/'.$project->id )}}" class="btn btn-danger">Understood</a>
										    </div>
										</div>
								    </div>
								</div>
						    </tr>
					    @empty
					        <tr>
	                            <td colspan="4" class="table-active text-center">
							  					there is no project !
								</td>
							</tr>
						@endforelse
					  </tbody>
					</table>
				</div>
			</div>
        @else
            <h1>no</h1>
        @endif
    </div>

</div>
    


@endsection






