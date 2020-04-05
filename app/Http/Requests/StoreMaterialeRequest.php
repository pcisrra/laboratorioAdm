<?php

namespace App\Http\Requests;

use App\Materiale;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreMaterialeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('materiale_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'codigo'          => [
                'required',
            ],
            'descripcion'     => [
                'required',
            ],
            'unidad'          => [
                'max:20',
                'required',
            ],
            'cantidad'        => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'localizacion_id' => [
                'required',
                'integer',
            ],
            'costo_unitario'  => [
                'required',
            ],
        ];
    }
}
