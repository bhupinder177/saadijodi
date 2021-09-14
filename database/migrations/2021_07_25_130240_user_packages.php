<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserPackages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('user_packages', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('userId')->nullable();
          $table->integer('packageId')->nullable();
          $table->integer('price')->nullable();
          $table->integer('chat')->nullable();
          $table->integer('connects')->nullable();
          $table->integer('phoneNumberDisplay')->nullable();
          $table->integer('duration')->nullable();
          $table->date('packageEnd')->nullable();
          $table->integer('status')->nullable();
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
      Schema::dropIfExists('user_packages');
    }
}
