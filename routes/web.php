<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\GroupsController;
use App\Http\Controllers\TeamsController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\Auth\ClientsAuthController;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

// Route::get('/', [PagesController::class, 'welcome']);

Auth::routes();

Route::get('/home', [PagesController::class, 'index'])->name('home');


// Users function ==========================================

Route::get('/dashboard', [UsersController::class, 'checkLogin']);

Route::get('users', [UsersController::class, 'indexUsers']);

Route::get('add-user', [UsersController::class, 'indexAdd']);

Route::post('add', [UsersController::class, 'add']);

Route::post("add-new-user", [UsersController::class, 'AddNewUser']);

Route::get("user-edit/{id?}", [UsersController::class, 'editUser']);

Route::post("update-user", [UsersController::class, 'update']);

Route::get("delete-user/{id?}", [UsersController::class, 'delete']);


// Groups function ==========================================
Route::get('groups', [GroupsController::class, 'indexGroups']);

Route::get('add-group', [GroupsController::class, 'indexAdd']);

Route::post("add-new-group", [GroupsController::class, 'add']);

Route::get("group-show/{id?}", [GroupsController::class, 'show']);

Route::get("group-edit/{id?}", [GroupsController::class, 'edit']);

Route::post("update-group", [GroupsController::class, 'update']);

Route::get("delete-group/{id?}", [GroupsController::class, 'delete']);

//Teams function ===============================================
Route::get('teams', [TeamsController::class, 'indexTeams']);

Route::get('add-team', [TeamsController::class, 'indexAdd']);

 Route::post("add-new-team", [TeamsController::class, 'add']);

Route::get("team-show/{id?}", [TeamsController::class, 'show']);

Route::get("team-edit/{id?}", [TeamsController::class, 'edit']);

Route::post("update-team", [TeamsController::class, 'update']);

Route::get("delete-team/{id?}", [TeamsController::class, 'delete']);

//Clients functions ===========================================

Route::get('/clientLogin', [ClientsAuthController::class, 'showLoginForm'])->name('client.login');
Route::post('/clientLogin', [ClientsAuthController::class, 'login'])->name('client.login');
Route::get('/client/logout', [ClientsAuthController::class, 'logout'])->name('client.logout');

Route::group(['middleware' => ['auth:client']], function () {
    Route::get('clientDashboard', [ClientsController::class, 'dashboard'])->name('clientDashboard');
    Route::get("project/{id?}", [ClientsController::class, 'showing'])->name('project');


});

Route::get('clients', [ClientsController::class, 'indexClients']);

Route::get('add-client', [ClientsController::class, 'indexAdd']);

Route::post("add-new-client", [ClientsController::class, 'add']);

Route::get("client-show/{id?}", [ClientsController::class, 'show']);

Route::get("client-edit/{id?}", [ClientsController::class, 'edit']);

Route::post("update-client", [ClientsController::class, 'update']);

Route::get("delete-client/{id?}", [ClientsController::class, 'delete']);



//Projects functions ===========================================


Route::get('projects', [ProjectsController::class, 'indexProjects']);

Route::get('add-project', [ProjectsController::class, 'indexAdd']);

Route::post("add-new-project", [ProjectsController::class, 'add']);

Route::get("project-show/{id?}", [ProjectsController::class, 'show']);

Route::get("project-edit/{id?}", [ProjectsController::class, 'edit']);

Route::post("update-project", [ProjectsController::class, 'update']);

Route::get("delete-project/{id?}", [ProjectsController::class, 'delete']);


