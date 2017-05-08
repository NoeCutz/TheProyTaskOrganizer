<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectUserRolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('project_user_rol', function (Blueprint $table)
      {
        $table->integer('project_id')->unsigned();
        $table->integer('user_id')->unsigned();
        $table->integer('rol_id')->unsigned();

        $table->foreign('project_id')->references('id')->on('projects')
        ->onDelete('cascade');

        $table->foreign('user_id')->references('id')->on('users')
        ->onDelete('cascade');

        $table->foreign('rol_id')->references('id')->on('roles')
        ->onDelete('cascade');

      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('project_user_rol', function(Blueprint $table)
      {
        $table->dropForeign('project_user_rol_project_id_foreign');
        $table->dropForeign('project_user_rol_user_id_foreign');
        $table->dropForeign('project_user_rol_rol_id_foreign');
      });

      Schema::dropIfExists('project_user_rol');
    }
}
