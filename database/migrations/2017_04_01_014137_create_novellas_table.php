<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNovellasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('novellas', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('user_id')->index();
          $table->timestamp('publish_at')->index();
          $table->float('score')->index();
          $table->boolean('scored');
          $table->string('title');
          $table->string('section');
          $table->string('genre')->index();
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
        Schema::drop('novellas');
    }
}
