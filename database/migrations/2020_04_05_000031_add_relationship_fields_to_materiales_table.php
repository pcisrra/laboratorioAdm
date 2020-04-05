<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMaterialesTable extends Migration
{
    public function up()
    {
        Schema::table('materiales', function (Blueprint $table) {
            $table->unsignedInteger('localizacion_id');
            $table->foreign('localizacion_id', 'localizacion_fk_725529')->references('id')->on('localizaciones');
        });

    }
}
