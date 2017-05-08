<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUserTableAddProjectForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        chema::table('users', function (Blueprint $table)
        {
            $table->integer('project_id')->unsigned();

            $table->foreign('project_id')->references('id')->on('projects')
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
        Schema::table('roles', function(Blueprint $table)
        {
            $table->dropForeign('users_project_id_foreign');
        });
    }
}
