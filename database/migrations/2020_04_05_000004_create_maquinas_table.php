<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaquinasTable extends Migration
{
    public function up()
    {
        Schema::create('maquinas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo');
            $table->string('nombre');
            $table->string('estado');
            $table->timestamps();
            $table->softDeletes();
        });

    }
}
