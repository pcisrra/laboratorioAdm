<?php

namespace App\Http\Requests;

use App\PlanCompra;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPlanCompraRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('plan_compra_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:plan_compras,id',
        ];
    }
}
