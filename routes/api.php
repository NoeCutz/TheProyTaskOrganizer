<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('projects', 'ProjectsController@index');

Route::get('projects/{project}','ProjectsController@show');

Route::post('projects','ProjectsController@store');

Route::put('projects/{project}','ProjectsController@update');

Route::patch('projects/{project}','ProjectsController@updatePartial');
//termina aqui pat

Route::delete('projects/{project}','ProjectsController@destroy');

Route::get('projects/{project}/users','ProjectsController@users');

Route::get('projects/{project}/roles','ProjectsController@roles');




Route::delete('projects/{project}/tasks/{task}','ProjectsController@destroyTask');

Route::get('projects/{project}/tasks','ProjectsController@tasks');
//angel


Route::post('projects/{project}/tasks','ProjectsController@storeTask');

Route::put('projects/{project}/tasks/{task}','TasksController@updateTask');

Route::patch('projects/{project}/tasks/{task}','TasksController@updatePartialTask');

Route::get('projects/{project}/users/{user}/tasks','ProjectsController@userTasks');




Route::post('projects/{project}/roles','RolesController@storeRole');
//milka

Route::get('projects/{project}/roles','RolesController@roles');

/*****************************************************************/

Route::get('users', 'UsersController@index');

Route::get('users/{user}','UsersController@show');

Route::post('users','UsersController@store');

Route::put('users/{user}','UsersController@update');

Route::patch('users/{user}','UsersController@updatePartial');

Route::delete('users/{user}','UsersController@destroy');

Route::get('users/{user}/roles','UsersController@roles');

/*****************************************************************/

Route::get('tasks/{task}/reviews', 'TasksController@indexReviews');

Route::post('tasks/{task}/reviews','TasksController@storeReview');

Route::delete('tasks/{task}/reviews/{review}','TasksController@destroyReview'); //ESTA

Route::put('tasks/{task}/reviews/{review}','TasksController@updateReview'); //ESTA
//noe

/*****************************************************************/




