<?php

namespace App\Http\Requests;

use App\IngresoMateriale;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyIngresoMaterialeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('ingreso_materiale_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:ingreso_materiales,id',
        ];
    }
}
