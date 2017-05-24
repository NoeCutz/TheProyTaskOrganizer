<?php

namespace App\Http\Controllers;
use Response;
use Illuminate\Http\Request;
use App\User;
use App\Project;
use App\Task;
use App\Http\Requests\StoreProjectPost;

class ProjectsController extends Controller
{

  public function index()
  {
    return Response::json(Project::all());
  }

  public function show($id)
  {
    return response()->json(Project::findOrFail($id));
  }

  public function users(Project $project)
  {
      $users = $project -> users() -> get();
      return response()->json($users);
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

  public function storeTask(Project $project, StoreTaskProjectPost $request)
  {
       $attributes = Input::only('user_id', 'name', 'description', 'state', 'role_id');
       $task= Task::create($attributes);
       $project_id = $project-> id;
       $task ->project() -> associate($project_id);
       $task -> save();
       return Response::json($project->load('task'));
  }

  public function roles(Project $project)
  {
      $roles = $project -> roles();
      return response()-> json([], $roles);
  }

  public function destroyTask(Project $project, Task $task)
  {
      $task->delete();
      return response()->json('', 204);
  }
}
