<?php

namespace App\Http\Requests;

use App\Solicitude;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySolicitudeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('solicitude_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:solicitudes,id',
        ];
    }
}
