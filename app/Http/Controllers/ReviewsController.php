<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use App\Http\Requests\UpdateReviewPut;

use Response;

class ReviewsController extends Controller
{
  public function update(UpdateReviewPut $request,Review $review)
   {
      $attributes = $request->all();
      $review -> update($attributes);
      return Response::json($review);
    }


    public function destroy(Review $review)
    {
      $review -> delete();
      return Response::json([],204);
    }
}
