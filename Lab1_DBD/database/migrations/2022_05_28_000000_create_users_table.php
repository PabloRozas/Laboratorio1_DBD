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
            $table->string('password');
            $table->rememberToken();


            
            $table->unsignedBigInteger('albums_id')->nullable();
            $table->foreign('albums_id')->references('id')->on('albums');
            $table->unsignedBigInteger('playlists_id')->nullable();
            $table->foreign('playlists_id')->references('id')->on('playlists');
            $table->unsignedBigInteger('songs_id')->nullable(); 
            $table->foreign('songs_id')->references('id')->on('songs');
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
