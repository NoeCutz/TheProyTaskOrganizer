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
      $task->delete();
      return response()->json('', 204);
  }
}
