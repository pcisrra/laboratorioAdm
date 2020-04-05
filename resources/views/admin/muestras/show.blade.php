@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.muestra.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.muestras.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.muestra.fields.id') }}
                        </th>
                        <td>
                            {{ $muestra->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.muestra.fields.codigo') }}
                        </th>
                        <td>
                            {{ $muestra->codigo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.muestra.fields.detalle') }}
                        </th>
                        <td>
                            {{ $muestra->detalle }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.muestra.fields.material') }}
                        </th>
                        <td>
                            {{ $muestra->material }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.muestra.fields.estado') }}
                        </th>
                        <td>
                            {{ $muestra->estado }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.muestra.fields.cantidad') }}
                        </th>
                        <td>
                            {{ $muestra->cantidad }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.muestras.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection