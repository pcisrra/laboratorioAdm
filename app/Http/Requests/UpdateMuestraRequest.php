<?php

namespace App\Http\Requests;

use App\Muestra;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateMuestraRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('muestra_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
