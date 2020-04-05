<?php

namespace App\Http\Requests;

use App\Maquina;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateMaquinaRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('maquina_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'codigo' => [
                'required',
            ],
            'nombre' => [
                'required',
            ],
            'estado' => [
                'required',
            ],
        ];
    }
}
