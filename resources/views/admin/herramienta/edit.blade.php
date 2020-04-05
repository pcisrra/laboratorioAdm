@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.herramientum.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.herramienta.update", [$herramientum->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="codigo">{{ trans('cruds.herramientum.fields.codigo') }}</label>
                <input class="form-control {{ $errors->has('codigo') ? 'is-invalid' : '' }}" type="text" name="codigo" id="codigo" value="{{ old('codigo', $herramientum->codigo) }}" required>
                @if($errors->has('codigo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('codigo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.herramientum.fields.codigo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="descripcion">{{ trans('cruds.herramientum.fields.descripcion') }}</label>
                <input class="form-control {{ $errors->has('descripcion') ? 'is-invalid' : '' }}" type="text" name="descripcion" id="descripcion" value="{{ old('descripcion', $herramientum->descripcion) }}">
                @if($errors->has('descripcion'))
                    <div class="invalid-feedback">
                        {{ $errors->first('descripcion') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.herramientum.fields.descripcion_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cantidad">{{ trans('cruds.herramientum.fields.cantidad') }}</label>
                <input class="form-control {{ $errors->has('cantidad') ? 'is-invalid' : '' }}" type="number" name="cantidad" id="cantidad" value="{{ old('cantidad', $herramientum->cantidad) }}" step="1">
                @if($errors->has('cantidad'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cantidad') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.herramientum.fields.cantidad_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="funcionario_asignado_id">{{ trans('cruds.herramientum.fields.funcionario_asignado') }}</label>
                <select class="form-control select2 {{ $errors->has('funcionario_asignado') ? 'is-invalid' : '' }}" name="funcionario_asignado_id" id="funcionario_asignado_id" required>
                    @foreach($funcionario_asignados as $id => $funcionario_asignado)
                        <option value="{{ $id }}" {{ ($herramientum->funcionario_asignado ? $herramientum->funcionario_asignado->id : old('funcionario_asignado_id')) == $id ? 'selected' : '' }}>{{ $funcionario_asignado }}</option>
                    @endforeach
                </select>
                @if($errors->has('funcionario_asignado_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('funcionario_asignado_id') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.herramientum.fields.funcionario_asignado_helper') }}</span>
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