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
        Schema::create('equipos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipo_equipo_id');
            $table->foreign('tipo_equipo_id')->references('id')->on('tipo_de_equipos');
            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('users'); //ROl 3 - cliente
            $table->string('Marca',35);
            $table->string('Modelo',35);
            $table->string('CodigoSerial',35);
            $table->String('IMEI',35);
            $table->text('Caracteristicas',500);
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
        Schema::dropIfExists('equipos');
    }
};
