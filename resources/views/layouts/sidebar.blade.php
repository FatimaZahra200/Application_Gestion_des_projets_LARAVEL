
<div   class="d-flex flex-column flex-shrink-0 p-3 side-bar" style="width: 280px;">
  
   {{--  <div class='logo'> 
       <img src="img/logo.jpg"  alt="le logo">
       <h2>FIS CODERS</h2>
    </div> --}}
    {{-- <div>
      <a href="/home" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
        <i class="fa fa-home fa-2x" aria-hidden="true"></i>
        <span class="fs-4">{{ __('Dashboard') }}</span>
      </a>
    </div>
     --}}
    
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
         <a href="/home" class="nav-link link-dark">
            <i class="fa fa-home" aria-hidden="true"></i>
              {{ __('Dashboard') }}
        </a>
      </li>
      @if(Auth::user()->role_id == 1  or Auth::user()->role_id == 2)
      <li  class="nav-item" >
        <a href="{{ url('projects') }}" class="nav-link {{ $page == 'projects' ? 'active' : ''}}" aria-current="page">
           {{-- <i class="fa fa-file-o" aria-hidden="true"></i>  --}}
          <i class="fa fa-folder-open" aria-hidden="true"> </i>
          Projects
        </a>
      </li>
      @endif
      @if(Auth::user()->role_id == 1)
      <li>
        <a href="{{url('clients')}}" class="nav-link link-dark {{ $page == 'clients' ? 'active' : ''}}">
          <i class="fa fa-user-plus" aria-hidden="true"></i>
          Clients
        </a>
      </li>
      @endif
      @if(Auth::user()->role_id == 1  or Auth::user()->role_id == 2)
      <li>
        <a href="{{ url('teams') }}" class="nav-link link-dark {{ $page == 'teams' ? 'active' : ''}}">
          <i class="fa fa-users" aria-hidden="true"></i>
          Teams
        </a>
      </li>
      @endif
        @if(Auth::user()->role_id == 1 or Auth::user()->role_id == 3 or Auth::user()->role_id == 4 or Auth::user()->role_id == 5  or Auth::user()->role_id == 6)
      <li>
        <a href="{{ url('groups') }}" class="nav-link link-dark {{ $page == 'groups' ? 'active' : ''}}">
          <i class="fa fa-users" aria-hidden="true"></i>
          Groups
        </a>
      </li>
      @endif
      @if(Auth::user()->role_id == 1)
      <li>
        <a href="{{ url('users') }}" class="nav-link link-dark {{ $page == 'users' ? 'active' : ''}}">
          <i class="fa fa-user-o" aria-hidden="true"></i>
          Users
        </a>
      </li>
      @endif
    </ul>
  
 
</div>
