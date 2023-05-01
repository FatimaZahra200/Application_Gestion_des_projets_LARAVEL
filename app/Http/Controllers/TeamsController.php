<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Roles;
use App\Models\User;
use App\Models\Groups;
use App\Models\Team;
use App\Models\TypeGroup;

class TeamsController extends Controller
{
    //
    public function indexTeams()
    {   
        if (Auth::check()) {
            $users = User::all();
            $teams = Team::all();
            $groups = Groups::all();
            $page = "teams";
            return view(('pages.Teams.teams'),compact(['users', 'teams', 'groups' , 'page']));
        
        }else{
            return  redirect()->route('welcome');
        }
            
    }
     public function indexAdd(){
         if (Auth::check()) {
           
             $users = User::all();
             $groups = Groups::all();
             $page = "add-team";
             return view(('pages.Teams.add-team'),compact(['users',  'groups' , 'page']));
         }else{
             return  redirect()->route('welcome');
         }
     }

    public function add(Request $request) {
        if (Auth::check()) {

            $input = $request->all(); 
            $groupe_id = $input['groupe_id'];
            $input['groupe_id'] = implode(',', $groupe_id);

            $team = Team::create($input);

            if(!is_null($team)) {

                return back()->with("success", "Success! Registration completed");

            }else{

                return back()->with("failed", "Alert! Failed to register");
            }
        }else{
            return  redirect()->route('welcome');
        }
    }
  
    public function show($id)
    {
        if (Auth::check()) {
            $team =  Team::find($id);

            $string = $team->groupe_id;
            $str_arr = explode(",", $string); 
            $users = User::all();
            $groups = Groups::find($str_arr);

            //$members = implode(',', $groups->member_id);
            // var_dump($groups);
            $page = "show-team";
            
            return view(('pages.Teams.show-team'),compact([ 'team', 'groups','users' , 'page']));
        }else{
            return  redirect()->route('welcome');
        }
          
    }
    public function edit($id)
    {
        if (Auth::check()) {
            $team =  Team::find($id);
            $groups = groups::all();
            $typeGroups = TypeGroup::all();
            
            
            $page = "edit-team";
            
            return view(('pages.Teams.edit-team'),compact([ 'team' ,'groups' , 'typeGroups' , 'page']));
        }else{
            return  redirect()->route('welcome');
        }
         
    }

    public function update(Request $request)
    {
        if (Auth::check()) {
            $team = Team::find($request->id);

            if ($request->name != "") {
                $team->name = $request->name;
            }

            
            if ($request->directeur_id != "") {
                $team->directeur_id = $request->directeur_id;
            }
            
            if ($request->groupe_id != "") {
                

                $groupe_id = $request['groupe_id'];
                $request['groupe_id'] = implode(',', $groupe_id);

                $team->groupe_id = $request['groupe_id'];
            }
            
            $team->update();
            if(!is_null($team)) {
            //    Session::flash('success',"success", "Success! Registration completed");
                return back()->with("success", "Success! Registration completed");
            }else {
                // Session::flash('failed', "alert! Failed to registre");
                 return back()->with("failed", "Alert! Failed to register");
            }
        }else{
            return  redirect()->route('welcome');
        }
    }

    public function delete($id)
    {
        if (Auth::check()) {
            $teamDeleted =  Team::where('id',$id)->delete();
            if ($teamDeleted) {
                return back()->with("success", "User was deleted");
            }else{
                return back()->with("failed", "Alert! Failed to delet this user");
            }
        }else{
            return  redirect()->route('welcome');
        }
        
         
    }
}
