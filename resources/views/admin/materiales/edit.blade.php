@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.materiale.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.materiales.update", [$materiale->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="codigo">{{ trans('cruds.materiale.fields.codigo') }}</label>
                <input class="form-control {{ $errors->has('codigo') ? 'is-invalid' : '' }}" type="text" name="codigo" id="codigo" value="{{ old('codigo', $materiale->codigo) }}" required>
                @if($errors->has('codigo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('codigo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.materiale.fields.codigo_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="descripcion">{{ trans('cruds.materiale.fields.descripcion') }}</label>
                <input class="form-control {{ $errors->has('descripcion') ? 'is-invalid' : '' }}" type="text" name="descripcion" id="descripcion" value="{{ old('descripcion', $materiale->descripcion) }}" required>
                @if($errors->has('descripcion'))
                    <div class="invalid-feedback">
                        {{ $errors->first('descripcion') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.materiale.fields.descripcion_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="unidad">{{ trans('cruds.materiale.fields.unidad') }}</label>
                <input class="form-control {{ $errors->has('unidad') ? 'is-invalid' : '' }}" type="text" name="unidad" id="unidad" value="{{ old('unidad', $materiale->unidad) }}" required>
                @if($errors->has('unidad'))
                    <div class="invalid-feedback">
                        {{ $errors->first('unidad') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.materiale.fields.unidad_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="cantidad">{{ trans('cruds.materiale.fields.cantidad') }}</label>
                <input class="form-control {{ $errors->has('cantidad') ? 'is-invalid' : '' }}" type="number" name="cantidad" id="cantidad" value="{{ old('cantidad', $materiale->cantidad) }}" step="1" required>
                @if($errors->has('cantidad'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cantidad') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.materiale.fields.cantidad_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="localizacion_id">{{ trans('cruds.materiale.fields.localizacion') }}</label>
                <select class="form-control select2 {{ $errors->has('localizacion') ? 'is-invalid' : '' }}" name="localizacion_id" id="localizacion_id" required>
                    @foreach($localizacions as $id => $localizacion)
                        <option value="{{ $id }}" {{ ($materiale->localizacion ? $materiale->localizacion->id : old('localizacion_id')) == $id ? 'selected' : '' }}>{{ $localizacion }}</option>
                    @endforeach
                </select>
                @if($errors->has('localizacion_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('localizacion_id') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.materiale.fields.localizacion_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="costo_unitario">{{ trans('cruds.materiale.fields.costo_unitario') }}</label>
                <input class="form-control {{ $errors->has('costo_unitario') ? 'is-invalid' : '' }}" type="number" name="costo_unitario" id="costo_unitario" value="{{ old('costo_unitario', $materiale->costo_unitario) }}" step="0.01" required>
                @if($errors->has('costo_unitario'))
                    <div class="invalid-feedback">
                        {{ $errors->first('costo_unitario') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.materiale.fields.costo_unitario_helper') }}</span>
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