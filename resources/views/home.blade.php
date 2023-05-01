@extends('layouts.app')

@section('home')
    <div class="content">
{{--         @include('layouts.navbar')
 --}}        <div class="conte">
            
            @if(Auth::user()->role_id == 1 )
                   @include('pages.home-administrator')
                @elseif( Auth::user()->role_id == 2 )
                      @include('pages.home-directeur')
                @elseif(Auth::user()->role_id == 3 or Auth::user()->role_id == 4 or Auth::user()->role_id == 5 or     Auth::user()->role_id == 6)       
                    @include('pages.home-chef-project')
                 
           @endif
                
       
           
        </div>
        
    </div>
    


@endsection
