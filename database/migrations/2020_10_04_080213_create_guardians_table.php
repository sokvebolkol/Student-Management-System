<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuardiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guardians', function (Blueprint $table) {
            $table->increments('id');
            $table->string('father_fname')->nullable();
            $table->string('father_lname')->nullable();
            $table->string('mother_fname')->nullable();
            $table->string('mother_lname')->nullable();
            $table->string('gender')->nullable();
            $table->string('occupation')->nullable();
            $table->string('address')->nullable();
            $table->string('nationality')->nullable();
            $table->string('phoneNumber')->nullable();
            $table->string('avatar')->nullable();
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
        Schema::dropIfExists('guardians');
    }
}
