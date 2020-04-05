<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Materiale extends Model
{
    use SoftDeletes;

    public $table = 'materiales';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'codigo',
        'unidad',
        'cantidad',
        'created_at',
        'updated_at',
        'deleted_at',
        'descripcion',
        'costo_total',
        'costo_unitario',
        'costo_promedio',
        'localizacion_id',
    ];

    public function localizacion()
    {
        return $this->belongsTo(Localizacione::class, 'localizacion_id');

    }
}
