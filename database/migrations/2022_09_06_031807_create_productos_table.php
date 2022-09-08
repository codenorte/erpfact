<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {

            $table->increments('idproductos');

            $table->integer('codigo');
            $table->string('codigo_principal');
            $table->string('codigo_auxiliar')->nullable()->default(null);
            $table->string('nombre');
            $table->float('valor_unitario');
            $table->string('tipo_producto');
            $table->string('iva');
            $table->string('ice')->nullable()->default(null);
            $table->string('irbpnr')->nullable()->default(null);
            $table->string('estado')->nullable()->default(null);
            $table->string('descripcion')->nullable()->default(null);
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
        Schema::dropIfExists('productos');
    }
}
