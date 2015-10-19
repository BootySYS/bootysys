<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professors', function (Blueprint $table) {
            $table->increments('id');

            $table->enum('title', ['Dr.', 'Prof. Dr.']);
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();

            $table->integer('university_id')->unsigned();
            $table->foreign('university_id')->references('id')->on('universities')->onDelete('cascade');

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
        Schema::drop('professors');
    }
}
