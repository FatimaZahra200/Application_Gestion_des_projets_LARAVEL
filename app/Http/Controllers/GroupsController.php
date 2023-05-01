<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Roles;
use App\Models\User;
use App\Models\Groups;
use App\Models\TypeGroup;
use App\Models\Team;

class GroupsController extends Controller
{
    //
    public function indexGroups()
    {   
        if (Auth::check()) {
            $users = User::all();
            $typeGroups = TypeGroup::all();
            $groups = Groups::all();
            $page = "groups";
            return view(('pages.Groups.groups'),compact(['users', 'groups', 'typeGroups', 'page']));
        
        }else{
            return  redirect()->route('welcome');
        }
            
    }

    public function indexAdd(){
        if (Auth::check()) {
            $roles = Roles::all();
            $users = User::all();
            $typeGroups = TypeGroup::all();
            $page = "add-group";
            return view(('pages.Groups.add-group'),compact(['page', 'users', 'typeGroups', 'roles']));
        }else{
            return  redirect()->route('welcome');
        }
    }

    public function add(Request $request) {
        if (Auth::check()) {

            $input = $request->all();
            $membre_id = $input['membre_id'];
            $input['membre_id'] = implode(',', $membre_id);

            $group = Groups::create($input);
            if(!is_null($group)) {

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
            $group =  Groups::find($id);

            $string = $group->membre_id;
            $str_arr = explode(",", $string); 
            
            $members = User::find($str_arr);
            $typeGroups = TypeGroup::all();
            $users = User::all();
            $page = "show-group";
            
            return view(('pages.Groups.show-group'),compact(['members', 'group', 'typeGroups', 'users', 'page']));
        }else{
            return  redirect()->route('welcome');
        }
         
    }

    public function edit($id)
    {
        if (Auth::check()) {
            $group =  Groups::find($id);

            $string = $group->membre_id;
            $members = explode(",", $string); 
            
            $users = User::all();
            $typeGroups = TypeGroup::all();
            $page = "edit-group";
            
            return view(('pages.Groups.edit-group'),compact(['members', 'group', 'typeGroups', 'users', 'page']));
        }else{
            return  redirect()->route('welcome');
        }
         
    }

    public function update(Request $request)
    {
        if (Auth::check()) {
            $group = Groups::find($request->id);

            if ($request->name != "") {
                $group->name = $request->name;
            }

            if ($request->type_group != "") {
                $group->type_group = $request->type_group;
            }

            if ($request->chef_project_id != "") {
                $group->chef_project_id = $request->chef_project_id;
            }
            
            if ($request->membre_id != "") {
                

                $membre_id = $request['membre_id'];
                $request['membre_id'] = implode(',', $membre_id);

                $group->membre_id = $request['membre_id'];
            }
            
            $group->update();
            if(!is_null($group)) {
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
            $groupDeleted =  Groups::where('id',$id)->delete();
            if ($groupDeleted) {
                return back()->with("success", "User was deleted");
            }else{
                return back()->with("failed", "Alert! Failed to delet this user");
            }
        }else{
            return  redirect()->route('welcome');
        }
        
         
    }
}   
