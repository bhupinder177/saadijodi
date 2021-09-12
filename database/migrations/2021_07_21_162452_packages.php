<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Packages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('packages', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name')->nullable();
          $table->integer('price')->nullable();
          $table->text('description')->nullable();
          $table->integer('chat')->nullable();
          $table->integer('connects')->nullable();
          $table->integer('duration')->nullable();
          $table->integer('phoneNumberDisplay')->nullable();
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
      Schema::dropIfExists('packages');

    }
}
