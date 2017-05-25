<?php
namespace App\Http\Controllers;
use Response;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProjectPost;
use App\Task;
use App\User;
use App\Project;
use App\Role;
use App\Http\Requests\StoreTaskProjectPost;
use App\Http\Request\ShowTasksProjectUserGet;
use Illuminate\Support\Facades\Auth;

class ProjectsController extends Controller
{

  public function index()
  {
    return Project::paginate(15);
  }

  public function show($id)
  {
    return response()->json(Project::findOrFail($id));
  }

  public function users(Project $project)
    {
        $users = $project -> users()->get();
        return Response::json($users);
    }

    public function roles(Project $project)
    {
        $roles = $project -> roles()->get();
        return Response::json($roles);
    }

    public function tasks(Project $project)
    {
        $tasks = $project -> tasks()->get();
        return Response::json($tasks);
    }

  public function store(StoreProjectPost $request)
  {
    $attributes = $request->all();
    $project = Project::create($attributes);
    return response()->json($project);
  }

  public function update(UpdateProjectPut $request, Project $project)
  {
    $attributes = $request->all();
    $project->update($attributes);
    return $project;
  }

  public function updatePartial(UpdateProjectPut $request, Project $project)
  {
    $attributes = $request->all();
    $project->update($attributes);
    return $project;
  }

  public function destroyTask(Project $project, Task $task)
  {
      if($task->user()->id == Auth::id()) {
          $task->delete();
          return response()->json('', 204);
      }else{
          return Response::json("No eres el usuario");
      }
  }

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
  }else{
      return Response::json("No eres el usuario");
  }
}
}
