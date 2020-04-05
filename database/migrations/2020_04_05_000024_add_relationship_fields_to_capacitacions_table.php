<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCapacitacionsTable extends Migration
{
    public function up()
    {
        Schema::table('capacitacions', function (Blueprint $table) {
            $table->unsignedInteger('funcionario_capacitacion_id');
            $table->foreign('funcionario_capacitacion_id', 'funcionario_capacitacion_fk_731788')->references('id')->on('users');
        });

    }
}
