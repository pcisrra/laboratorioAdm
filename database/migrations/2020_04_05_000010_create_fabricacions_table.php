<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFabricacionsTable extends Migration
{
    public function up()
    {
        Schema::create('fabricacions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('proyecto_nombre');
            $table->date('fecha_inicio');
            $table->integer('duracion');
            $table->timestamps();
            $table->softDeletes();
        });

    }
}
