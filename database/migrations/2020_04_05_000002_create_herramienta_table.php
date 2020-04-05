<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHerramientaTable extends Migration
{
    public function up()
    {
        Schema::create('herramienta', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo');
            $table->string('descripcion')->nullable();
            $table->integer('cantidad')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

    }
}
