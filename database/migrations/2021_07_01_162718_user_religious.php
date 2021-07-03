<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserReligious extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('user_religiouses', function (Blueprint $table) {
          $table->increments('id');
          $table->string('userId');
          $table->integer('religion')->nullable();
          $table->integer('motherTongue')->nullable();
          $table->integer('community')->nullable();
          $table->string('subCommunity')->nullable();
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
      Schema::dropIfExists('user_religious');
    }
}
