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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->integer('id_rol');
            $table->foreign('id_rol')->references('id')->on('roles');
            $table->integer('num_tarjeta');
            $table->foreign('num_tarjeta')->references('id')->on('methods');
            $table->integer('id_album')->nullable();
            $table->foreign('id_album')->references('id')->on('albums');
            $table->integer('id_playlists')->nullable();
            $table->foreign('id_playlists')->references('id')->on('playlists');
            $table->integer('id_song')->nullable();
            $table->foreign('id_song')->references('id')->on('songs');
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
        Schema::dropIfExists('users');
    }
};
