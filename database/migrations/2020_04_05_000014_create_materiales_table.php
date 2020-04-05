<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialesTable extends Migration
{
    public function up()
    {
        Schema::create('materiales', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo');
            $table->string('descripcion');
            $table->string('unidad');
            $table->integer('cantidad');
            $table->float('costo_unitario', 15, 2);
            $table->float('costo_promedio', 15, 2)->nullable();
            $table->float('costo_total', 15, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

    }
}
