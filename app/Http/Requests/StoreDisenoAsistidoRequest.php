<?php

namespace App\Http\Requests;

use App\DisenoAsistido;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreDisenoAsistidoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('diseno_asistido_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'descripcion'         => [
                'required',
            ],
            'fecha'               => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'cantidad_horas'      => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'costo'               => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'usuario_asignado_id' => [
                'required',
                'integer',
            ],
            'nombre_cliente_id'   => [
                'required',
                'integer',
            ],
        ];
    }
}
