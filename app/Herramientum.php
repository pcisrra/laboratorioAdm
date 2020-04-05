<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Herramientum extends Model
{
    use SoftDeletes;

    public $table = 'herramienta';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'codigo',
        'cantidad',
        'created_at',
        'updated_at',
        'deleted_at',
        'descripcion',
        'funcionario_asignado_id',
    ];

    public function funcionario_asignado()
    {
        return $this->belongsTo(User::class, 'funcionario_asignado_id');
    }
}
