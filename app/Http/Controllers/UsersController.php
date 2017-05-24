<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserPost;
use App\Http\Requests\UpdateUserPatch;
use App\Http\Requests\UpdateUserPut;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Response;

class UsersController extends Controller
{
    public function index(){
        return User::paginate(15);
    }
    public function show($user){
        $userInstance = User::findOrFail($user);
        return $userInstance;
        //or: return $seller;
    }
    public function store(StoreUserPost $request){
        $attributes = $request->all(); //Obtener atributos
        $user = User::create($attributes); //Crear hijo
        return Response::json($user);
    }
    public function update(UpdateUserPut $request,User $user){
        $user_update_request = new UpdateUserPut();
        $request_rules = $user_update_request->rules();
        $this->validate($request,$request_rules);
        $attributes = $request->all();
        $user->update($attributes);//Actualizar información
        return $user;
    }
    public function updatePartial(UpdateUserPatch $request,User $user){
        $user_partial_request = new UpdateUserPatch();
        $request_rules = $user_partial_request->rules();
        $this->validate($request,$request_rules);
        $attributes = $request->all();
        $user->update($attributes);//Actualizar información
        return $user;
    }
    public function destroy(User $user){
        $id = Auth::id();
        if($user->id == $id) {
            $user->delete();
            return Response::json([]);
        }else{
            echo 'No eres el usuario';
        }
    }
    public function roles(User $user){
        $userInstance = User::findOrFail($user);

        return Response::json($userInstance->roles()->get());
    }

}
