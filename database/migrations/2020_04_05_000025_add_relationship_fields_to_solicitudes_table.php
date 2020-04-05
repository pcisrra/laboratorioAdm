<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSolicitudesTable extends Migration
{
    public function up()
    {
        Schema::table('solicitudes', function (Blueprint $table) {
            $table->unsignedInteger('codigo_material_id');
            $table->foreign('codigo_material_id', 'codigo_material_fk_725561')->references('id')->on('materiales');
            $table->unsignedInteger('nombre_solicitante_id');
            $table->foreign('nombre_solicitante_id', 'nombre_solicitante_fk_725562')->references('id')->on('users');
            $table->unsignedInteger('fabricacion_solicitud_id');
            $table->foreign('fabricacion_solicitud_id', 'fabricacion_solicitud_fk_727162')->references('id')->on('fabricacions');
        });

    }
}
