<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisenoAsistidosTable extends Migration
{
    public function up()
    {
        Schema::create('diseno_asistidos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion');
            $table->date('fecha');
            $table->integer('cantidad_horas');
            $table->integer('costo');
            $table->timestamps();
            $table->softDeletes();
        });

    }
}
