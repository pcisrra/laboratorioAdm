<?php

namespace App\Http\Requests;

use App\AsistenciaTecnica;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateAsistenciaTecnicaRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('asistencia_tecnica_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'detalle'                   => [
                'required',
            ],
            'descripcion'               => [
                'required',
            ],
            'fecha'                     => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'cantidad_horas'            => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'funcionario_asistencia_id' => [
                'required',
                'integer',
            ],
            'costo'                     => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'nombre_cliente_id'         => [
                'required',
                'integer',
            ],
        ];
    }
}
