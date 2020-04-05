@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.solicitude.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.solicitudes.update", [$solicitude->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="codigo_material_id">{{ trans('cruds.solicitude.fields.codigo_material') }}</label>
                <select class="form-control select2 {{ $errors->has('codigo_material') ? 'is-invalid' : '' }}" name="codigo_material_id" id="codigo_material_id" required>
                    @foreach($codigo_materials as $id => $codigo_material)
                        <option value="{{ $id }}" {{ ($solicitude->codigo_material ? $solicitude->codigo_material->id : old('codigo_material_id')) == $id ? 'selected' : '' }}>{{ $codigo_material }}</option>
                    @endforeach
                </select>
                @if($errors->has('codigo_material_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('codigo_material_id') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.solicitude.fields.codigo_material_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nombre_solicitante_id">{{ trans('cruds.solicitude.fields.nombre_solicitante') }}</label>
                <select class="form-control select2 {{ $errors->has('nombre_solicitante') ? 'is-invalid' : '' }}" name="nombre_solicitante_id" id="nombre_solicitante_id" required>
                    @foreach($nombre_solicitantes as $id => $nombre_solicitante)
                        <option value="{{ $id }}" {{ ($solicitude->nombre_solicitante ? $solicitude->nombre_solicitante->id : old('nombre_solicitante_id')) == $id ? 'selected' : '' }}>{{ $nombre_solicitante }}</option>
                    @endforeach
                </select>
                @if($errors->has('nombre_solicitante_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nombre_solicitante_id') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.solicitude.fields.nombre_solicitante_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="fecha_solicitud">{{ trans('cruds.solicitude.fields.fecha_solicitud') }}</label>
                <input class="form-control date {{ $errors->has('fecha_solicitud') ? 'is-invalid' : '' }}" type="text" name="fecha_solicitud" id="fecha_solicitud" value="{{ old('fecha_solicitud', $solicitude->fecha_solicitud) }}" required>
                @if($errors->has('fecha_solicitud'))
                    <div class="invalid-feedback">
                        {{ $errors->first('fecha_solicitud') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.solicitude.fields.fecha_solicitud_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="cantidad_solicitud">{{ trans('cruds.solicitude.fields.cantidad_solicitud') }}</label>
                <input class="form-control {{ $errors->has('cantidad_solicitud') ? 'is-invalid' : '' }}" type="number" name="cantidad_solicitud" id="cantidad_solicitud" value="{{ old('cantidad_solicitud', $solicitude->cantidad_solicitud) }}" step="1" required>
                @if($errors->has('cantidad_solicitud'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cantidad_solicitud') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.solicitude.fields.cantidad_solicitud_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ots">{{ trans('cruds.solicitude.fields.ots') }}</label>
                <input class="form-control {{ $errors->has('ots') ? 'is-invalid' : '' }}" type="text" name="ots" id="ots" value="{{ old('ots', $solicitude->ots) }}">
                @if($errors->has('ots'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ots') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.solicitude.fields.ots_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="observaciones">{{ trans('cruds.solicitude.fields.observaciones') }}</label>
                <input class="form-control {{ $errors->has('observaciones') ? 'is-invalid' : '' }}" type="text" name="observaciones" id="observaciones" value="{{ old('observaciones', $solicitude->observaciones) }}">
                @if($errors->has('observaciones'))
                    <div class="invalid-feedback">
                        {{ $errors->first('observaciones') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.solicitude.fields.observaciones_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="fabricacion_solicitud_id">{{ trans('cruds.solicitude.fields.fabricacion_solicitud') }}</label>
                <select class="form-control select2 {{ $errors->has('fabricacion_solicitud') ? 'is-invalid' : '' }}" name="fabricacion_solicitud_id" id="fabricacion_solicitud_id" required>
                    @foreach($fabricacion_solicituds as $id => $fabricacion_solicitud)
                        <option value="{{ $id }}" {{ ($solicitude->fabricacion_solicitud ? $solicitude->fabricacion_solicitud->id : old('fabricacion_solicitud_id')) == $id ? 'selected' : '' }}>{{ $fabricacion_solicitud }}</option>
                    @endforeach
                </select>
                @if($errors->has('fabricacion_solicitud_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('fabricacion_solicitud_id') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.solicitude.fields.fabricacion_solicitud_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="solicitud_unidad">{{ trans('cruds.solicitude.fields.solicitud_unidad') }}</label>
                <input class="form-control {{ $errors->has('solicitud_unidad') ? 'is-invalid' : '' }}" type="text" name="solicitud_unidad" id="solicitud_unidad" value="{{ old('solicitud_unidad', $solicitude->solicitud_unidad) }}" required>
                @if($errors->has('solicitud_unidad'))
                    <div class="invalid-feedback">
                        {{ $errors->first('solicitud_unidad') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.solicitude.fields.solicitud_unidad_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection