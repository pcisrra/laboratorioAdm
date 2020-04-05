<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToActivosTable extends Migration
{
    public function up()
    {
        Schema::table('activos', function (Blueprint $table) {
            $table->unsignedInteger('localizacion_id');
            $table->foreign('localizacion_id', 'localizacion_fk_725536')->references('id')->on('localizaciones');
            $table->unsignedInteger('func_asignado_id');
            $table->foreign('func_asignado_id', 'func_asignado_fk_732190')->references('id')->on('users');
        });

    }
}
