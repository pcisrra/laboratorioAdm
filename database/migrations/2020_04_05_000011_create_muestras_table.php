<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMuestrasTable extends Migration
{
    public function up()
    {
        Schema::create('muestras', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo');
            $table->string('detalle')->nullable();
            $table->string('material')->nullable();
            $table->string('estado')->nullable();
            $table->string('cantidad')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

    }
}
