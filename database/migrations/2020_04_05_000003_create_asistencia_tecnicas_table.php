<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsistenciaTecnicasTable extends Migration
{
    public function up()
    {
        Schema::create('asistencia_tecnicas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('detalle');
            $table->string('descripcion');
            $table->date('fecha');
            $table->integer('cantidad_horas');
            $table->integer('costo');
            $table->timestamps();
            $table->softDeletes();
        });

    }
}
