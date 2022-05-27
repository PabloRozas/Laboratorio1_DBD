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
            $table->string('titulo',20);
            $table->string('fecha_subida',30);
            $table->string('duracion',30);
            $table->boolean('restriccion_edad');
            $table->integer('reproducciones');
            $table->date('fecha_creacion');
            
            $table->unsignedBigInteger('id_genero')->nullable();
            $table->foreign('id_genero')->references('id')->on('genders');

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
