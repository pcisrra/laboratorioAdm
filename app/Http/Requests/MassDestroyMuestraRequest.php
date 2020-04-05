<?php

namespace App\Http\Requests;

use App\Muestra;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyMuestraRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('muestra_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:muestras,id',
        ];
    }
}
