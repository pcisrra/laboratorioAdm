<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fabricacion extends Model
{
    use SoftDeletes;

    public $table = 'fabricacions';

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
        'fecha_inicio',
    ];

    protected $fillable = [
        'duracion',
        'created_at',
        'updated_at',
        'deleted_at',
        'fecha_inicio',
        'proyecto_nombre',
        'beneficiario_id',
        'tecnico_asignado_id',
    ];

    public function maquina_asignadas()
    {
        return $this->belongsToMany(Maquina::class);

    }

    public function getFechaInicioAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;

    }

    public function setFechaInicioAttribute($value)
    {
        $this->attributes['fecha_inicio'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;

    }

    public function beneficiario()
    {
        return $this->belongsTo(Beneficiario::class, 'beneficiario_id');

    }

    public function tecnico_asignado()
    {
        return $this->belongsTo(User::class, 'tecnico_asignado_id');

    }

    public function material_asignados()
    {
        return $this->belongsToMany(Materiale::class);

    }
}
