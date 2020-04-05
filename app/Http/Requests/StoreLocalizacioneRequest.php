<?php

namespace App\Http\Requests;

use App\Localizacione;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreLocalizacioneRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('localizacione_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
