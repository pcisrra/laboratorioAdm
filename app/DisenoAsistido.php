<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DisenoAsistido extends Model
{
    use SoftDeletes;

    public $table = 'diseno_asistidos';

    protected $dates = [
        'fecha',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'fecha',
        'costo',
        'created_at',
        'updated_at',
        'deleted_at',
        'descripcion',
        'cantidad_horas',
        'nombre_cliente_id',
        'usuario_asignado_id',
    ];

    public function getFechaAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFechaAttribute($value)
    {
        $this->attributes['fecha'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function usuario_asignado()
    {
        return $this->belongsTo(User::class, 'usuario_asignado_id');
    }

    public function nombre_cliente()
    {
        return $this->belongsTo(Beneficiario::class, 'nombre_cliente_id');
    }
}
