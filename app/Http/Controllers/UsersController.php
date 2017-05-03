<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Response;
use App\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\PartialUpdateUserRequest;

class UsersController extends Controller
{
  public function index()
  {
    return Response::json(User::all());
  }
  
  public function show($user)
  {
    $userInstance = User::findOrFail($user);
    return $userInstance;
  }
  
  public function store(StoreUserRequest $request)
  {
    $attributes = $request->all();//obtiene atributos
    $user = User::create($attributes);//crea el usuario
    return Response::json($user);
  }
  
  public function total_update(StoreUserRequest $request, User $user)
  {
    $attributes = $request->all();
    $user -> update($attributes);//actualiza la información
    return $user;
  }
  
  public function partial_update(PartialUpdateUserRequest $request, User $user)
  {
    $attributes = $request->all();
    $user -> update($attributes);//actualiza la información
    return $user;
  }
  
  public function destroy(User $user)
  {
    $user->delete();
    return Response::json([],200);
  }
  
}
