<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocalizacionesTable extends Migration
{
    public function up()
    {
        Schema::create('localizaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion')->nullable();
            $table->string('codigo');
            $table->timestamps();
            $table->softDeletes();
        });

    }
}
