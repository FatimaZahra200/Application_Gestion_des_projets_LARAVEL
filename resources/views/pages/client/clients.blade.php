@extends('layouts.app')

@section('clients')
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
							<a href="{{ url('add-client ') }}" class="btn btn-primary">Add new client</a>
						</div>
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
						    <tr class="text-center">
						      	<th scope="col">#</th>
						      	<th scope="col">Name</th>
						      	<th scope="col">Action</th>
						    </tr>
						  </thead>
						  <tbody>
						  		@forelse ($clients as $client)
		
		                            <tr class="text-center">
								      	<th scope="row">{{ $client->id }}</th>
								      	<td>{{ $client->name }}</td>
								      	
								      	<td>
								      		<a href="{{ url('client-edit/'.$client->id )}}" class="btn btn-primary">Edit</a>
								      		<a href="{{ url('delete-client/'.$client->id )}}" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="{{$client->id}}">delet</a>

								      		<!-- Modal -->
										<div class="modal fade" id="{{$client->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
										  <div class="modal-dialog">
										    <div class="modal-content">
										      <div class="modal-header">
										        <h5 class="modal-title" id="{{$client->id}}">Warning</h5>
										        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										      </div>
										      <div class="modal-body">
										        <p>Are you sure you want to delete this client ??</p>
										      </div>
										      <div class="modal-footer">
										        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
										        <a href="{{ url('delete-client/'.$client->id )}}" class="btn btn-danger">Understood</a>
										      </div>
										    </div>
										  </div>
										</div>

								      		{{-- <a href="{{ url('client-show/'.$client->id )}}" class="btn btn-info">Show</a> --}}
								      	</td>

								      	
								    </tr>
	                        	@empty
	                        		<tr>
	                        			<td colspan="4" class="table-active text-center">
							  					there is no client !
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






