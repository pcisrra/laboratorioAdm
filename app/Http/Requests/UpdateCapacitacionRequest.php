<?php

namespace App\Http\Requests;

use App\Capacitacion;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateCapacitacionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('capacitacion_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'nombre'                      => [
                'required',
            ],
            'fecha_inicio'                => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'fecha_fin'                   => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'funcionario_capacitacion_id' => [
                'required',
                'integer',
            ],
            'asistentes.*'                => [
                'integer',
            ],
            'asistentes'                  => [
                'required',
                'array',
            ],
        ];
    }
}
