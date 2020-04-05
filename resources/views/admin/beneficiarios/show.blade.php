@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.beneficiario.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.beneficiarios.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiario.fields.id') }}
                        </th>
                        <td>
                            {{ $beneficiario->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiario.fields.nombre_completo') }}
                        </th>
                        <td>
                            {{ $beneficiario->nombre_completo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiario.fields.genero') }}
                        </th>
                        <td>
                            {{ App\Beneficiario::GENERO_RADIO[$beneficiario->genero] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiario.fields.numero_ci') }}
                        </th>
                        <td>
                            {{ $beneficiario->numero_ci }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiario.fields.extension_ci') }}
                        </th>
                        <td>
                            {{ $beneficiario->extension_ci }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiario.fields.fecha_nacimiento') }}
                        </th>
                        <td>
                            {{ $beneficiario->fecha_nacimiento }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiario.fields.num_celular') }}
                        </th>
                        <td>
                            {{ $beneficiario->num_celular }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiario.fields.zona_domicilio') }}
                        </th>
                        <td>
                            {{ $beneficiario->zona_domicilio }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiario.fields.correo_electronico') }}
                        </th>
                        <td>
                            {{ $beneficiario->correo_electronico }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiario.fields.municipio_vive') }}
                        </th>
                        <td>
                            {{ App\Beneficiario::MUNICIPIO_VIVE_SELECT[$beneficiario->municipio_vive] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiario.fields.macrodistrito_vive') }}
                        </th>
                        <td>
                            {{ App\Beneficiario::MACRODISTRITO_VIVE_SELECT[$beneficiario->macrodistrito_vive] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiario.fields.ocupacion') }}
                        </th>
                        <td>
                            {{ App\Beneficiario::OCUPACION_SELECT[$beneficiario->ocupacion] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiario.fields.tipo_beneficiario') }}
                        </th>
                        <td>
                            {{ App\Beneficiario::TIPO_BENEFICIARIO_SELECT[$beneficiario->tipo_beneficiario] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiario.fields.tipo_ingreso') }}
                        </th>
                        <td>
                            {{ App\Beneficiario::TIPO_INGRESO_SELECT[$beneficiario->tipo_ingreso] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiario.fields.estudio_nivel') }}
                        </th>
                        <td>
                            {{ App\Beneficiario::ESTUDIO_NIVEL_RADIO[$beneficiario->estudio_nivel] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiario.fields.universidad') }}
                        </th>
                        <td>
                            {{ $beneficiario->universidad }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiario.fields.carrera') }}
                        </th>
                        <td>
                            {{ $beneficiario->carrera }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiario.fields.semestre') }}
                        </th>
                        <td>
                            {{ $beneficiario->semestre }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiario.fields.datos_proyecto') }}
                        </th>
                        <td>
                            {{ $beneficiario->datos_proyecto }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiario.fields.nombre_proyecto') }}
                        </th>
                        <td>
                            {{ $beneficiario->nombre_proyecto }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiario.fields.descripcion_proyecto') }}
                        </th>
                        <td>
                            {{ $beneficiario->descripcion_proyecto }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiario.fields.rango_emprendimiento') }}
                        </th>
                        <td>
                            {{ App\Beneficiario::RANGO_EMPRENDIMIENTO_RADIO[$beneficiario->rango_emprendimiento] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiario.fields.nombre_emprendimiento') }}
                        </th>
                        <td>
                            {{ $beneficiario->nombre_emprendimiento }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiario.fields.sector_emprendimiento') }}
                        </th>
                        <td>
                            {{ App\Beneficiario::SECTOR_EMPRENDIMIENTO_RADIO[$beneficiario->sector_emprendimiento] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiario.fields.descripcion_emprendimiento') }}
                        </th>
                        <td>
                            {{ $beneficiario->descripcion_emprendimiento }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiario.fields.rubro_emprendimiento') }}
                        </th>
                        <td>
                            {{ $beneficiario->rubro_emprendimiento }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiario.fields.municipio_empresa') }}
                        </th>
                        <td>
                            {{ App\Beneficiario::MUNICIPIO_EMPRESA_RADIO[$beneficiario->municipio_empresa] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiario.fields.macrodistrito_empresa') }}
                        </th>
                        <td>
                            {{ App\Beneficiario::MACRODISTRITO_EMPRESA_RADIO[$beneficiario->macrodistrito_empresa] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiario.fields.direccion_empresa') }}
                        </th>
                        <td>
                            {{ $beneficiario->direccion_empresa }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiario.fields.correo_empresa') }}
                        </th>
                        <td>
                            {{ $beneficiario->correo_empresa }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiario.fields.celular_empresa') }}
                        </th>
                        <td>
                            {{ $beneficiario->celular_empresa }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.beneficiarios.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection