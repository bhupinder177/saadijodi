<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserLocations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('user_locations', function (Blueprint $table) {
          $table->increments('id');
          $table->string('userId');
          $table->integer('country')->nullable();
          $table->integer('state')->nullable();
          $table->integer('city')->nullable();
          $table->integer('grewUp')->nullable();
          $table->string('pincode')->nullable();
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
      Schema::dropIfExists('user_locations');

    }
}
