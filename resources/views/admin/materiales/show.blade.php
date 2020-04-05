@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.materiale.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.materiales.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.materiale.fields.id') }}
                        </th>
                        <td>
                            {{ $materiale->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.materiale.fields.codigo') }}
                        </th>
                        <td>
                            {{ $materiale->codigo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.materiale.fields.descripcion') }}
                        </th>
                        <td>
                            {{ $materiale->descripcion }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.materiale.fields.unidad') }}
                        </th>
                        <td>
                            {{ $materiale->unidad }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.materiale.fields.cantidad') }}
                        </th>
                        <td>
                            {{ $materiale->cantidad }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.materiale.fields.localizacion') }}
                        </th>
                        <td>
                            {{ $materiale->localizacion->codigo ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.materiale.fields.costo_unitario') }}
                        </th>
                        <td>
                            {{ $materiale->costo_unitario }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.materiale.fields.costo_promedio') }}
                        </th>
                        <td>
                            {{ $materiale->costo_promedio }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.materiale.fields.costo_total') }}
                        </th>
                        <td>
                            {{ $materiale->costo_total }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.materiales.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection