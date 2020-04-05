<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFabricacionMaquinaPivotTable extends Migration
{
    public function up()
    {
        Schema::create('fabricacion_maquina', function (Blueprint $table) {
            $table->unsignedInteger('fabricacion_id');
            $table->foreign('fabricacion_id', 'fabricacion_id_fk_726061')->references('id')->on('fabricacions')->onDelete('cascade');
            $table->unsignedInteger('maquina_id');
            $table->foreign('maquina_id', 'maquina_id_fk_726061')->references('id')->on('maquinas')->onDelete('cascade');
        });

    }
}
