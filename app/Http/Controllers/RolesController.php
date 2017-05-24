<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Response;
use App\Project;
use App\User;
use App\Role;
use App\Http\Requests\StoreRoleProjectPost;
use Illuminate\Support\Facades\Auth;

class RolesController extends Controller
{


    public function storeRole(Project $project, StoreRoleProjectPost $request)
    {
        $attributes = $request->all();
        $role= new Role($attributes);
        $role->project()-> associate($project);
        $role -> save();
       return Response::json($role);
    }

}
