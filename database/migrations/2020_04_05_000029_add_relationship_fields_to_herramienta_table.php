<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToHerramientaTable extends Migration
{
    public function up()
    {
        Schema::table('herramienta', function (Blueprint $table) {
            $table->unsignedInteger('funcionario_asignado_id');
            $table->foreign('funcionario_asignado_id', 'funcionario_asignado_fk_725556')->references('id')->on('users');
        });

    }
}
