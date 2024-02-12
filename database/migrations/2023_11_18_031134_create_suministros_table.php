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
        Schema::create('suministros', function (Blueprint $table) {
            $table->id();
            $table->date('Fecha_venta');  
            $table->bigInteger('cedula_proveedor')->unsigned();  
            $table->bigInteger('id_producto')->unsigned();  
            $table->integer('Unidades');  
            $table->string('Metodo_pago');  
            $table->timestamps();
        });

        Schema::create('suministros', function (Blueprint $table) {
            $table->foreign('cedula_proveedor')->references('Cedula_P')->on('proveedors')->onDelete('cascade');  
            $table->foreign('id_producto')->references('id')->on('empleados')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suministros');
    }
};
