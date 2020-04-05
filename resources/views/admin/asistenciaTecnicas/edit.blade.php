@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.asistenciaTecnica.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.asistencia-tecnicas.update", [$asistenciaTecnica->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="detalle">{{ trans('cruds.asistenciaTecnica.fields.detalle') }}</label>
                <input class="form-control {{ $errors->has('detalle') ? 'is-invalid' : '' }}" type="text" name="detalle" id="detalle" value="{{ old('detalle', $asistenciaTecnica->detalle) }}" required>
                @if($errors->has('detalle'))
                    <div class="invalid-feedback">
                        {{ $errors->first('detalle') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.asistenciaTecnica.fields.detalle_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="descripcion">{{ trans('cruds.asistenciaTecnica.fields.descripcion') }}</label>
                <input class="form-control {{ $errors->has('descripcion') ? 'is-invalid' : '' }}" type="text" name="descripcion" id="descripcion" value="{{ old('descripcion', $asistenciaTecnica->descripcion) }}" required>
                @if($errors->has('descripcion'))
                    <div class="invalid-feedback">
                        {{ $errors->first('descripcion') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.asistenciaTecnica.fields.descripcion_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="fecha">{{ trans('cruds.asistenciaTecnica.fields.fecha') }}</label>
                <input class="form-control date {{ $errors->has('fecha') ? 'is-invalid' : '' }}" type="text" name="fecha" id="fecha" value="{{ old('fecha', $asistenciaTecnica->fecha) }}" required>
                @if($errors->has('fecha'))
                    <div class="invalid-feedback">
                        {{ $errors->first('fecha') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.asistenciaTecnica.fields.fecha_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="cantidad_horas">{{ trans('cruds.asistenciaTecnica.fields.cantidad_horas') }}</label>
                <input class="form-control {{ $errors->has('cantidad_horas') ? 'is-invalid' : '' }}" type="number" name="cantidad_horas" id="cantidad_horas" value="{{ old('cantidad_horas', $asistenciaTecnica->cantidad_horas) }}" step="1" required>
                @if($errors->has('cantidad_horas'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cantidad_horas') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.asistenciaTecnica.fields.cantidad_horas_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="funcionario_asistencia_id">{{ trans('cruds.asistenciaTecnica.fields.funcionario_asistencia') }}</label>
                <select class="form-control select2 {{ $errors->has('funcionario_asistencia') ? 'is-invalid' : '' }}" name="funcionario_asistencia_id" id="funcionario_asistencia_id" required>
                    @foreach($funcionario_asistencias as $id => $funcionario_asistencia)
                        <option value="{{ $id }}" {{ ($asistenciaTecnica->funcionario_asistencia ? $asistenciaTecnica->funcionario_asistencia->id : old('funcionario_asistencia_id')) == $id ? 'selected' : '' }}>{{ $funcionario_asistencia }}</option>
                    @endforeach
                </select>
                @if($errors->has('funcionario_asistencia_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('funcionario_asistencia_id') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.asistenciaTecnica.fields.funcionario_asistencia_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="costo">{{ trans('cruds.asistenciaTecnica.fields.costo') }}</label>
                <input class="form-control {{ $errors->has('costo') ? 'is-invalid' : '' }}" type="number" name="costo" id="costo" value="{{ old('costo', $asistenciaTecnica->costo) }}" step="1" required>
                @if($errors->has('costo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('costo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.asistenciaTecnica.fields.costo_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nombre_cliente_id">{{ trans('cruds.asistenciaTecnica.fields.nombre_cliente') }}</label>
                <select class="form-control select2 {{ $errors->has('nombre_cliente') ? 'is-invalid' : '' }}" name="nombre_cliente_id" id="nombre_cliente_id" required>
                    @foreach($nombre_clientes as $id => $nombre_cliente)
                        <option value="{{ $id }}" {{ ($asistenciaTecnica->nombre_cliente ? $asistenciaTecnica->nombre_cliente->id : old('nombre_cliente_id')) == $id ? 'selected' : '' }}>{{ $nombre_cliente }}</option>
                    @endforeach
                </select>
                @if($errors->has('nombre_cliente_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nombre_cliente_id') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.asistenciaTecnica.fields.nombre_cliente_helper') }}</span>
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