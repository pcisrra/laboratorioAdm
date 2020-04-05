<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeneficiarioCapacitacionPivotTable extends Migration
{
    public function up()
    {
        Schema::create('beneficiario_capacitacion', function (Blueprint $table) {
            $table->unsignedInteger('capacitacion_id');
            $table->foreign('capacitacion_id', 'capacitacion_id_fk_731789')->references('id')->on('capacitacions')->onDelete('cascade');
            $table->unsignedInteger('beneficiario_id');
            $table->foreign('beneficiario_id', 'beneficiario_id_fk_731789')->references('id')->on('beneficiarios')->onDelete('cascade');
        });

    }
}
