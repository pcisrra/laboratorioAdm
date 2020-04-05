<?php

namespace App\Http\Requests;

use App\AsistenciaTecnica;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAsistenciaTecnicaRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('asistencia_tecnica_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:asistencia_tecnicas,id',
        ];
    }
}
