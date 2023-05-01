<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Client;
use App\Models\Project;
use App\Models\user;
use Session;
use Hash;

class ClientsController extends Controller
{
    //
    protected $redirectTo = '/clientDashboard';

    /**
     * redirect admin after login
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {   
            $clients = Client::find( Auth::user()->id ); //clients ou users?
            $page = "home-client";
            $projects = Project::where("client_id" , Auth::user()->id)->get();
            $countProjects = project::all()->count();
            return view(('client.home-client'),compact(['page', 'projects','clients','countProjects']));

        //return view('clientDashboard');
    }
    public function showing($id)
    {
        
             $projects = Project::where("client_id" , Auth::user()->id)->get();
                $clients = Client::all(); 
            //   $string = $projects->directeur_id;
            //  $str_arr = explode(",", $string); 
             
            //   $directeur = User::find($str_arr);
            // // // $groups = team::all();
             $users = User::all();
            
             $page = "project";
            
        return view(('client.project'),compact(['projects','page','clients','users']));
        
         
    }

    public function getLogin()
    {   
       if (Auth::check()) {
            $clients = Client::all(); //clients ou users?
            $page = "clients";
            return view(('pages.client.clients'),compact(['clients',  'page']));
        }else{
            return  view('auth.clientLogin');
        }
    }

    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        // Check email
        $client = Client::where('email', $fields['email'])->first();

        // Check password
        if(!$client || !Hash::check($fields['password'], $client->password)) {
            return response([
                'message' => 'Bad creds'
            ], 401);
        }

         $token = $client->createTolken('myapptoken')->plainTextToken;

         $response = [
               'user' => $client,
               'token' => $token
         ];

    }
   

    public function indexClients()
    {   
        if (Auth::check()) {
            $clients = Client::all(); //clients ou users?
            $page = "clients";
            return view(('pages.client.clients'),compact(['clients',  'page']));
        }else{
            return  redirect()->route('welcome');
        }
        
    }

    
    public function indexAdd(){
        if (Auth::check()) {
            if (Auth::user()->role_id == 1) {
                $page = "add-client";
                return view(('pages.client.add-client'),compact(['page']));
            }else{
                $page = "add-client";
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
                     'password'          =>      'required|alpha_num|min:6',
                     'phone'              =>      'required|string|max:15',
                     
                 ]
             );

             $dataArray = array(
                 "name"          =>          $request->name,
                 "email"         =>          $request->email,
                 "phone"         =>          $request->phone,
                 "password"      =>          Hash::make($request->password)

             );

             $client = Client::create($dataArray);
             if(!is_null($client)) {
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

    public function show($id)
    {
        if (Auth::check()) {
            $client =  Client::find($id);

            $string = $client->id;
            $str_arr = explode(",", $string); 
            
            $members = Client::find($str_arr);
            
            $client = Client::all();
            $page = "show-client";
            
            return view(('pages.client.show-client'),compact(['members', 'client', 'page']));
        }else{
            return  redirect()->route('welcome');
        }
         
    }

    public function edit($id)
    {
        if (Auth::check()) {
            $client =  Client::find($id);
            $page = "edit-client";
            
            return view(('pages.client.edit-client'),compact(['client', 'page']));
        }else{
            return  redirect()->route('welcome');
        }
    }

    public function update(Request $request)
    {   
        if (Auth::check()) {
            $client= Client::find($request->id);

            if ($request->name != "") {
                $client->name = $request->name;
            }
            if ($request->email != "") {
                $client->email = $request->email;
            }
            if ($request->password != "") {
                if ($request->password_confirmation === $request->password) {
                    $client->password = Hash::make($request->password);
                }else{
                    return back()->with("failed", "your password is not valid");
                }
                
            }
            
            
            $client->update();
            if(!is_null($client)) {
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
            $clientDeleted =  Client::where('id',$id)->delete();
            if ($clientDeleted) {
                return back()->with("success", "User was deleted");
            }else{
                return back()->with("failed", "Alert! Failed to delet this user");
            }
        
        }else{
            return  redirect()->route('welcome');
        }
         
    }
}