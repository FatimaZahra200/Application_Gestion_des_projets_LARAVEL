@extends('layouts.app')

@section('users')
<div class="content">
   {{--  @include('layouts.navbar') --}}
    <div class="conte">
        
        @if(Auth::user()->role_id == 1 )
            <div class="main">
				<div class="title-page">
					<div class="row">
						<div class="col">
							<h2>Users</h2>
						</div>
						<div class="col button-right">
							<a href="{{ url('add-user') }}" class="btn btn-primary">Add new user</a>
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
					    <tr>
					      <th scope="col">#</th>
					      <th scope="col">Name</th>
					      <th scope="col">Email</th>
					      <th scope="col">Post</th>
					      <th scope="col">Action</th>
					    </tr>
					  </thead>
					  <tbody>
					  	@foreach($users as $user)
                            <tr>
						      	<th scope="row">{{ $user->id }}</th>
						      	<td>{{ $user->name }}</td>
						      	<td>{{ $user->email }}</td>
						      	<td>
						      		@foreach($roles as $role)
						      			@if($user->role_id == $role->id)
						      				{{ $role->name }}
						      			@endif
						      		@endforeach
						      	</td>
						      	<td>
						      		<a href="{{ url('user-edit/'.$user->id )}}" class="btn btn-primary">Edit</a>
						      		<a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">delet</a>
						      	</td>
						    </tr>

                        @endforeach
					    
					   
					  </tbody>
					</table>


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
					        <a href="{{ url('delete-user/'.$user->id )}}" class="btn btn-danger">Understood</a>
					      </div>
					    </div>
					  </div>
					</div>

				</div>
			</div>
        @else
            <h1>no</h1>
        @endif
    </div>

</div>
    


@endsection






