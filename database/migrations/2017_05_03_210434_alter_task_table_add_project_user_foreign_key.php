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

<<<<<<< HEAD:database/migrations/2017_05_03_210434_create_user_task_migration.php
           $table->foreign('user_id')->references('id')->on('user')
           ->onDelete('cascade');
=======
           $table->foreign('user_id')->references('id')->on('user');
>>>>>>> origin:database/migrations/2017_05_03_210434_alter_task_table_add_project_user_foreign_key.php
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
        $table->dropForeign('tasks_user_id_foreign');
      });
    }
}
