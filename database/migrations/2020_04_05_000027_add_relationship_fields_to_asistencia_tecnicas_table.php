<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAsistenciaTecnicasTable extends Migration
{
    public function up()
    {
        Schema::table('asistencia_tecnicas', function (Blueprint $table) {
            $table->unsignedInteger('funcionario_asistencia_id');
            $table->foreign('funcionario_asistencia_id', 'funcionario_asistencia_fk_725714')->references('id')->on('users');
            $table->unsignedInteger('nombre_cliente_id');
            $table->foreign('nombre_cliente_id', 'nombre_cliente_fk_734925')->references('id')->on('beneficiarios');
        });

    }
}
