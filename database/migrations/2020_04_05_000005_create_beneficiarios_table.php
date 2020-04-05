<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeneficiariosTable extends Migration
{
    public function up()
    {
        Schema::create('beneficiarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_completo');
            $table->string('genero');
            $table->integer('numero_ci');
            $table->string('extension_ci');
            $table->date('fecha_nacimiento');
            $table->integer('num_celular');
            $table->string('zona_domicilio');
            $table->string('correo_electronico');
            $table->string('municipio_vive');
            $table->string('macrodistrito_vive');
            $table->string('ocupacion');
            $table->string('tipo_beneficiario');
            $table->string('tipo_ingreso');
            $table->string('estudio_nivel')->nullable();
            $table->string('universidad')->nullable();
            $table->string('carrera')->nullable();
            $table->string('semestre')->nullable();
            $table->string('datos_proyecto')->nullable();
            $table->string('nombre_proyecto')->nullable();
            $table->longText('descripcion_proyecto')->nullable();
            $table->string('rango_emprendimiento')->nullable();
            $table->string('nombre_emprendimiento')->nullable();
            $table->string('sector_emprendimiento')->nullable();
            $table->longText('descripcion_emprendimiento')->nullable();
            $table->string('rubro_emprendimiento')->nullable();
            $table->string('municipio_empresa')->nullable();
            $table->string('macrodistrito_empresa')->nullable();
            $table->string('direccion_empresa')->nullable();
            $table->string('correo_empresa')->nullable();
            $table->string('celular_empresa')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

    }
}
