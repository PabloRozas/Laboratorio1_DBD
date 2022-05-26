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
        Schema::create('autenticacions', function (Blueprint $table) {
            $table->id();
            $table->string('contrasena');
            $table->date('fecha_creacion');
            // $table->integer('id_usuario');
            // $table->foreign('id_usuario')->references('id')->on('users');
            // Ver como va, no se como se hace respeecto a la autenticacion
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
        Schema::dropIfExists('autenticacions');
    }
};
