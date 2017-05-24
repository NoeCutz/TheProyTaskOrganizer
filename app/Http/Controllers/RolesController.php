<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Response;
use App\Project;
use App\Role;
use App\Http\Requests\StoreRoleProjectPost;

class RolesController extends Controller
{

    public function storeReview(Project $project,StoreRoleProjectPost $request)
      {
         $attributes = $request->input('name');
          $role= Role::create($attributes);
          $project_id = $project-> id;
          $role ->project() -> associate($project_id);
          $role -> save();
         return Response::json($role->load('roles'));
      }

}
