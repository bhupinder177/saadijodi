<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PartnerPreferences extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('partner_preferences', function (Blueprint $table) {
          $table->increments('id');
          $table->string('userId');
          $table->integer('ageMin')->nullable();
          $table->integer('ageMax')->nullable();
          $table->integer('heightMin')->nullable();
          $table->integer('heightMax')->nullable();
          $table->integer('maritalStatus')->nullable();
          $table->integer('country')->nullable();
          $table->integer('state')->nullable();
          $table->integer('city')->nullable();
          $table->integer('highestQualification')->nullable();
          $table->integer('workingWith')->nullable();
          $table->integer('income')->nullable();
          $table->integer('diet')->nullable();
          $table->integer('religion')->nullable();
          $table->integer('community')->nullable();
          $table->integer('motherTongue')->nullable();
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
      Schema::dropIfExists('user_contact_details');

    }
}
