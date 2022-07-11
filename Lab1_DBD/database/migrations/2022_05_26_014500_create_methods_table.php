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
        Schema::create('methods', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_vencimiento');
            $table->integer('CVC');
            $table->string('nombre_titular');
            $table->integer('cod_banks');
            $table->integer('cod_tarjeta');
            $table->softDeletes();
            $table->foreign('cod_banks')->references('id')->on('banks')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('cod_tarjeta')->references('id')->on('card__types')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('num_tarjeta');
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
        Schema::dropIfExists('methods');
    }
};
