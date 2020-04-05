@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.capacitacion.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.capacitacions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.capacitacion.fields.id') }}
                        </th>
                        <td>
                            {{ $capacitacion->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.capacitacion.fields.nombre') }}
                        </th>
                        <td>
                            {{ $capacitacion->nombre }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.capacitacion.fields.fecha_inicio') }}
                        </th>
                        <td>
                            {{ $capacitacion->fecha_inicio }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.capacitacion.fields.fecha_fin') }}
                        </th>
                        <td>
                            {{ $capacitacion->fecha_fin }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.capacitacion.fields.funcionario_capacitacion') }}
                        </th>
                        <td>
                            {{ $capacitacion->funcionario_capacitacion->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.capacitacion.fields.asistentes') }}
                        </th>
                        <td>
                            @foreach($capacitacion->asistentes as $key => $asistentes)
                                <span class="label label-info">{{ $asistentes->nombre_completo }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.capacitacions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection