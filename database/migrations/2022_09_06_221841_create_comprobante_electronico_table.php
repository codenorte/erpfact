<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComprobanteElectronicoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comprobante_electronico', function (Blueprint $table) {
            
            $table->increments('id');
            $table->integer('fecha_emision');
            $table->integer('tipo_comprobante');
            $table->integer('numero_ruc');
            $table->integer('tipo_ambiente');
            $table->integer('serie');
            $table->integer('numero_comprobante');
            $table->integer('codigo_numerico');
            $table->integer('tipo_emision');
            $table->integer('digito_verificador');
            $table->integer('requisito');
            $table->string('estado');
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
        Schema::dropIfExists('comprobante_electronico');
    }
}
