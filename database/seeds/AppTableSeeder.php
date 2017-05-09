<?php

use Illuminate\Database\Seeder;
use App\User;
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
        $numOfUsers = 25;
        $numOfRoles = 9;
        $numberOftasks = 30;

        factory(\App\Project::Class, $numOfProjects)->create();

        factory(\App\User::Class, $numOfUsers)->create([
          'project_id' => App\Project::all('id')->random(),
        ]);

        factory(\App\Task::Class, $numberOftasks)->create([
          'project_id' => App\Project::all('id')->random(),
          'user_id' => App\User::get('id', 'project_id')->random()
        ]);

        $leader_role;
        factory(\App\Roles::Class, $numOfRoles)->create();

        $usersIds = App\Users::all('id');

    }
}
