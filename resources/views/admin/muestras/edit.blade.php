@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.muestra.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.muestras.update", [$muestra->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="codigo">{{ trans('cruds.muestra.fields.codigo') }}</label>
                <input class="form-control {{ $errors->has('codigo') ? 'is-invalid' : '' }}" type="text" name="codigo" id="codigo" value="{{ old('codigo', $muestra->codigo) }}" required>
                @if($errors->has('codigo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('codigo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.muestra.fields.codigo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="detalle">{{ trans('cruds.muestra.fields.detalle') }}</label>
                <input class="form-control {{ $errors->has('detalle') ? 'is-invalid' : '' }}" type="text" name="detalle" id="detalle" value="{{ old('detalle', $muestra->detalle) }}">
                @if($errors->has('detalle'))
                    <div class="invalid-feedback">
                        {{ $errors->first('detalle') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.muestra.fields.detalle_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="material">{{ trans('cruds.muestra.fields.material') }}</label>
                <input class="form-control {{ $errors->has('material') ? 'is-invalid' : '' }}" type="text" name="material" id="material" value="{{ old('material', $muestra->material) }}">
                @if($errors->has('material'))
                    <div class="invalid-feedback">
                        {{ $errors->first('material') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.muestra.fields.material_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="estado">{{ trans('cruds.muestra.fields.estado') }}</label>
                <input class="form-control {{ $errors->has('estado') ? 'is-invalid' : '' }}" type="text" name="estado" id="estado" value="{{ old('estado', $muestra->estado) }}">
                @if($errors->has('estado'))
                    <div class="invalid-feedback">
                        {{ $errors->first('estado') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.muestra.fields.estado_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cantidad">{{ trans('cruds.muestra.fields.cantidad') }}</label>
                <input class="form-control {{ $errors->has('cantidad') ? 'is-invalid' : '' }}" type="text" name="cantidad" id="cantidad" value="{{ old('cantidad', $muestra->cantidad) }}">
                @if($errors->has('cantidad'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cantidad') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.muestra.fields.cantidad_helper') }}</span>
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