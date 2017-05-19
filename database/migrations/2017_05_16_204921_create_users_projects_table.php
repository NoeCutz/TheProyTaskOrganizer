<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('users_projects', function (Blueprint $table) {
        $table->integer('user_id')->unsigned();
        $table->integer('project_id')->unsigned();
        $table->foreign('user_id')->references('id')->on('users');
        $table->foreign('project_id')->references('id')->on('projects');
        $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users_projects');
    }
}
