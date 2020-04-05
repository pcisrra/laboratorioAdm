@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.asistenciaTecnica.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.asistencia-tecnicas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.asistenciaTecnica.fields.id') }}
                        </th>
                        <td>
                            {{ $asistenciaTecnica->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.asistenciaTecnica.fields.detalle') }}
                        </th>
                        <td>
                            {{ $asistenciaTecnica->detalle }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.asistenciaTecnica.fields.descripcion') }}
                        </th>
                        <td>
                            {{ $asistenciaTecnica->descripcion }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.asistenciaTecnica.fields.fecha') }}
                        </th>
                        <td>
                            {{ $asistenciaTecnica->fecha }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.asistenciaTecnica.fields.cantidad_horas') }}
                        </th>
                        <td>
                            {{ $asistenciaTecnica->cantidad_horas }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.asistenciaTecnica.fields.funcionario_asistencia') }}
                        </th>
                        <td>
                            {{ $asistenciaTecnica->funcionario_asistencia->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.asistenciaTecnica.fields.costo') }}
                        </th>
                        <td>
                            {{ $asistenciaTecnica->costo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.asistenciaTecnica.fields.nombre_cliente') }}
                        </th>
                        <td>
                            {{ $asistenciaTecnica->nombre_cliente->nombre_completo ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.asistencia-tecnicas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection