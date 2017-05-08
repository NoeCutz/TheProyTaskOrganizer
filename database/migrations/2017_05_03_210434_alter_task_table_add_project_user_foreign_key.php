<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTaskTableAddProjectUserForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasks', function(Blueprint $table)
         {

           $table->foreign('project_id')->references('id')->on('projects')
           ->onDelete('cascade');

           $table->foreign('user_id')->references('id')->on('user');
         });
    }

    /**
     * Reverse the migrations.
     ->onDelete('cascade');
     *
     * @return void
     */
    public function down()
    {
      Schema::table('tasks', function(Blueprint $table)
      {
        $table->dropForeign('tasks_project_id_foreign');
        $table->dropForeign('tasks_user_id_foreign');
      });
    }
}
