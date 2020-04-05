<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDisenoAsistidosTable extends Migration
{
    public function up()
    {
        Schema::table('diseno_asistidos', function (Blueprint $table) {
            $table->unsignedInteger('usuario_asignado_id');
            $table->foreign('usuario_asignado_id', 'usuario_asignado_fk_725724')->references('id')->on('users');
            $table->unsignedInteger('nombre_cliente_id');
            $table->foreign('nombre_cliente_id', 'nombre_cliente_fk_734926')->references('id')->on('beneficiarios');
        });

    }
}
