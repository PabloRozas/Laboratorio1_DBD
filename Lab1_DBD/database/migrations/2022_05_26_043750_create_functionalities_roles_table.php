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
        Schema::create('functionality_roles', function (Blueprint $table) {
            $table->id();
            $table->integer('id_functionalities');
            $table->integer('id_roles');
            $table->foreign('id_functionalities')->references('id')->on('functionalities')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_roles')->references('id')->on('roles')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('functionality_roles');
    }
};
