@extends('layouts.app')

@section('groups')
<div class="content">
    {{-- @include('layouts.navbar') --}}
    <div class="conte">
        
        @if(Auth::user()->role_id == 1 or Auth::user()->role_id == 3 or Auth::user()->role_id == 4 or Auth::user()->role_id == 5 or Auth::user()->role_id == 6 )
            <div class="main">
				<div class="title-page">
					<div class="row">
						<div class="col">
							<h2>Groups</h2>
						</div>
						@if( Auth::user()->role_id == 3 or Auth::user()->role_id == 4 or Auth::user()->role_id == 5 or Auth::user()->role_id == 6 )
						<div class="col button-right">
							<a href="{{ url('add-group') }}" class="btn btn-primary">Add new group</a>
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
						    <tr class="text-center">
						      	<th scope="col">#</th>
						      	<th scope="col">Name</th>
						      	<th scope="col">Chef project</th>
						      	<th scope="col">Type group</th>
						      	<th scope="col">Action</th>
						    </tr>
						  </thead>
						  <tbody>
						  		@forelse ($groups as $group)
		
		                            <tr class="text-center">
								      	<th scope="row">{{ $group->id }}</th>
								      	<td>{{ $group->name }}</td>
								      	<td>
								      		@foreach($users as $user)
								      			@if($user->id == $group->chef_project_id)
								      				{{$user->name}}
		                                    	@endif
								      		@endforeach
								      	</td>
								      	<td>
								      		@foreach($typeGroups as $typeGroup)
								      			@if($group->type_group == $typeGroup->id) 
								      				{{$typeGroup->name}}
		                                    	@endif
								      		@endforeach
								      	</td>
								      	<td>
											@if(Auth::user()->role_id == 3  or Auth::user()->role_id == 4 or Auth::user()->role_id == 5 or Auth::user()->role_id == 6) 
								      		     <a href="{{ url('group-edit/'.$group->id )}}" class="btn btn-primary">Edit</a>
								      		     <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">delet</a>
												 <a href="{{ url('group-show/'.$group->id )}}" class="btn btn-info" >Show</a>
											   @elseif(Auth::user()->role_id == 1)
								      		     <a href="{{ url('group-show/'.$group->id )}}" class="btn btn-info" type="hidden">Show</a>
											@endif
								      	</td>

								      	<!-- Modal -->
										<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
										  <div class="modal-dialog">
										    <div class="modal-content">
										      <div class="modal-header">
										        <h5 class="modal-title" id="staticBackdropLabel">Warning</h5>
										        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										      </div>
										      <div class="modal-body">
										        <p>Are you sure you want to delete this user ??</p>
										      </div>
										      <div class="modal-footer">
										        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
										        <a href="{{ url('delete-group/'.$group->id )}}" class="btn btn-danger">Understood</a>
										      </div>
										    </div>
										  </div>
										</div>
								    </tr>
	                        	@empty
	                        		<tr>
	                        			<td colspan="4" class="table-active text-center">
							  					there is no group !
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






