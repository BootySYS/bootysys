<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('enrollment_number');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->integer('semester');

            $table->integer('university_id')->unsigned();
            $table->foreign('university_id')->references('id')->on('universities')->onDelete('cascade');

            $table->string('major');
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
        Schema::drop('students');
    }
}
