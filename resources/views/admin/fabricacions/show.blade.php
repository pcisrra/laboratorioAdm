@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.fabricacion.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.fabricacions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.fabricacion.fields.id') }}
                        </th>
                        <td>
                            {{ $fabricacion->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fabricacion.fields.proyecto_nombre') }}
                        </th>
                        <td>
                            {{ $fabricacion->proyecto_nombre }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fabricacion.fields.maquina_asignada') }}
                        </th>
                        <td>
                            @foreach($fabricacion->maquina_asignadas as $key => $maquina_asignada)
                                <span class="label label-info">{{ $maquina_asignada->nombre }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fabricacion.fields.fecha_inicio') }}
                        </th>
                        <td>
                            {{ $fabricacion->fecha_inicio }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fabricacion.fields.duracion') }}
                        </th>
                        <td>
                            {{ $fabricacion->duracion }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fabricacion.fields.beneficiario') }}
                        </th>
                        <td>
                            {{ $fabricacion->beneficiario->nombre_completo ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fabricacion.fields.tecnico_asignado') }}
                        </th>
                        <td>
                            {{ $fabricacion->tecnico_asignado->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fabricacion.fields.material_asignado') }}
                        </th>
                        <td>
                            @foreach($fabricacion->material_asignados as $key => $material_asignado)
                                <span class="label label-info">{{ $material_asignado->codigo }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.fabricacions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection