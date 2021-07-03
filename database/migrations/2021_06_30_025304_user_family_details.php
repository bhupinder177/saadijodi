<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserFamilyDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('user_family_details', function (Blueprint $table) {
          $table->increments('id');
          $table->string('userId');
          $table->integer('fatherStatus')->nullable();
          $table->integer('motherStatus')->nullable();
          $table->string('familyLocation')->nullable();
          $table->string('nativePlace')->nullable();
          $table->integer('sibling')->nullable();
          $table->integer('familyType')->nullable();
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
      Schema::dropIfExists('user_family_details');

    }
}
