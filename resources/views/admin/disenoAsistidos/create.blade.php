@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.disenoAsistido.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.diseno-asistidos.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="descripcion">{{ trans('cruds.disenoAsistido.fields.descripcion') }}</label>
                <input class="form-control {{ $errors->has('descripcion') ? 'is-invalid' : '' }}" type="text" name="descripcion" id="descripcion" value="{{ old('descripcion', '') }}" required>
                @if($errors->has('descripcion'))
                    <div class="invalid-feedback">
                        {{ $errors->first('descripcion') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.disenoAsistido.fields.descripcion_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="fecha">{{ trans('cruds.disenoAsistido.fields.fecha') }}</label>
                <input class="form-control date {{ $errors->has('fecha') ? 'is-invalid' : '' }}" type="text" name="fecha" id="fecha" value="{{ old('fecha') }}" required>
                @if($errors->has('fecha'))
                    <div class="invalid-feedback">
                        {{ $errors->first('fecha') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.disenoAsistido.fields.fecha_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="cantidad_horas">{{ trans('cruds.disenoAsistido.fields.cantidad_horas') }}</label>
                <input class="form-control {{ $errors->has('cantidad_horas') ? 'is-invalid' : '' }}" type="number" name="cantidad_horas" id="cantidad_horas" value="{{ old('cantidad_horas') }}" step="1" required>
                @if($errors->has('cantidad_horas'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cantidad_horas') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.disenoAsistido.fields.cantidad_horas_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="costo">{{ trans('cruds.disenoAsistido.fields.costo') }}</label>
                <input class="form-control {{ $errors->has('costo') ? 'is-invalid' : '' }}" type="number" name="costo" id="costo" value="{{ old('costo') }}" step="1" required>
                @if($errors->has('costo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('costo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.disenoAsistido.fields.costo_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="usuario_asignado_id">{{ trans('cruds.disenoAsistido.fields.usuario_asignado') }}</label>
                <select class="form-control select2 {{ $errors->has('usuario_asignado') ? 'is-invalid' : '' }}" name="usuario_asignado_id" id="usuario_asignado_id" required>
                    @foreach($usuario_asignados as $id => $usuario_asignado)
                        <option value="{{ $id }}" {{ old('usuario_asignado_id') == $id ? 'selected' : '' }}>{{ $usuario_asignado }}</option>
                    @endforeach
                </select>
                @if($errors->has('usuario_asignado_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('usuario_asignado_id') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.disenoAsistido.fields.usuario_asignado_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nombre_cliente_id">{{ trans('cruds.disenoAsistido.fields.nombre_cliente') }}</label>
                <select class="form-control select2 {{ $errors->has('nombre_cliente') ? 'is-invalid' : '' }}" name="nombre_cliente_id" id="nombre_cliente_id" required>
                    @foreach($nombre_clientes as $id => $nombre_cliente)
                        <option value="{{ $id }}" {{ old('nombre_cliente_id') == $id ? 'selected' : '' }}>{{ $nombre_cliente }}</option>
                    @endforeach
                </select>
                @if($errors->has('nombre_cliente_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nombre_cliente_id') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.disenoAsistido.fields.nombre_cliente_helper') }}</span>
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