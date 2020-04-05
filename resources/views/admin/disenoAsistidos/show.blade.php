@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.disenoAsistido.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.diseno-asistidos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.disenoAsistido.fields.id') }}
                        </th>
                        <td>
                            {{ $disenoAsistido->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.disenoAsistido.fields.descripcion') }}
                        </th>
                        <td>
                            {{ $disenoAsistido->descripcion }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.disenoAsistido.fields.fecha') }}
                        </th>
                        <td>
                            {{ $disenoAsistido->fecha }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.disenoAsistido.fields.cantidad_horas') }}
                        </th>
                        <td>
                            {{ $disenoAsistido->cantidad_horas }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.disenoAsistido.fields.costo') }}
                        </th>
                        <td>
                            {{ $disenoAsistido->costo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.disenoAsistido.fields.usuario_asignado') }}
                        </th>
                        <td>
                            {{ $disenoAsistido->usuario_asignado->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.disenoAsistido.fields.nombre_cliente') }}
                        </th>
                        <td>
                            {{ $disenoAsistido->nombre_cliente->nombre_completo ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.diseno-asistidos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection