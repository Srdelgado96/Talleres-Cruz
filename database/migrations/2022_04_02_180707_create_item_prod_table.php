<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemProdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_prods', function (Blueprint $table) {
            $table->id();
            $table->decimal('precio')->nullable();
            $table->integer('unidades')->nullable();
            $table->unsignedBigInteger('factura_id');
            $table->foreign('factura_id')->references('id')->on("facturas");
            $table->unsignedBigInteger('producto_id');
            $table->foreign('producto_id')->references('id')->on("productos");
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
        Schema::dropIfExists('item_prod');
    }
}
