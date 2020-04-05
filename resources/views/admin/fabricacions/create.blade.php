@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.fabricacion.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.fabricacions.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="proyecto_nombre">{{ trans('cruds.fabricacion.fields.proyecto_nombre') }}</label>
                <input class="form-control {{ $errors->has('proyecto_nombre') ? 'is-invalid' : '' }}" type="text" name="proyecto_nombre" id="proyecto_nombre" value="{{ old('proyecto_nombre', '') }}" required>
                @if($errors->has('proyecto_nombre'))
                    <div class="invalid-feedback">
                        {{ $errors->first('proyecto_nombre') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.fabricacion.fields.proyecto_nombre_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="maquina_asignadas">{{ trans('cruds.fabricacion.fields.maquina_asignada') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('maquina_asignadas') ? 'is-invalid' : '' }}" name="maquina_asignadas[]" id="maquina_asignadas" multiple required>
                    @foreach($maquina_asignadas as $id => $maquina_asignada)
                        <option value="{{ $id }}" {{ in_array($id, old('maquina_asignadas', [])) ? 'selected' : '' }}>{{ $maquina_asignada }}</option>
                    @endforeach
                </select>
                @if($errors->has('maquina_asignadas'))
                    <div class="invalid-feedback">
                        {{ $errors->first('maquina_asignadas') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.fabricacion.fields.maquina_asignada_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="fecha_inicio">{{ trans('cruds.fabricacion.fields.fecha_inicio') }}</label>
                <input class="form-control date {{ $errors->has('fecha_inicio') ? 'is-invalid' : '' }}" type="text" name="fecha_inicio" id="fecha_inicio" value="{{ old('fecha_inicio') }}" required>
                @if($errors->has('fecha_inicio'))
                    <div class="invalid-feedback">
                        {{ $errors->first('fecha_inicio') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.fabricacion.fields.fecha_inicio_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="duracion">{{ trans('cruds.fabricacion.fields.duracion') }}</label>
                <input class="form-control {{ $errors->has('duracion') ? 'is-invalid' : '' }}" type="number" name="duracion" id="duracion" value="{{ old('duracion', '0') }}" step="1" required>
                @if($errors->has('duracion'))
                    <div class="invalid-feedback">
                        {{ $errors->first('duracion') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.fabricacion.fields.duracion_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="beneficiario_id">{{ trans('cruds.fabricacion.fields.beneficiario') }}</label>
                <select class="form-control select2 {{ $errors->has('beneficiario') ? 'is-invalid' : '' }}" name="beneficiario_id" id="beneficiario_id" required>
                    @foreach($beneficiarios as $id => $beneficiario)
                        <option value="{{ $id }}" {{ old('beneficiario_id') == $id ? 'selected' : '' }}>{{ $beneficiario }}</option>
                    @endforeach
                </select>
                @if($errors->has('beneficiario'))
                    <div class="invalid-feedback">
                        {{ $errors->first('beneficiario') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.fabricacion.fields.beneficiario_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="tecnico_asignado_id">{{ trans('cruds.fabricacion.fields.tecnico_asignado') }}</label>
                <select class="form-control select2 {{ $errors->has('tecnico_asignado') ? 'is-invalid' : '' }}" name="tecnico_asignado_id" id="tecnico_asignado_id" required>
                    @foreach($tecnico_asignados as $id => $tecnico_asignado)
                        <option value="{{ $id }}" {{ old('tecnico_asignado_id') == $id ? 'selected' : '' }}>{{ $tecnico_asignado }}</option>
                    @endforeach
                </select>
                @if($errors->has('tecnico_asignado'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tecnico_asignado') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.fabricacion.fields.tecnico_asignado_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="material_asignados">{{ trans('cruds.fabricacion.fields.material_asignado') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('material_asignados') ? 'is-invalid' : '' }}" name="material_asignados[]" id="material_asignados" multiple required>
                    @foreach($material_asignados as $id => $material_asignado)
                        <option value="{{ $id }}" {{ in_array($id, old('material_asignados', [])) ? 'selected' : '' }}>{{ $material_asignado }}</option>
                    @endforeach
                </select>
                @if($errors->has('material_asignados'))
                    <div class="invalid-feedback">
                        {{ $errors->first('material_asignados') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.fabricacion.fields.material_asignado_helper') }}</span>
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