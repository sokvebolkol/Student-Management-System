<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('subjects_id');
            $table->foreign('subjects_id')->references('id')->on('subjects');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('gender');
            $table->string('birthday');
            $table->string('address');
            $table->string('phonenumber');
            $table->string('religion');
            $table->string('email')->unique();
            $table->string('avatar');
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
        Schema::dropIfExists('teachers');
    }
}
