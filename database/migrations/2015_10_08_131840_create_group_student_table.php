<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('group_student', function (Blueprint $table) {

            $table->increments('id');

            $table->integer('group_id')->unsigned();
            $table->integer('student_id')->unsigned();

            $table->enum('role', ['leader', 'member']);

            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');

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
        Schema::table('group_student', function (Blueprint $table) {
            //
        });
    }
}
