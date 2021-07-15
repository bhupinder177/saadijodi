<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Notifications extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('notifications', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('notificationTo');
          $table->integer('notificationFrom');
          $table->string('notificationMessage');
          $table->integer('type')->nullable();
          $table->date('date');
          $table->integer('status');
          $table->integer('read');
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
      Schema::dropIfExists('notifications');

    }
}
