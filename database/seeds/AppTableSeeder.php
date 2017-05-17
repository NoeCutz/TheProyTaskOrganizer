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
        $numOfUsers = 5;
        $numOfRoles = 10;
        $numberOftasks = 10;

        factory(\App\Project::Class, $numOfProjects)->create()->each(function($p){
          $p->users()->save(factory(\App\User::Class, 5)->create());
          $p->roles()->save(factory(\App\Role::Class, $numOfRoles)->create());
        });

        /*
        $users = App\User::all();

        foreach ($users as $user) {

        }


        factory(\App\User::Class, $numOfUsers)->create([
          'project_id' => App\Project::all('id')->random(),
        ]);






        $projects = App\Project::all();

        $projects = $projects->each(function($p){
          $p->tasks()->save(factory(\App\Task::Class, $numberOftasks)->create([
            'project_id' => $p->id
          ]));
        });

        $leader_role;
        factory(\App\Roles::Class, $numOfRoles)->create();
  */
    }
}
