@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.activo.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.activos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.activo.fields.id') }}
                        </th>
                        <td>
                            {{ $activo->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.activo.fields.codigo') }}
                        </th>
                        <td>
                            {{ $activo->codigo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.activo.fields.clasificacion') }}
                        </th>
                        <td>
                            {{ $activo->clasificacion }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.activo.fields.activo') }}
                        </th>
                        <td>
                            {{ $activo->activo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.activo.fields.descripcion') }}
                        </th>
                        <td>
                            {{ $activo->descripcion }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.activo.fields.costo') }}
                        </th>
                        <td>
                            {{ $activo->costo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.activo.fields.localizacion') }}
                        </th>
                        <td>
                            {{ $activo->localizacion->codigo ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.activo.fields.ubicacion') }}
                        </th>
                        <td>
                            {{ $activo->ubicacion }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.activo.fields.estado') }}
                        </th>
                        <td>
                            {{ $activo->estado }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.activo.fields.observaciones') }}
                        </th>
                        <td>
                            {{ $activo->observaciones }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.activo.fields.func_asignado') }}
                        </th>
                        <td>
                            {{ $activo->func_asignado->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.activos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection