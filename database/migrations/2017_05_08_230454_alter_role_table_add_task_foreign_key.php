<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterRoleTableAddTaskForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('roles', function (Blueprint $table)
      {
          $table->integer('task_id')->unsigned();
          $table->foreign('task_id')->references('id')->on('tasks');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('roles', function(Blueprint $table)
      {
          $table->dropForeign('roles_task_id_foreign');
      });
    }
}
