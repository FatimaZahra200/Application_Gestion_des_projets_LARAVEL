<div class="main">
	<div class="count-all">
	<div class="row">
		<div class="col">
				<i class="fa fa-users" aria-hidden="true"></i>
				<div>
		    		<span class="Number">{{$countGroups}}</span>
		 			<span class="text">Groups</span>
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


<div class="table-light">
		<h2>Last projects</h2>
		<table class="table table-hover text-center">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Name</th>
		      <th scope="col">Client</th>
		      <th scope="col">Directeur de projet</th>
		      <th scope="col">team name</th>
		      <th scope="col">Status</th>
		      <th scope="col">Action</th>
		    </tr>
		    </thead>
		  		      	@foreach($projects as $project)
                            <tr>
						      	<th scope="row">{{ $project->id }}</th>
						      	<td>{{ $project->name }}</td>
						      	<td>{{ $project->client_id }}</td>
						      	<td>{{ $project->directeur_id }}</td>
						      	<td>{{ $project->statut }}</td>
						      	<td>{{ $project->statut_payement}}</td>
						      	<td>
						      		<a href="#" class="btn btn-primary">Edit</a>
		      					</td>
		   					</tr>
		   		@endforeach		
            </tbody>
	        </table>
</div>
<div class="table-light">
		<h2>Last groups</h2>
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
		  	@foreach($groups as $group)
		       @if($group->chef_project_id == Auth::user()->id)
		        <tr>
		      	  <th scope="row">{{$group->id}}</th>
		      	  <td>{{$group->name}}</td>
		      	  <td>{{$group->chef_project_id}}</td>
		      	  <td>
		      		<a href="#" class="btn btn-primary">Edit</a>
		      		<a href="#" class="btn btn-danger">delet</a>
					<a href="{{ url('group-show/'.$group->id )}}" class="btn btn-info">Show</a>
		      	  </td>
		        </tr>
		       @endif
		     @endforeach
		   </tbody>
		</table>
</div>
	
			