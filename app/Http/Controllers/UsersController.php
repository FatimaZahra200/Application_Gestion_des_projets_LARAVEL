<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Roles;
use App\Models\User;
use Session;
use Hash;

class UsersController extends Controller
{


    // 
    public function checkLogin()
    {   
        if (Auth::check()) {
            return view('home');
        }else{
            return  redirect()->route('login');
        }
        
    }

    public function indexUsers()
    {   
        if (Auth::check()) {
            $users = User::all();
            $roles = Roles::all();
            $page = "users";
            return view(('pages.users'),compact(['users', 'roles', 'page']));
        }else{
            return  redirect()->route('welcome');
        }
        
    }

    
    public function indexAdd(){
        if (Auth::check()) {
            if (Auth::user()->role_id == 1) {
                $roles = Roles::all();
                $page = "register";
                return view(('auth.register'),compact(['page', 'roles']));
            }else{
                $page = "register";
                return  redirect()->route('home', [$page]);
            }
                
        }else{
            return  redirect()->route('welcome');
        }
    }

    public function add(Request $request) {
        if (Auth::check()) {

            $request->validate(
                 [
                     'name'              =>      'required|string|max:20',
                     'email'             =>      'required|email|unique:users,email',
                     'role'              =>      'required|string',
                 ]
             );

             $dataArray = array(
                 "name"          =>          $request->name,
                 "email"         =>          $request->email,
                 "role_id"       =>          $request->role,
                 "password"      =>          Hash::make($request->password)

             );

             $user = User::create($dataArray);
             if(!is_null($user)) {
            //    Session::flash('success',"success", "Success! Registration completed");
                return back()->with("success", "Success! Registration completed");
             }

             else {
                // Session::flash('failed', "alert! Failed to registre");
                 return back()->with("failed", "Alert! Failed to register");
            }
        }else{
            return view('welcome');
        }
        
    }

    public function editUser($id)
    {
        if (Auth::check()) {
            $user =  User::find($id);
            $roles = Roles::all();
            $page = "edit-user";
            
            return view(('auth.edit-user'),compact(['user', 'roles', 'page']));
        }else{
            return  redirect()->route('welcome');
        }
    }

    public function update(Request $request)
    {   
        if (Auth::check()) {
            $user = User::find($request->id);

            if ($request->name != "") {
                $user->name = $request->name;
            }
            if ($request->email != "") {
                $user->email = $request->email;
            }
            if ($request->password != "") {
                if ($request->password_confirmation === $request->password) {
                    $user->password = Hash::make($request->password);
                }else{
                    return back()->with("failed", "your password is not valid");
                }
                
            }
            if ($request->role != "") {
                $user->role_id = $request->role;
            }
            
            $user->update();
            if(!is_null($user)) {
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
            $userDeleted =  User::where('id',$id)->delete();
            if ($userDeleted) {
                return back()->with("success", "User was deleted");
            }else{
                return back()->with("failed", "Alert! Failed to delet this user");
            }
        
        }else{
            return  redirect()->route('welcome');
        }
         
    }
}