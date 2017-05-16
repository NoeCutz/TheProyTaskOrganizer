<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->string('state');

            $table->integer('project_id')->unsigned();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');

<<<<<<< HEAD
=======
            $table->integer('user_id')->unsigned();
>>>>>>> b1ff036da4533657d7285950566b5d1c0b4d380a
            $table->foreign('user_id')->references('id')->on('user');

            $table->integer('rol_id')->unsigned();
            $table->foreign('rol_id')->references('id')->on('roles');

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
        Schema::table('tasks', function(Blueprint $table)
        {
          $table->dropForeign('tasks_project_id_foreign');
          $table->dropForeign('tasks_rol_id_foreign');
        });


        Schema::dropIfExists('tasks');
    }
}
