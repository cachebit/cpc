<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('story_id')->unsigned();
            $table->smallInteger('volum')->unsigned();
            $table->string('title', 100);
            $table->string('description', 420);
            $table->string('cover',255);
            $table->string('cover_m',255);
            $table->string('cover_s',255);
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
        Schema::drop('sections');
    }
}
