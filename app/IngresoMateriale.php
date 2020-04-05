<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IngresoMateriale extends Model
{
    use SoftDeletes;

    public $table = 'ingreso_materiales';

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
        'fecha_ingreso',
    ];

    protected $fillable = [
        'cantidad',
        'created_at',
        'updated_at',
        'deleted_at',
        'costo_ingreso',
        'observaciones',
        'fecha_ingreso',
        'unidad_ingreso',
        'codigo_material_id',
        'usuario_ingreso_id',
    ];

    public function codigo_material()
    {
        return $this->belongsTo(Materiale::class, 'codigo_material_id');
    }

    public function usuario_ingreso()
    {
        return $this->belongsTo(User::class, 'usuario_ingreso_id');
    }

    public function getFechaIngresoAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFechaIngresoAttribute($value)
    {
        $this->attributes['fecha_ingreso'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
