<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserEducations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('user_educations', function (Blueprint $table) {
          $table->increments('id');
          $table->string('userId');
          $table->string('highestQualification')->nullable();
          $table->string('workingWith')->nullable();
          $table->string('workingAs')->nullable();
          $table->string('employerName')->nullable();
          $table->integer('income')->nullable();
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
      Schema::dropIfExists('user_educations');

    }
}
