<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSingleFramesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('single_frames', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('user_id')->index();
          $table->integer('imageable_id');
          $table->string('imageable_type')->index();
          $table->float('score')->index();
          $table->boolean('scored');
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
        Schema::drop('single_frames');
    }
}
