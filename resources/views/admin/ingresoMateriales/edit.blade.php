@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.ingresoMateriale.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.ingreso-materiales.update", [$ingresoMateriale->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="codigo_material_id">{{ trans('cruds.ingresoMateriale.fields.codigo_material') }}</label>
                <select class="form-control select2 {{ $errors->has('codigo_material') ? 'is-invalid' : '' }}" name="codigo_material_id" id="codigo_material_id" required>
                    @foreach($codigo_materials as $id => $codigo_material)
                        <option value="{{ $id }}" {{ ($ingresoMateriale->codigo_material ? $ingresoMateriale->codigo_material->id : old('codigo_material_id')) == $id ? 'selected' : '' }}>{{ $codigo_material }}</option>
                    @endforeach
                </select>
                @if($errors->has('codigo_material_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('codigo_material_id') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.ingresoMateriale.fields.codigo_material_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="cantidad">{{ trans('cruds.ingresoMateriale.fields.cantidad') }}</label>
                <input class="form-control {{ $errors->has('cantidad') ? 'is-invalid' : '' }}" type="number" name="cantidad" id="cantidad" value="{{ old('cantidad', $ingresoMateriale->cantidad) }}" step="1" required>
                @if($errors->has('cantidad'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cantidad') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.ingresoMateriale.fields.cantidad_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="unidad_ingreso">{{ trans('cruds.ingresoMateriale.fields.unidad_ingreso') }}</label>
                <input class="form-control {{ $errors->has('unidad_ingreso') ? 'is-invalid' : '' }}" type="text" name="unidad_ingreso" id="unidad_ingreso" value="{{ old('unidad_ingreso', $ingresoMateriale->unidad_ingreso) }}" required>
                @if($errors->has('unidad_ingreso'))
                    <div class="invalid-feedback">
                        {{ $errors->first('unidad_ingreso') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.ingresoMateriale.fields.unidad_ingreso_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="costo_ingreso">{{ trans('cruds.ingresoMateriale.fields.costo_ingreso') }}</label>
                <input class="form-control {{ $errors->has('costo_ingreso') ? 'is-invalid' : '' }}" type="number" name="costo_ingreso" id="costo_ingreso" value="{{ old('costo_ingreso', $ingresoMateriale->costo_ingreso) }}" step="0.01" required>
                @if($errors->has('costo_ingreso'))
                    <div class="invalid-feedback">
                        {{ $errors->first('costo_ingreso') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.ingresoMateriale.fields.costo_ingreso_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="usuario_ingreso_id">{{ trans('cruds.ingresoMateriale.fields.usuario_ingreso') }}</label>
                <select class="form-control select2 {{ $errors->has('usuario_ingreso') ? 'is-invalid' : '' }}" name="usuario_ingreso_id" id="usuario_ingreso_id" required>
                    @foreach($usuario_ingresos as $id => $usuario_ingreso)
                        <option value="{{ $id }}" {{ ($ingresoMateriale->usuario_ingreso ? $ingresoMateriale->usuario_ingreso->id : old('usuario_ingreso_id')) == $id ? 'selected' : '' }}>{{ $usuario_ingreso }}</option>
                    @endforeach
                </select>
                @if($errors->has('usuario_ingreso_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('usuario_ingreso_id') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.ingresoMateriale.fields.usuario_ingreso_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="observaciones">{{ trans('cruds.ingresoMateriale.fields.observaciones') }}</label>
                <input class="form-control {{ $errors->has('observaciones') ? 'is-invalid' : '' }}" type="text" name="observaciones" id="observaciones" value="{{ old('observaciones', $ingresoMateriale->observaciones) }}" required>
                @if($errors->has('observaciones'))
                    <div class="invalid-feedback">
                        {{ $errors->first('observaciones') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.ingresoMateriale.fields.observaciones_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="fecha_ingreso">{{ trans('cruds.ingresoMateriale.fields.fecha_ingreso') }}</label>
                <input class="form-control date {{ $errors->has('fecha_ingreso') ? 'is-invalid' : '' }}" type="text" name="fecha_ingreso" id="fecha_ingreso" value="{{ old('fecha_ingreso', $ingresoMateriale->fecha_ingreso) }}" required>
                @if($errors->has('fecha_ingreso'))
                    <div class="invalid-feedback">
                        {{ $errors->first('fecha_ingreso') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.ingresoMateriale.fields.fecha_ingreso_helper') }}</span>
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