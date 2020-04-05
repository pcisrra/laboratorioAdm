<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivosTable extends Migration
{
    public function up()
    {
        Schema::create('activos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo');
            $table->string('clasificacion')->nullable();
            $table->string('descripcion');
            $table->decimal('costo', 15, 2);
            $table->string('ubicacion')->nullable();
            $table->string('estado');
            $table->string('observaciones')->nullable();
            $table->string('activo')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

    }
}
