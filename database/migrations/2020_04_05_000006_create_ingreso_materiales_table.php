<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngresoMaterialesTable extends Migration
{
    public function up()
    {
        Schema::create('ingreso_materiales', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('costo_ingreso', 15, 2);
            $table->string('observaciones');
            $table->date('fecha_ingreso');
            $table->integer('cantidad');
            $table->string('unidad_ingreso');
            $table->timestamps();
            $table->softDeletes();
        });

    }
}
