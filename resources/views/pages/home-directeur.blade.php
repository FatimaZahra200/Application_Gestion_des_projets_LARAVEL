<div class="main">
	<div class="count-all">
	<div class="row">
		<div class="col">
				<i class="fa fa-users" aria-hidden="true"></i>
				<div>
		    		<span class="Number">{{$countTeams}}</span>
		 			<span class="text">Teams</span>
		   		 </div>
			 
		</div>
		<div class="col">
			<i class="fa fa-folder-open" aria-hidden="true"> </i>
				<div>
    		 <span class="Number">{{$countProjects}}</span>
    		 <span class="text">Projects</span>
		       </div>
	    </div>
</div>
</div>
<div class="table-light">
		<h2>Last teams</h2>
		<table class="table table-hover text-center">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Name</th>
		      <th scope="col">directeur</th>
		      <th scope="col">Action</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach($teams as $team)
		       @if($team->directeur_id == Auth::user()->id)
		        <tr>
		      	  <th scope="row">{{$team->id}}</th>
		      	  <td>{{$team->name}}</td>
		      	  <td>{{$team->directeur_id}}</td>
		      	  <td>
		      		<a href="#" class="btn btn-primary">Edit</a>
		      		<a href="#" class="btn btn-danger">delet</a>
		      	  </td>
		        </tr>
		       @endif
		     @endforeach
		   </tbody>
		</table>
</div>
<div class="table-light">
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
		      	    @if($project->directeur_id == Auth::user()->id)
                            <tr>
						      	<th scope="row">{{ $project->id }}</th>
						      	<td>{{ $project->name }}</td>
						      	<td>{{ $project->client_id }}</td>
						      	<td>{{ $project->directeur_id }}</td>
						      	<td>{{ $project->statut }}</td>
						      	<td>{{ $project->statut_payement}}</td>
						      	<td>
						      		<a href="#" class="btn btn-primary">Edit</a>
		      						<a href="#" class="btn btn-warning">hold</a>
		      						<a href="#" class="btn btn-danger">delet</a>
		      					</td>
		   					</tr>
		   			@endif		
		   		@endforeach			
		    </tbody>
		</table>
</div>