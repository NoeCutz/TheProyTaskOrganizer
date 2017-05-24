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





Route::get('projects', 'ProjectsController@index')->middleware('auth.basic');

Route::get('projects/{project}','ProjectsController@show');

Route::post('projects','ProjectsController@store');

Route::put('projects/{project}','ProjectsController@update');

Route::patch('projects/{project}','ProjectsController@updatePartial');
//termina aqui pat

Route::middleware('auth.basic')->delete('projects/{project}','ProjectsController@destroy'); //PENDIENTE

Route::middleware('auth.basic')->get('projects/{project}/users','ProjectsController@users'); //Listo

Route::middleware('auth.basic')->get('projects/{project}/roles','ProjectsController@roles'); //Listo




Route::middleware('auth.basic')->delete('projects/{project}/tasks/{task}','ProjectsController@destroyTask');//PENDIENTE

Route::middleware('auth.basic')->get('projects/{project}/tasks','ProjectsController@tasks');//Listo
//angel


Route::post('projects/{project}/tasks','ProjectsController@storeTask');

Route::put('projects/{project}/tasks/{task}','TasksController@updateTask');

Route::patch('projects/{project}/tasks/{task}','TasksController@updatePartialTask');

Route::middleware('auth.basic')->get('projects/{project}/users/{user}/tasks','ProjectsController@userTasks');




Route::post('projects/{project}/roles','RolesController@storeRole');
//milka

Route::get('projects/{project}/roles','RolesController@index');

/*****************************************************************/

Route::middleware('auth.basic')->get('users', 'UsersController@index');

Route::middleware('auth.basic')->get('users/{user}','UsersController@show');

Route::middleware('auth.basic')->post('users','UsersController@store');

Route::middleware('auth.basic')->put('users/{user}','UsersController@update');

Route::middleware('auth.basic')->patch('users/{user}','UsersController@updatePartial');

Route::middleware('auth.basic')->delete('users/{user}','UsersController@destroy');

Route::middleware('auth.basic')->get('users/{user}/roles','UsersController@roles');

/*****************************************************************/


Route::middleware('auth.basic')->get('tasks/{task}/reviews', 'TasksController@indexReviews');

Route::middleware('auth.basic')->post('tasks/{task}/reviews','TasksController@storeReview');

Route::middleware('auth.basic')->delete('reviews/{review}','ReviewsController@destroy'); //ESTA

Route::middleware('auth.basic')->put('reviews/{review}','ReviewsController@update'); //ESTA
//noe

/*****************************************************************/
