<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateReviewPut;
use App\Review;
use Response;

class ReviewsController extends Controller
{
  public function updateReview(UpdateReviewPut $request,Review $review)
   {
   $attributes = $request->all();
   $review -> update($attributes);
   return Response::json($review);
 }
}
