<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('course_group', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('course_id')->unsigned();
            $table->integer('group_id')->unsigned();

            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');

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
        Schema::table('course_group', function (Blueprint $table) {
            //
        });
    }
}
