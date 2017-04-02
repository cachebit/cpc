<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebtoonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('webtoons', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('user_id')->index();
          $table->integer('imageable_id');
          $table->string('imageable_type');
          $table->string('path');
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
        Schema::drop('webtoons');
    }
}
