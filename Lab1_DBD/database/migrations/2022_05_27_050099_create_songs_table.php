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
        Schema::create('songs', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('fecha_subida')->nullable();
            $table->time('duracion');
            $table->boolean('restriccion_edad')->nullable();
            $table->integer('reproducciones')->nullable();
            $table->date('fecha_creacion');
            $table->integer('id_genero')->nullable();
            $table->integer('id_pais')->nullable();
            $table->integer('id_album')->nullable();
            $table->foreign('id_genero')->references('id')->on('genres');
            $table->foreign('id_pais')->references('id')->on('locations');
            $table->foreign('id_album')->references('id')->on('albums');
            $table->softDeletes();
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
        Schema::dropIfExists('songs');
    }
};
