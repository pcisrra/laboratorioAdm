<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCapacitacionsTable extends Migration
{
    public function up()
    {
        Schema::create('capacitacions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->datetime('fecha_inicio');
            $table->datetime('fecha_fin');
            $table->timestamps();
            $table->softDeletes();
        });

    }
}
