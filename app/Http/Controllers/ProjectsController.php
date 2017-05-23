<?php

namespace App\Http\Controllers;

use App\Project;
use App\Task;
use Illuminate\Http\Request;
use Response;

class ProjectsController extends Controller
{
    //
    public function destroy(Project $project)
    {
        $project->delete();
        return Response::json([], 204);
    }
    public function destroyTask(Project $project, Task $task)
    {
        $task = App\Task::find($task);
        $task->delete();
        return Response::json([], 204);
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
}
