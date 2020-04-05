<?php

namespace App\Http\Requests;

use App\Fabricacion;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreFabricacionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('fabricacion_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    public function rules()
    {
        return [
            'proyecto_nombre'      => [
                'required'],
            'maquina_asignadas.*'  => [
                'integer'],
            'maquina_asignadas'    => [
                'required',
                'array'],
            'fecha_inicio'         => [
                'required',
                'date_format:' . config('panel.date_format')],
            'duracion'             => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647'],
            'beneficiario_id'      => [
                'required',
                'integer'],
            'tecnico_asignado_id'  => [
                'required',
                'integer'],
            'material_asignados.*' => [
                'integer'],
            'material_asignados'   => [
                'required',
                'array'],
        ];

    }
}
