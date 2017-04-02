<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpusculesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opuscules', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->index();
            $table->timestamps('publish_at')->index();
            $table->float('score')->index();
            $table->boolean('scored');
            $table->string('title');
            $table->string('genre');
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
        Schema::drop('opuscules');
    }
}
