<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserConnects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('user_connects', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('userId')->nullable();
          $table->integer('sendTo')->nullable();
          $table->integer('connects')->nullable();
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
      Schema::dropIfExists('user_connects');
    }
}
