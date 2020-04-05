@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.solicitude.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.solicitudes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.solicitude.fields.id') }}
                        </th>
                        <td>
                            {{ $solicitude->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.solicitude.fields.codigo_material') }}
                        </th>
                        <td>
                            {{ $solicitude->codigo_material->codigo ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.solicitude.fields.nombre_solicitante') }}
                        </th>
                        <td>
                            {{ $solicitude->nombre_solicitante->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.solicitude.fields.fecha_solicitud') }}
                        </th>
                        <td>
                            {{ $solicitude->fecha_solicitud }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.solicitude.fields.cantidad_solicitud') }}
                        </th>
                        <td>
                            {{ $solicitude->cantidad_solicitud }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.solicitude.fields.ots') }}
                        </th>
                        <td>
                            {{ $solicitude->ots }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.solicitude.fields.observaciones') }}
                        </th>
                        <td>
                            {{ $solicitude->observaciones }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.solicitude.fields.fabricacion_solicitud') }}
                        </th>
                        <td>
                            {{ $solicitude->fabricacion_solicitud->proyecto_nombre ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.solicitude.fields.solicitud_unidad') }}
                        </th>
                        <td>
                            {{ $solicitude->solicitud_unidad }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.solicitudes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection