<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserBirthdetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('user_birth_details', function (Blueprint $table) {
          $table->increments('id');
          $table->string('userId');
          $table->integer('birthCountry')->nullable();
          $table->string('birthCity')->nullable();
          $table->integer('manglik')->nullable();
          $table->string('birthHours')->nullable();
          $table->string('birthminute')->nullable();
          $table->string('birthAmPm')->nullable();
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
      Schema::dropIfExists('user_birth_details');
    }
}
