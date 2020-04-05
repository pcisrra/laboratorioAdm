<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudesTable extends Migration
{
    public function up()
    {
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha_solicitud');
            $table->integer('cantidad_solicitud');
            $table->string('ots')->nullable();
            $table->string('observaciones')->nullable();
            $table->string('solicitud_unidad');
            $table->timestamps();
            $table->softDeletes();
        });

    }
}
