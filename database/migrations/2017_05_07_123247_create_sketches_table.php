<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSketchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sketches', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('story_id')->unsigned()->index();
            $table->integer('gallery_id')->unsigned()->index();
            $table->string('title', 100);
            $table->string('description', 420);
            $table->float('score');
            $table->integer('up')->unsigned();
            $table->string('path',255);
            $table->string('path_s',255);
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
        Schema::drop('sketches');
    }
}
