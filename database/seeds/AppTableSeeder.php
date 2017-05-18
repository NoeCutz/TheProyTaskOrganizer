<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Task;
use App\Role;
use App\Project;

class AppTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $numOfProjects = 10;
        $numOfUsers = 10;


        factory(\App\User::Class, $numOfUsers)->create();
        factory(\App\Project::Class, $numOfProjects)->create()->each(function($p){

             $numOfRoles = 4;
             $numberOftasks = 10;

             $users_random = App\User::all()->random(4);
             $users = $p->users()->saveMany($users_random);
             $project_id = $p -> id;
             $roles =$p-> roles() -> saveMany(
                 factory(\App\Role::Class,$numOfRoles)->create([
                   'project_id' => $project_id
                 ])
               );
            foreach($roles as $role){
              $user = $users -> pop();
              $user_id = $user -> id;
              $role_id= $role -> id;
              $role -> users()->save($user);
              $tasks = $p -> tasks() -> saveMany(
                factory(\App\Task::Class,2)->create([
                  'project_id' => $project_id,'user_id' => $user_id, 'role_id' => $role_id
                ])
              );
              $user -> tasks()-> saveMany($tasks);

              foreach ($tasks as $task) {
                $task_id = $task-> id;
                $reviews = $task -> reviews()->saveMany(
                  factory(\App\Review::Class,2)->create([
                  'user_id' => $user_id, 'task_id' => $task_id
                  ])
                );
              $user -> reviews()-> saveMany($reviews);
              }
            }
         });
    }
}
