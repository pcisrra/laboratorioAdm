<?php

namespace App\Http\Requests;

use App\Activo;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateActivoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('activo_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'codigo'           => [
                'required',
            ],
            'descripcion'      => [
                'required',
            ],
            'costo'            => [
                'required',
            ],
            'localizacion_id'  => [
                'required',
                'integer',
            ],
            'estado'           => [
                'required',
            ],
            'func_asignado_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
