<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Response;
use App\Task;
use App\Review;
use App\Project;
use App\Http\Requests\StoreReviewTaskPost;

class TasksController extends Controller
{
    public function indexReviews(Task $task){
    return Response::json($task->load('reviews'));
    }

    public function storeReview(Task $task, StoreReviewTaskPost $request)
    {
       $attributes = $request->all();
        $review= Review::create($attributes);
        $task_id = $task-> id;
        $review ->task() -> associate($task_id);
        $review -> save();
       return Response::json($task->load('reviews'));
    }

    public function destroyReview(Review $review)
    {
    $review -> delete();
    return Response::json([],204);
  }



}
