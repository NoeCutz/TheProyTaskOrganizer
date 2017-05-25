<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use App\Http\Requests\UpdateReviewPut;
use Illuminate\Support\Facades\Auth;
use Response;

class ReviewsController extends Controller
{
  public function update(UpdateReviewPut $request,Review $review)
   {

     $user_email = Auth::user()-> email;
     $user_review = $review -> user()->get();
     $user_review_email = $user_review[0] -> email;
     if($user_email == $user_review_email ){
       $attributes = $request->all();
       $review -> update($attributes);
       return Response::json($review);
     }
    }


    public function destroy(Review $review)
    {
      $user_email = Auth::user()-> email;
      $user_review = $review -> user()->get();

      $user_review_email = $user_review[0] -> email;
      //user_id = $user_review -> id;
      if($user_email == $user_review_email ){
        $review -> delete();
        return Response::json([],204);
      }else{
          return Response::json("No puedes eliminar una revision que no creaste");
      }

    }
}
