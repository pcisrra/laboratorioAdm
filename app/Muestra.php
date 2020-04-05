<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Muestra extends Model
{
    use SoftDeletes;

    public $table = 'muestras';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'codigo',
        'estado',
        'detalle',
        'material',
        'cantidad',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
