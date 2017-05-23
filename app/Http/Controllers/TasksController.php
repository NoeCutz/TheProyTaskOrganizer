<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Response;
use App\Task;
use App\Review;
use App\Http\Requests\StoreReviewTaskPost;
use App\Http\Requests\UpdateReviewPut;

class TasksController extends Controller
{
    public function indexReviews(Task $task){
    return Response::json($task->load('reviews'));
    }

    public function storeReview(Task $task,StoreReviewTaskPost $request)
    {
       $attributes = $request->input('descripcion');
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

   public function updateReview(UpdateReviewPut $review)
    {
    $attributes = $request->input('descripcion');
    $review -> update($attributes);
    return Response::json([],204);
  }

}
