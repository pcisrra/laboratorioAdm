<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToFabricacionsTable extends Migration
{
    public function up()
    {
        Schema::table('fabricacions', function (Blueprint $table) {
            $table->unsignedInteger('tecnico_asignado_id');
            $table->foreign('tecnico_asignado_id', 'tecnico_asignado_fk_731790')->references('id')->on('users');
            $table->unsignedInteger('beneficiario_id');
            $table->foreign('beneficiario_id', 'beneficiario_fk_1258858')->references('id')->on('beneficiarios');
        });

    }
}
