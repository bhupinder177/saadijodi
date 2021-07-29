<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MessageRooms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('message_rooms', function (Blueprint $table) {
          $table->increments('id');
          $table->string('roomId');
          $table->integer('userId');
          $table->integer('oppositeUserId');
          $table->string('message')->nullable();
          $table->dateTime('last_message_at');
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
      Schema::dropIfExists('message_rooms');

    }
}
