<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Beneficiario extends Model
{
    use SoftDeletes;

    public $table = 'beneficiarios';

    const GENERO_RADIO = [
        'masculino' => 'Masculino',
        'femenino'  => 'Femenino',
    ];

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
        'fecha_nacimiento',
    ];

    const RANGO_EMPRENDIMIENTO_RADIO = [
        'idea'      => 'Idea de Negocio',
        'operativo' => 'Negocio en Marcha',
    ];

    const TIPO_BENEFICIARIO_SELECT = [
        'academico'   => 'Académico/Estudiante',
        'emprendedor' => 'Emprendedor/Investigador',
    ];

    const TIPO_INGRESO_SELECT = [
        'aceleracion'   => 'Plataforma de Aceleración',
        'creacion'      => 'Plataforma de Creación',
        'empleabilidad' => 'Empleabilidad',
    ];

    const MUNICIPIO_VIVE_SELECT = [
        'lapaz'     => 'La Paz',
        'alto'      => 'El Alto',
        'viacha'    => 'Viacha',
        'laja'      => 'Laja',
        'achocalla' => 'Achocalla',
        'mecapaca'  => 'Mecapaca',
        'palca'     => 'Palca',
        'otro'      => 'Otro',
    ];

    const MUNICIPIO_EMPRESA_RADIO = [
        'lapaz'     => 'La Paz',
        'viacha'    => 'Viacha',
        'mecapaca'  => 'Mecapaca',
        'achocalla' => 'Achocalla',
        'elalto'    => 'El Alto',
        'laja'      => 'Laja',
        'palca'     => 'Palca',
        'otro'      => 'Otro',
    ];

    const SECTOR_EMPRENDIMIENTO_RADIO = [
        'manufactura'  => 'Manufactura',
        'servicio'     => 'Servicio',
        'comercio'     => 'Comercio',
        'gastronomia'  => 'Gastronomía',
        'construccion' => 'Construcción',
        'consultoria'  => 'Consultoria',
    ];

    const OCUPACION_SELECT = [
        'estudiante'      => 'Estudiante',
        'artesano'        => 'Artesano',
        'emprendedor'     => 'Emprendedor',
        'empresario'      => 'Empresario',
        'asalariado'      => 'Asalariado',
        'desocupado'      => 'Desocupado',
        'productor_rural' => 'Productor Rural',
    ];

    const ESTUDIO_NIVEL_RADIO = [
        'investigador'         => 'Investigador',
        'docente'              => 'Docente',
        'docente_investigador' => 'Docente Investigador',
        'est_colegio'          => 'Estudiante Colegio',
        'est_pregrado'         => 'Estudiante Pregrado',
        'est_postgrado'        => 'Estudiante Postgrado',
    ];

    const MACRODISTRITO_VIVE_SELECT = [
        'centro'     => 'Centro',
        'cotahuma'   => 'Cotahuma',
        'maxparedes' => 'Max Paredes',
        'sanantonio' => 'San Antonio',
        'periferica' => 'Periférica',
        'sur'        => 'Sur',
        'mallasa'    => 'Mallasa',
        'zongo'      => 'Zongo',
        'hampaturi'  => 'Hampaturi',
        'otro'       => 'Otro',
    ];

    const MACRODISTRITO_EMPRESA_RADIO = [
        'centro'     => 'Centro',
        'cotahuma'   => 'Cotahuma',
        'maxparedes' => 'Max Paredes',
        'sanantonio' => 'San Antonio',
        'periferica' => 'Periférica',
        'sur'        => 'Sur',
        'mallasa'    => 'Mallasa',
        'zongo'      => 'Zongo',
        'hampaturi'  => 'Hampaturi',
        'otro'       => 'Otro',
    ];

    protected $fillable = [
        'genero',
        'carrera',
        'semestre',
        'ocupacion',
        'numero_ci',
        'updated_at',
        'created_at',
        'deleted_at',
        'num_celular',
        'universidad',
        'extension_ci',
        'tipo_ingreso',
        'estudio_nivel',
        'municipio_vive',
        'correo_empresa',
        'zona_domicilio',
        'datos_proyecto',
        'celular_empresa',
        'nombre_completo',
        'nombre_proyecto',
        'fecha_nacimiento',
        'direccion_empresa',
        'municipio_empresa',
        'tipo_beneficiario',
        'macrodistrito_vive',
        'correo_electronico',
        'descripcion_proyecto',
        'rubro_emprendimiento',
        'rango_emprendimiento',
        'nombre_emprendimiento',
        'sector_emprendimiento',
        'macrodistrito_empresa',
        'descripcion_emprendimiento',
    ];

    public function getFechaNacimientoAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;

    }

    public function setFechaNacimientoAttribute($value)
    {
        $this->attributes['fecha_nacimiento'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;

    }
}
