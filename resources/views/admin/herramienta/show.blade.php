@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.herramientum.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.herramienta.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.herramientum.fields.id') }}
                        </th>
                        <td>
                            {{ $herramientum->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.herramientum.fields.codigo') }}
                        </th>
                        <td>
                            {{ $herramientum->codigo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.herramientum.fields.descripcion') }}
                        </th>
                        <td>
                            {{ $herramientum->descripcion }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.herramientum.fields.cantidad') }}
                        </th>
                        <td>
                            {{ $herramientum->cantidad }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.herramientum.fields.funcionario_asignado') }}
                        </th>
                        <td>
                            {{ $herramientum->funcionario_asignado->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.herramienta.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection