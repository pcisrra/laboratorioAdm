<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Activo extends Model
{
    use SoftDeletes;

    public $table = 'activos';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'costo',
        'codigo',
        'activo',
        'estado',
        'ubicacion',
        'created_at',
        'updated_at',
        'deleted_at',
        'descripcion',
        'clasificacion',
        'observaciones',
        'localizacion_id',
        'func_asignado_id',
    ];

    public function localizacion()
    {
        return $this->belongsTo(Localizacione::class, 'localizacion_id');
    }

    public function func_asignado()
    {
        return $this->belongsTo(User::class, 'func_asignado_id');
    }
}
