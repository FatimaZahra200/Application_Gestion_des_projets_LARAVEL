@extends('layouts.app')

@section('show-group')
<div class="content"> 
{{--     @include('layouts.navbar')
 --}}    <div class="conte">
        
        @if(Auth::user()->role_id == 1 or Auth::user()->role_id == 3 or Auth::user()->role_id == 4 or Auth::user()->role_id == 5 or Auth::user()->role_id == 6)
            <div class="main">
				<div class="title-page">
					<div class="row">
						<div class="col">
							<h2>{{$group->name}}</h2>
						</div>
						<div class="col button-right">
							<a href="{{ url('add-group') }}" class="btn btn-primary">Add new group</a>
						</div>
					</div>
				</div>
				
				<div class="card text-center pdm mt-3">
					<div class="row">
						<div class="col">
							<h4>Chef project</h4>
							<p>
								@foreach($users as $user)
									@if($user->id == $group->chef_project_id)
										{{$user->name}}
									@endif
								@endforeach
							</p>
						</div>
						<div class="col">
							<h4>Type group</h4>
							@foreach($typeGroups as $typeGroup)
								@if($typeGroup->id == $group->type_group)
									{{$typeGroup->name}}
								@endif
							@endforeach
						</div>
					</div>
				</div>
				<h2 class="text-center mb-4">Members</h2>
				<div class="row">
					@foreach($members as $member)
						<div class="col-6">
							<div class="card text-center pdm">
								<h4>{{$member->name}}</h4>
								<p>{{$member->email}}</p>
							</div>
						</div>
					@endforeach
				</div>
					
			</div>
        @else
            <h1>no</h1>
        @endif
    </div>

</div>
    


@endsection






