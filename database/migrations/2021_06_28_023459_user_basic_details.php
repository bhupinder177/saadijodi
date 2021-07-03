<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserBasicDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('user_basic_details', function (Blueprint $table) {
          $table->increments('id');
          $table->string('userId');
          $table->integer('gender')->nullable();
          $table->date('dateOfBirth')->nullable();
          $table->string('height')->nullable();
          $table->integer('maritalStatus')->nullable();
          $table->integer('healthInformation')->nullable();
          $table->string('bloodGroup')->nullable();
          $table->integer('disability')->nullable();
          $table->integer('diet')->nullable();
          $table->integer('profileCreatedBy')->nullable();
          $table->text('about')->nullable();
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
      Schema::dropIfExists('user_basic_details');

    }
}
