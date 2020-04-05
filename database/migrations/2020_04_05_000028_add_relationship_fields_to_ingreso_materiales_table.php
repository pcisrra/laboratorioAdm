<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToIngresoMaterialesTable extends Migration
{
    public function up()
    {
        Schema::table('ingreso_materiales', function (Blueprint $table) {
            $table->unsignedInteger('codigo_material_id');
            $table->foreign('codigo_material_id', 'codigo_material_fk_725583')->references('id')->on('materiales');
            $table->unsignedInteger('usuario_ingreso_id');
            $table->foreign('usuario_ingreso_id', 'usuario_ingreso_fk_725584')->references('id')->on('users');
        });

    }
}
