<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Solicitude extends Model
{
    use SoftDeletes;

    public $table = 'solicitudes';

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
        'fecha_solicitud',
    ];

    protected $fillable = [
        'ots',
        'created_at',
        'updated_at',
        'deleted_at',
        'observaciones',
        'fecha_solicitud',
        'solicitud_unidad',
        'codigo_material_id',
        'cantidad_solicitud',
        'nombre_solicitante_id',
        'fabricacion_solicitud_id',
    ];

    public function codigo_material()
    {
        return $this->belongsTo(Materiale::class, 'codigo_material_id');
    }

    public function nombre_solicitante()
    {
        return $this->belongsTo(User::class, 'nombre_solicitante_id');
    }

    public function getFechaSolicitudAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFechaSolicitudAttribute($value)
    {
        $this->attributes['fecha_solicitud'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function fabricacion_solicitud()
    {
        return $this->belongsTo(Fabricacion::class, 'fabricacion_solicitud_id');
    }
}
