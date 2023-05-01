@extends('layouts.app') 

@section('project')
  @include('client.navbar')
<div class="content">
	<div class="main" style="background-image: url('img/PubNative.png');display: flex;align-items: center;height: 667px;background-position: center; background-repeat: no-repeat;background-size: cover;min-height: 100vh;overflow-x: hidden;">
	
  			<div class="table table-sm">  
  					
  					 <div class="card-body bg-transparent border-success">
  					 	<h2>About project</h2><br>
		    		 <ul class="list-group list-group-flush">
  						@foreach($projects as $project)
   						 <li class="list-group-item" >Name:
   						 <span> {{ $project->name }} </span></li><br>

   								@foreach($users as $user)
   						   			@if($project->directeur_id == $user->id) 
   						 				<li class="list-group-item">Directeur:
   						 				<span> {{ $user->name}} </span></li><br>
   						 			 @endif
   						    @endforeach
									@foreach($users as $user)
   						   			@if($project->chef_conception_id == $user->id) 
   						        <li class="list-group-item">Chef of conception:
   						         <span> {{ $user->name }} </span></li><br>
   						   @endif
   						   @endforeach
   						   @foreach($users as $user)
   						   			@if($project->chef_des_id == $user->id) 
   						 				<li class="list-group-item">Chef of design:
   						 				<span> {{ $user->name}}<span></li><br>
   						 				@endif
   						   @endforeach
   						   @foreach($users as $user)
   						   			@if($project->chef_dev_id == $user->id) 
   						 				<li class="list-group-item">Chef of developpment:
   						 				<span> {{ $user->name }}<span></li><br>
   						 				@endif
   						   @endforeach
   						   @foreach($users as $user)
   						   			@if($project->chef_test_id == $user->id)
   						 				<li class="list-group-item">Chef of test:
   						 				<span> {{ $user->name }}</span></li><br>
   						 		@endif
   						   @endforeach
   						   	
   							<li class="list-group-item">Staut of payment:
   						 <span> @if($project->statut_payement == "1")
						      			paid
						      		@elseif($project->statut_payement == "2")
						      			no paid
						      		@else
						      			half paid
						      		@endif 
						 </span></li><br>
   						 <li class="list-group-item">statut of project:
   						 <span>  @if($project->statut == 1)
													Under review						      		
											@elseif($project->statut == 2)
						      			In progress
						      		@elseif($project->statut == 3)
						      			On test
						      		@elseif($project->statut == 4)
						      			Completed
						      		@elseif($project->statut == 5)
						      			Canceled
						      		@endif
						    </span>
						     </li><br>
   						  @endforeach 
 					</ul>
			        </div>
			</div>
			<div class="table table-sm" style="margin-bottom: -503px; margin-right: 44px;">
				<h2>Progress of  project</h2>

				<div class="progress">
					@foreach($projects  as $project)
				  @if($project->statut == 1)
 					 <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"style="width:70%;color:white ; background-color:#4d3347"> 20%
 					 {{-- </div> --}}
 					 @elseif($project->statut == 2)
 					 <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"style="width:70%;color:white ; background-color:#4d3347"> 40%
 					 {{-- </div> --}}
 					 @elseif($project->statut == 3)
 					 <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"style="width:70%;color:white ; background-color:#4d3347"> 60%
 					 {{-- </div>
 --}} 					 @elseif($project->statut == 4)
 					 <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"style="width:70%;color:white ; background-color:#4d3347"> 100%
 					 {{-- </div> --}}
 					 @elseif($project->statut == 5)
 					 <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"style="width:70%;color:white ; background-color:#4d3347"> 0%
 					 	@endif
 					 	@endforeach
 					 </div>
				</div>
			</div>
	</div> 
</div>			
	@endsection