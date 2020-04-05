@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.ingresoMateriale.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.ingreso-materiales.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.ingresoMateriale.fields.id') }}
                        </th>
                        <td>
                            {{ $ingresoMateriale->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ingresoMateriale.fields.codigo_material') }}
                        </th>
                        <td>
                            {{ $ingresoMateriale->codigo_material->codigo ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ingresoMateriale.fields.cantidad') }}
                        </th>
                        <td>
                            {{ $ingresoMateriale->cantidad }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ingresoMateriale.fields.unidad_ingreso') }}
                        </th>
                        <td>
                            {{ $ingresoMateriale->unidad_ingreso }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ingresoMateriale.fields.costo_ingreso') }}
                        </th>
                        <td>
                            {{ $ingresoMateriale->costo_ingreso }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ingresoMateriale.fields.usuario_ingreso') }}
                        </th>
                        <td>
                            {{ $ingresoMateriale->usuario_ingreso->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ingresoMateriale.fields.observaciones') }}
                        </th>
                        <td>
                            {{ $ingresoMateriale->observaciones }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ingresoMateriale.fields.fecha_ingreso') }}
                        </th>
                        <td>
                            {{ $ingresoMateriale->fecha_ingreso }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.ingreso-materiales.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection