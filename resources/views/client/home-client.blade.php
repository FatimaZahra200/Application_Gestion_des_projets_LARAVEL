@extends('layouts.app')

@section('home-client')
  @include('client.navbar')
         <div class="main" style="background-image: url('img/PubNative.png');display: flex;align-items: center;height: 667px;background-position: center; background-repeat: no-repeat;background-size: cover;min-height: 100vh;overflow-x: hidden;">
	
  			<div class="table table-sm">  
  					
  					 <div class="card-body bg-transparent border-success">
  					 	<h2>My informations</h2><br>
		    		<ul class="list-group list-group-flush">
	                            
			   			{{-- @foreach($projects as $project)
		       				@if($project->client_id == Auth::user()->id) --}}
{{-- 	  								 @foreach($clients as $client)
 --}}											 <li class="list-group-item" >Name:
   						         <span>{{ $clients->name }}</span></li><br>
   						         <li class="list-group-item">Email:
   						         <span>{{ $clients->email}}</span></li><br>
   						         <li class="list-group-item">Phone:
   						         <span>{{-- {{ $client->phone }} --}} 0645986734</span></li><br>
   						         <li class="list-group-item">Number of projects:
   						         <span>{{$countProjects}}</span></li><br>
{{--    						       @endforeach
 --}}   						     {{-- @endif
   						 
   						@endforeach --}}
 					  </ul>
			   </div>
				</div>
				{{-- <div class="table-light shadow-sm table-responsive"> --}}
				{{-- 	<div class="row"> --}}
			    		<table class="table caption-top">

                  <thead  class="table-dark">
                  		<caption><h2>My projects</h2></caption>
			   	    			<tr>
						     		<th scope="col">#</th>
						     		<th scope="col">Name</th>
						     		<th scope="col">Action</th>
			     				</tr>
			    			</thead>
			    			<tbody>
			     		@foreach($projects as $project)
	                <tr>
							      	<th scope="row">{{ $project->id }}</th>
							      	<td>{{ $project->name }}</td>
							      	<td>
						      		<a href="{{ url('project/'.$project->id )}}"class="btn btn-primary">Show</a>
						      		</td>
			   					</tr>
			   			@endforeach		
			     			</tbody>
              				</table>
          		</div>
			
		</div>
	</div>

		

@endsection