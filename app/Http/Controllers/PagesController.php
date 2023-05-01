<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Roles;
use App\Models\Groups;
use App\Models\Team;
use App\Models\Client;
use App\Models\Project;

class PagesController extends Controller
{
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->role_id) {
        $countUsers = User::all()->count();
         $users = User::all()->take(5);
         $roles = Roles::all()->take(5);
         $teams=Team::all()->take(5);
         $clients=client::all()->take(5);
         $projects=Project::all()->take(5);
         $groups=Groups::all()->take(5);
         
         
         $countClients = User::all()->count();
         $countProjects = project::all()->count();
         $countGroups = Groups::all()->count();
         $countTeams = Team::all()->count();

         $page = "home";

         return view(('home'),compact(['users','roles','teams','groups','clients','page','projects','countUsers','countClients','countProjects','countGroups','countTeams']));
        }else{
            return redirect('welcome') ;
        }
    }

    public function welcome()
    {
        $page = "welcome";
        return view(('welcome'),compact('page'));
    }
}