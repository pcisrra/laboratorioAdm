<?php

namespace App\Http\Requests;

use App\Beneficiario;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreBeneficiarioRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('beneficiario_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    public function rules()
    {
        return [
            'nombre_completo'    => [
                'required'],
            'genero'             => [
                'required'],
            'numero_ci'          => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647'],
            'extension_ci'       => [
                'max:2',
                'required'],
            'fecha_nacimiento'   => [
                'required',
                'date_format:' . config('panel.date_format')],
            'num_celular'        => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647'],
            'zona_domicilio'     => [
                'required'],
            'correo_electronico' => [
                'required'],
            'municipio_vive'     => [
                'required'],
            'macrodistrito_vive' => [
                'required'],
            'ocupacion'          => [
                'required'],
            'tipo_beneficiario'  => [
                'required'],
            'tipo_ingreso'       => [
                'required'],
        ];

    }
}
