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
        Schema::create('playlist_cancion', function (Blueprint $table) {
            $table->id();
            $table->integer('id_cancion');
            $table->integer('id_playlist');
            $table->foreign('id_cancion')->references('id')->on('songs');
            $table->foreign('id_playlist')->references('id')->on('playlists');

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
        Schema::dropIfExists('playlist_cancion');
    }
};
