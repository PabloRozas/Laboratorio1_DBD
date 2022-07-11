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
            $table->string('username');
            $table->string('name');
            $table->string('password');
            $table->string('email')->unique();
            $table->date('fecha_nacimiento')->nullable();
            $table->integer('edad')->nullable();
            $table->timestamp('fecha_creacion')->nullable();
            $table->boolean('suscripcion');
            $table->integer('num_tarjeta')->nullable();
            $table->foreign('num_tarjeta')->references('id')->on('methods')->onDelete('cascade')->onUpdate('cascade');
            $table->rememberToken();
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
