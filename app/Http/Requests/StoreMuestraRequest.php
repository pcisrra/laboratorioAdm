<?php

namespace App\Http\Requests;

use App\Muestra;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreMuestraRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('muestra_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'codigo' => [
                'required',
            ],
        ];
    }
}
