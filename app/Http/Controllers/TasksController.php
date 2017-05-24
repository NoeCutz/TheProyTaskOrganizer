<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Response;
use App\Task;
use App\Review;
use App\Project;
use App\Http\Requests\StoreReviewTaskPost;
use App\Http\Requests\UpdateTaskProjectPut;
use App\Http\Requests\UpdateTaskProjectPatch;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{
    public function indexReviews(Task $task){
      return Response::json($task->load('reviews'));
    }

    public function storeReview(Task $task, StoreReviewTaskPost $request)
    {
       $attributes = $request->all();
        $review= new Review($attributes);
        $user= Auth::user();

        $review -> task() -> associate($task);
        $user -> reviews() -> save($review);

        //$task -> reviews() -> save($review);
       return Response::json($task->load('reviews'));
    }


  public function updateTask(UpdateTaskProjectPut $request, Project $project, Task $task){
      $attributes = $request->all();
      $task->update($attributes);
      return Response::json($task);
  }

  public function updatePartialTask(Project $project, Task $task, UpdateTaskProjectPatch $request){
    $attributes = $request->all();
    $task -> update($attributes);
    return Response::json($task);
  }

}
