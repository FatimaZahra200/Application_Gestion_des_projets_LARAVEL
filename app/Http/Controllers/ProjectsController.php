<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Team;
use App\Models\User;
use App\Models\Groups;
use App\Models\Client;
use App\Models\Roles;
use App\Models\TypeGroup;
use Illuminate\Validation\Rule;


class ProjectsController extends Controller
{
    //
     public function indexProjects()
    {   
        if (Auth::check()) {
            $projects = Project::all();
            $groups = groups::all();
            $users = user::all();
            $clients = Client::all();
            $page = "project";
            return view(('pages.Projects.project'),compact(['projects','groups','users','clients','page']));
        
        }else{
            return  redirect()->route('welcome');
        }
            
    }
    public function indexAdd(){
        if (Auth::check()) {
            $users = User::all();
            // $groups = groups::all();
            $clients = Client::all();
            // $typeGroups = TypeGroup::all();
            $page = "add-project";
            return view(('pages.Projects.add-project'),compact(['page', 'users','clients']));
        }else{
            return  redirect()->route('welcome');
        }
    }
    
     public function add(Request $request) {
        if (Auth::check()) {
        
            $request->validate([
                "name" => "required",
                "client_id" => 'required|numeric|gt:0',
                "directeur_id" => 'required|numeric|gt:0',
                "statut_payement" => 'required|numeric|gt:0',
                "chef_conception_id" => 'required|numeric|gt:0',
                "chef_des_id" => 'required|numeric|gt:0',
                "chef_dev_id" => 'required|numeric|gt:0',
                "chef_test_id" => 'required|numeric|gt:0',
                // "statut" => 'required|numeric|gt:0',
            ]);

            
           $project = new Project();
            
            $project->name = $request->name;
            $project->client_id = $request->client_id;
            $project->directeur_id = $request->directeur_id;
            $project->chef_conception_id = $request->chef_conception_id;
            $project->chef_des_id = $request->chef_des_id;
            $project->chef_dev_id = $request->chef_dev_id;
            $project->chef_test_id = $request->chef_test_id;
            // $project->statut = $request->statut;
            $project_save = $project->save();

            if ($project_save) {
                return back()->with("success", "Success! Registration completed");
            } 
            

            
        }else{
            return  redirect()->route('welcome');
        }
    }

    public function show($id)
    {
        if (Auth::check()) {
            $project =  project::find($id);

            $string = $project->directeur_id;
            $str_arr = explode(",", $string); 
            
            $directeur = User::find($str_arr);
            $groups = team::all();
            $users = User::all();
            $clients=client::all();
            $page = "show-project";
            
            return view(('pages.Projects.show-project'),compact(['project', 'groups', 'directeur','clients', 'users', 'page']));
        }else{
            return  redirect()->route('welcome');
        }
         
    }


    public function edit($id)
    {
        if (Auth::check()) {
            $project =  project::find($id);
            $users = User::all();
            $clients = Client::all();
            // $groups = groups::all();
            // $typeGroups = TypeGroup::all();
            $page = "edit-project";
            
            return view(('pages.Projects.edit-project'),compact(['project', 'clients', 'users', 'page']));
        }else{
            return  redirect()->route('welcome');
        }
         
    }

    public function update(Request $request)
    {
        if (Auth::check()) {
            $project = project::find($request->id);

            if ($request->name != "") {
                $project->name = $request->name;
            }

            if ($request->client_id != "0") {
                $project->client_id = $request->client_id;
            }

            if ($request->directeur_id != "") {
                $project->directeur_id = $request->directeur_id;
            }
            if ($request->chef_conception_id != "") {
                $project->chef_conception_id = $request->chef_conception_id;
            }
            if ($request->chef_des_id != "") {
                $project->chef_des_id = $request->chef_des_id;
            }
            if ($request->chef_dev_id != "") {
                $project->chef_dev_id = $request->chef_dev_id;
            }
            if ($request->chef_test_id != "") {
                $project->chef_test_id = $request->chef_test_id;
            }
            
            if ($request->statut != "0") {
                $project->statut = $request->statut;
            }
            if ($request->statut_payement != "0") {
                $project->statut_payement = $request->statut_payement;
            }
            
            $project->update();
            if(!is_null($project)) {
                return back()->with("success", "Success! Registration completed");
            }else {
                
                 return back()->with("failed", "Alert! Failed to register");
            }
        }else{
            return  redirect()->route('welcome');
        }
    }

    public function delete($id)
    {
        if (Auth::check()) {
            $projectDeleted =  project::where('id',$id)->delete();
            if ($projectDeleted) {
                return back()->with("success", "Project was deleted");
            }else{
                return back()->with("failed", "Alert! Failed to delet this user");
            }
        }else{
            return  redirect()->route('welcome');
        }
        
         
    }
}