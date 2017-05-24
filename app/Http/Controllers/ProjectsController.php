<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\User;
use App\Project;
use App\Role;
use Response;
use App\Http\Requests\StoreTaskProjectPost;
use App\Http\Request\ShowTasksProjectUserGet;
use Illuminate\Support\Facades\Auth;

class ProjectsController extends Controller
{

  public function storeTask(Project $project, StoreTaskProjectPost $request){
     $attributes = $request->all();
     $task = new Task($attributes);
     $task->project()-> associate($project);
     $task->user()-> associate(User::find($attributes['user_id']));
     $task->role()-> associate(Role::find($attributes['role_id']));
     $task->save();
     return Response::json($task);
}

//milka
public function userTasks(Project $project, User $user){
  $id = Auth::id();
  if($id==($user->id)){
      $tasks_project = Task::where('project_id', $project->id)->get();
      $tasks = $tasks_project->where('user_id', $id);
      return Response::json($tasks);
  }
}
}
