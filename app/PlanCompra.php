<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlanCompra extends Model
{
    use SoftDeletes;

    public $table = 'plan_compras';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'c_util_2',
        'categoria',
        'c_utili_1',
        'stock_seg',
        'created_at',
        'updated_at',
        'deleted_at',
        'cant_compra',
        'costo_total',
        'porcentaje_in',
        'cant_proyectada',
    ];
}
