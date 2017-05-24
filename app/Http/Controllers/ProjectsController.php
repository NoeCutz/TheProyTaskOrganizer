<?php

namespace App\Http\Controllers;

use App\Project;
use App\Task;
use App\User;
use Illuminate\Support\Facades\Auth;
use Response;

class ProjectsController extends Controller
{
    //
    public function destroy (Project $project)
    {
        $user = Auth::User();
        echo $user->role_user;
        foreach ($user->roles() as $role) {
            echo $role;
            if ($role == 'leader' && $role->project_id() == $project->id()) {
                if ($project->tasks() == null) {
                    $project->delete();
                    return Response::json([], 204);
                }else {
                    echo "No puedes eliminar proyectos con tareas.";
                }
            }else{
                echo "No eres el lider del proyecto";
            }
        }
    }

    public function destroyTask(Project $project, Task $task)
    {
        $user = Auth::User();
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
