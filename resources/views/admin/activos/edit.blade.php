@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.activo.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.activos.update", [$activo->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="codigo">{{ trans('cruds.activo.fields.codigo') }}</label>
                <input class="form-control {{ $errors->has('codigo') ? 'is-invalid' : '' }}" type="text" name="codigo" id="codigo" value="{{ old('codigo', $activo->codigo) }}" required>
                @if($errors->has('codigo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('codigo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.activo.fields.codigo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="clasificacion">{{ trans('cruds.activo.fields.clasificacion') }}</label>
                <input class="form-control {{ $errors->has('clasificacion') ? 'is-invalid' : '' }}" type="text" name="clasificacion" id="clasificacion" value="{{ old('clasificacion', $activo->clasificacion) }}">
                @if($errors->has('clasificacion'))
                    <div class="invalid-feedback">
                        {{ $errors->first('clasificacion') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.activo.fields.clasificacion_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="activo">{{ trans('cruds.activo.fields.activo') }}</label>
                <input class="form-control {{ $errors->has('activo') ? 'is-invalid' : '' }}" type="text" name="activo" id="activo" value="{{ old('activo', $activo->activo) }}">
                @if($errors->has('activo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('activo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.activo.fields.activo_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="descripcion">{{ trans('cruds.activo.fields.descripcion') }}</label>
                <input class="form-control {{ $errors->has('descripcion') ? 'is-invalid' : '' }}" type="text" name="descripcion" id="descripcion" value="{{ old('descripcion', $activo->descripcion) }}" required>
                @if($errors->has('descripcion'))
                    <div class="invalid-feedback">
                        {{ $errors->first('descripcion') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.activo.fields.descripcion_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="costo">{{ trans('cruds.activo.fields.costo') }}</label>
                <input class="form-control {{ $errors->has('costo') ? 'is-invalid' : '' }}" type="number" name="costo" id="costo" value="{{ old('costo', $activo->costo) }}" step="0.01" required>
                @if($errors->has('costo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('costo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.activo.fields.costo_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="localizacion_id">{{ trans('cruds.activo.fields.localizacion') }}</label>
                <select class="form-control select2 {{ $errors->has('localizacion') ? 'is-invalid' : '' }}" name="localizacion_id" id="localizacion_id" required>
                    @foreach($localizacions as $id => $localizacion)
                        <option value="{{ $id }}" {{ ($activo->localizacion ? $activo->localizacion->id : old('localizacion_id')) == $id ? 'selected' : '' }}>{{ $localizacion }}</option>
                    @endforeach
                </select>
                @if($errors->has('localizacion_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('localizacion_id') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.activo.fields.localizacion_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ubicacion">{{ trans('cruds.activo.fields.ubicacion') }}</label>
                <input class="form-control {{ $errors->has('ubicacion') ? 'is-invalid' : '' }}" type="text" name="ubicacion" id="ubicacion" value="{{ old('ubicacion', $activo->ubicacion) }}">
                @if($errors->has('ubicacion'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ubicacion') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.activo.fields.ubicacion_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="estado">{{ trans('cruds.activo.fields.estado') }}</label>
                <input class="form-control {{ $errors->has('estado') ? 'is-invalid' : '' }}" type="text" name="estado" id="estado" value="{{ old('estado', $activo->estado) }}" required>
                @if($errors->has('estado'))
                    <div class="invalid-feedback">
                        {{ $errors->first('estado') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.activo.fields.estado_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="observaciones">{{ trans('cruds.activo.fields.observaciones') }}</label>
                <input class="form-control {{ $errors->has('observaciones') ? 'is-invalid' : '' }}" type="text" name="observaciones" id="observaciones" value="{{ old('observaciones', $activo->observaciones) }}">
                @if($errors->has('observaciones'))
                    <div class="invalid-feedback">
                        {{ $errors->first('observaciones') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.activo.fields.observaciones_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="func_asignado_id">{{ trans('cruds.activo.fields.func_asignado') }}</label>
                <select class="form-control select2 {{ $errors->has('func_asignado') ? 'is-invalid' : '' }}" name="func_asignado_id" id="func_asignado_id" required>
                    @foreach($func_asignados as $id => $func_asignado)
                        <option value="{{ $id }}" {{ ($activo->func_asignado ? $activo->func_asignado->id : old('func_asignado_id')) == $id ? 'selected' : '' }}>{{ $func_asignado }}</option>
                    @endforeach
                </select>
                @if($errors->has('func_asignado_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('func_asignado_id') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.activo.fields.func_asignado_helper') }}</span>
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