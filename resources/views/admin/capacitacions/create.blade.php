@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.capacitacion.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.capacitacions.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="nombre">{{ trans('cruds.capacitacion.fields.nombre') }}</label>
                <input class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}" type="text" name="nombre" id="nombre" value="{{ old('nombre', '') }}" required>
                @if($errors->has('nombre'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nombre') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.capacitacion.fields.nombre_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="fecha_inicio">{{ trans('cruds.capacitacion.fields.fecha_inicio') }}</label>
                <input class="form-control datetime {{ $errors->has('fecha_inicio') ? 'is-invalid' : '' }}" type="text" name="fecha_inicio" id="fecha_inicio" value="{{ old('fecha_inicio') }}" required>
                @if($errors->has('fecha_inicio'))
                    <div class="invalid-feedback">
                        {{ $errors->first('fecha_inicio') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.capacitacion.fields.fecha_inicio_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="fecha_fin">{{ trans('cruds.capacitacion.fields.fecha_fin') }}</label>
                <input class="form-control datetime {{ $errors->has('fecha_fin') ? 'is-invalid' : '' }}" type="text" name="fecha_fin" id="fecha_fin" value="{{ old('fecha_fin') }}" required>
                @if($errors->has('fecha_fin'))
                    <div class="invalid-feedback">
                        {{ $errors->first('fecha_fin') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.capacitacion.fields.fecha_fin_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="funcionario_capacitacion_id">{{ trans('cruds.capacitacion.fields.funcionario_capacitacion') }}</label>
                <select class="form-control select2 {{ $errors->has('funcionario_capacitacion') ? 'is-invalid' : '' }}" name="funcionario_capacitacion_id" id="funcionario_capacitacion_id" required>
                    @foreach($funcionario_capacitacions as $id => $funcionario_capacitacion)
                        <option value="{{ $id }}" {{ old('funcionario_capacitacion_id') == $id ? 'selected' : '' }}>{{ $funcionario_capacitacion }}</option>
                    @endforeach
                </select>
                @if($errors->has('funcionario_capacitacion_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('funcionario_capacitacion_id') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.capacitacion.fields.funcionario_capacitacion_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="asistentes">{{ trans('cruds.capacitacion.fields.asistentes') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('asistentes') ? 'is-invalid' : '' }}" name="asistentes[]" id="asistentes" multiple required>
                    @foreach($asistentes as $id => $asistentes)
                        <option value="{{ $id }}" {{ in_array($id, old('asistentes', [])) ? 'selected' : '' }}>{{ $asistentes }}</option>
                    @endforeach
                </select>
                @if($errors->has('asistentes'))
                    <div class="invalid-feedback">
                        {{ $errors->first('asistentes') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.capacitacion.fields.asistentes_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    CREAR
                </button>
            </div>
        </form>
    </div>
</div>



@endsection