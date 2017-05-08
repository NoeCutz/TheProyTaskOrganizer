<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterReviewTableAddTaskForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('reviews', function (Blueprint $table)
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
      Schema::table('reviews', function(Blueprint $table)
      {
          $table->dropForeign('reviews_task_id_foreign');
      });
    }
}
