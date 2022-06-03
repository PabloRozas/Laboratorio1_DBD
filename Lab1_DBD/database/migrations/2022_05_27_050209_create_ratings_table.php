<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->string('Comentario');
            $table->integer('id_user');
            $table->integer('id_cancion');
            $table->integer('id_score');
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_cancion')->references('id')->on('songs');
            $table->foreign('id_score')->references('id')->on('scores');
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
        Schema::dropIfExists('ratings');
    }
};
