<?php

namespace App\Http\Requests;

use App\Herramientum;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateHerramientumRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('herramientum_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'codigo'                  => [
                'required',
            ],
            'cantidad'                => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'funcionario_asignado_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
