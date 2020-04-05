<?php

namespace App\Http\Requests;

use App\IngresoMateriale;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreIngresoMaterialeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('ingreso_materiale_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'codigo_material_id' => [
                'required',
                'integer',
            ],
            'cantidad'           => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'unidad_ingreso'     => [
                'required',
            ],
            'costo_ingreso'      => [
                'required',
            ],
            'usuario_ingreso_id' => [
                'required',
                'integer',
            ],
            'observaciones'      => [
                'required',
            ],
            'fecha_ingreso'      => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
