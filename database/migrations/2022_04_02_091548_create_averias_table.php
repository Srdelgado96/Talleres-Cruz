<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAveriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('averias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();
            $table->date('fecha_registro')->nullable();
            $table->date('fecha_finalizacion')->nullable();
            $table->unsignedBigInteger('estado_id');
            $table->foreign('estado_id')->references('id')->on("estados");
            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on("clientes");
            $table->unsignedBigInteger('vehiculo_id');
            $table->foreign('vehiculo_id')->references('id')->on("vehiculos");
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on("users");
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
        Schema::dropIfExists('averias');
    }
}
