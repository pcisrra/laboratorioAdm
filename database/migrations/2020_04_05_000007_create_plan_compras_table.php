<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanComprasTable extends Migration
{
    public function up()
    {
        Schema::create('plan_compras', function (Blueprint $table) {
            $table->increments('id');
            $table->string('categoria');
            $table->integer('c_utili_1');
            $table->integer('c_util_2');
            $table->float('porcentaje_in', 5, 2);
            $table->integer('cant_proyectada');
            $table->integer('stock_seg');
            $table->integer('cant_compra');
            $table->float('costo_total', 8, 2);
            $table->timestamps();
            $table->softDeletes();
        });

    }
}
