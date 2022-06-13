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
            $table->string('username');
            $table->string('email')->unique();
            $table->timestamp('fecha_creacion')->nullable();
            $table->rememberToken();
            $table->date('fecha_nacimiento');
            $table->integer('edad')->nullable();
            $table->boolean('suscripcion');
            $table->integer('id_rol');
            $table->foreign('id_rol')->references('id')->on('roles');
            $table->integer('num_tarjeta')->nullable();
            $table->foreign('num_tarjeta')->references('id')->on('methods');
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
        Schema::dropIfExists('users');
    }
};
