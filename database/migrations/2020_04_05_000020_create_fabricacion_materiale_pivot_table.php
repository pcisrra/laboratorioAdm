<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFabricacionMaterialePivotTable extends Migration
{
    public function up()
    {
        Schema::create('fabricacion_materiale', function (Blueprint $table) {
            $table->unsignedInteger('fabricacion_id');
            $table->foreign('fabricacion_id', 'fabricacion_id_fk_731791')->references('id')->on('fabricacions')->onDelete('cascade');
            $table->unsignedInteger('materiale_id');
            $table->foreign('materiale_id', 'materiale_id_fk_731791')->references('id')->on('materiales')->onDelete('cascade');
        });

    }
}
