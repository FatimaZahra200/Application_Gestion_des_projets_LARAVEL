<div class="main">
	<div class="count-all">
		<div class="row">
			<div class="col">
				<i class="fa fa-user-o" aria-hidden="true" style="color"></i>
				<div>
		    	<span class="Number" style="color: black;">{{$countUsers}}</span>
		    	<span class="text" style="tes">Users</span>
				</div>
		    </div>
	       
		    <div class="col">
				<i class="fa fa-users" aria-hidden="true"></i>
				<div>
		    	<span class="Number"  style="color: black;">{{$countTeams}}</span>
		    	<span class="text">Teams</span>
				</div>
		    </div>
		    <div class="col">
				<i class="fa fa-users" aria-hidden="true"></i>
				<div>
		    	<span class="Number"  style="color: black;">{{$countGroups}}</span>
		    	<span class="text">Groups</span>
				</div>
		    </div>
		    <div class="col">
				<i class="fa fa-user-plus" aria-hidden="true"></i>
				<div>
		    	<span class="Number"  style="color: black;">{{$countClients}}</span>
		    	<span class="text">Clients</span>
				</div>
		    </div>
		    <div class="col">
				<i class="fa fa-folder-open" aria-hidden="true"> </i>
				<div>
		    	<span class="Number"  style="color: black;">{{$countProjects}}</span>
		    	<span class="text">Projects</span>
				</div>
		    </div>
		</div>
	</div>

	<div class="table-light shadow-sm table-responsive">
		<h2>Last projects</h2>
		<table class="table table-hover text-center">
		    <thead>
		   	    <tr>
		     		<th scope="col">#</th>
		     		<th scope="col">Name</th>
		     		<th scope="col">Client</th>
		     		<th scope="col">Directeur de projet</th>
		     		<th scope="col">Status</th>
		      		<th scope="col">Statut de payement</th>
		            <th scope="col">Action</th>
		        </tr>
		    </thead>
		    <tbody>
		      	@foreach($projects as $project)
                            <tr>
						      	<th scope="row">{{ $project->id }}</th>
						      	<td>{{ $project->name }}</td>
						      	<td>
						      	@foreach($clients as $client)
						      			@if($project->client_id == $client->id)
						      				{{ $client->name }}
						      			@endif
						      		@endforeach	
						        </td>		
						      	
						      	<td>{{ $project->directeur_id }}</td>
						      
						      	<td>@if($project->statut == 1)
						      	       Under review
						      	    @elseif($project->statut == 2)
						      			In progress
						      		@elseif($project->statut == 3)
						      		    On test
						      		@elseif($project->statut == 4)
						      		Completed

						      		@else
						      			Canceled
						      		@endif  
						      </td>
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
						      		<a href="#" class="btn btn-primary">Edit</a>
		      						<a href="#" class="btn btn-danger">delet</a>
		      					</td>
		   					</tr>
		   		@endforeach			
		    </tbody>
		</table>
	</div>

	<div class="row">
        <div class="col">
			<div class="table-light shadow-sm table-responsive">
				<h2>Last Clients</h2>
				<table class="table table-hover text-center">
				    <thead>
				    	<tr>
				     		<th scope="col">#</th>
				     		<th scope="col">Name</th>
				     		<th scope="col">Email</th>
				     		<th scope="col">Action</th>
				   		 </tr>
				  	</thead>
				  	<tbody>
				  		@foreach($clients as $client)
				        <tr>
				      	    <th scope="row">{{ $client->id }}</th>
					      	<td>{{ $client->name }}</td>
					      	<td>{{ $client->email }}</td>
			      	        <td>
			      			<a href="#" class="btn btn-primary">Edit</a>
			      			<a href="#" class="btn btn-danger">delet</a>
			      		    </td>
				        </tr>
				        @endforeach
				    </tbody>
				</table>
			</div>
		</div>
	</div>	

	<div class="col">
		<div class="table-light shadow-sm table-responsive">
			<h2>Last Users</h2>
			<table class="table table-hover text-center">
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
		</div>
	</div>
</div>