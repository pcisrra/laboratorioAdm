<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Capacitacion extends Model
{
    use SoftDeletes;

    public $table = 'capacitacions';

    protected $dates = [
        'fecha_fin',
        'created_at',
        'updated_at',
        'deleted_at',
        'fecha_inicio',
    ];

    protected $fillable = [
        'nombre',
        'fecha_fin',
        'created_at',
        'updated_at',
        'deleted_at',
        'fecha_inicio',
        'funcionario_capacitacion_id',
    ];

    public function getFechaInicioAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setFechaInicioAttribute($value)
    {
        $this->attributes['fecha_inicio'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getFechaFinAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setFechaFinAttribute($value)
    {
        $this->attributes['fecha_fin'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function funcionario_capacitacion()
    {
        return $this->belongsTo(User::class, 'funcionario_capacitacion_id');
    }

    public function asistentes()
    {
        return $this->belongsToMany(Beneficiario::class);
    }
}
