<?php

namespace App\Http\Requests;

use App\PlanCompra;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdatePlanCompraRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('plan_compra_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'categoria'       => [
                'required',
            ],
            'c_utili_1'       => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'c_util_2'        => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'porcentaje_in'   => [
                'required',
            ],
            'cant_proyectada' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'stock_seg'       => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'cant_compra'     => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'costo_total'     => [
                'required',
            ],
        ];
    }
}
