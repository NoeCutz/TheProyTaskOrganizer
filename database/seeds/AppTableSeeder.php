<?php

use Illuminate\Database\Seeder;
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
        $numOfProjects = 10; //5 users each one

        factory(\App\Project::class, $numOfProjects)->create(); 
    }
}
