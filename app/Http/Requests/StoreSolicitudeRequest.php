<?php

namespace App\Http\Requests;

use App\Solicitude;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreSolicitudeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('solicitude_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'codigo_material_id'       => [
                'required',
                'integer',
            ],
            'nombre_solicitante_id'    => [
                'required',
                'integer',
            ],
            'fecha_solicitud'          => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'cantidad_solicitud'       => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'fabricacion_solicitud_id' => [
                'required',
                'integer',
            ],
            'solicitud_unidad'         => [
                'max:30',
                'required',
            ],
        ];
    }
}
