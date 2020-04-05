@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.beneficiario.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.beneficiarios.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="nombre_completo">{{ trans('cruds.beneficiario.fields.nombre_completo') }}</label>
                <input class="form-control {{ $errors->has('nombre_completo') ? 'is-invalid' : '' }}" type="text" name="nombre_completo" id="nombre_completo" value="{{ old('nombre_completo', '') }}" required>
                @if($errors->has('nombre_completo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nombre_completo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiario.fields.nombre_completo_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.beneficiario.fields.genero') }}</label>
                @foreach(App\Beneficiario::GENERO_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('genero') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="genero_{{ $key }}" name="genero" value="{{ $key }}" {{ old('genero', '') === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="genero_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('genero'))
                    <div class="invalid-feedback">
                        {{ $errors->first('genero') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiario.fields.genero_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="numero_ci">{{ trans('cruds.beneficiario.fields.numero_ci') }}</label>
                <input class="form-control {{ $errors->has('numero_ci') ? 'is-invalid' : '' }}" type="number" name="numero_ci" id="numero_ci" value="{{ old('numero_ci', '0') }}" step="1" required>
                @if($errors->has('numero_ci'))
                    <div class="invalid-feedback">
                        {{ $errors->first('numero_ci') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiario.fields.numero_ci_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="extension_ci">{{ trans('cruds.beneficiario.fields.extension_ci') }}</label>
                <input class="form-control {{ $errors->has('extension_ci') ? 'is-invalid' : '' }}" type="text" name="extension_ci" id="extension_ci" value="{{ old('extension_ci', '') }}" required>
                @if($errors->has('extension_ci'))
                    <div class="invalid-feedback">
                        {{ $errors->first('extension_ci') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiario.fields.extension_ci_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="fecha_nacimiento">{{ trans('cruds.beneficiario.fields.fecha_nacimiento') }}</label>
                <input class="form-control date {{ $errors->has('fecha_nacimiento') ? 'is-invalid' : '' }}" type="text" name="fecha_nacimiento" id="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" required>
                @if($errors->has('fecha_nacimiento'))
                    <div class="invalid-feedback">
                        {{ $errors->first('fecha_nacimiento') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiario.fields.fecha_nacimiento_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="num_celular">{{ trans('cruds.beneficiario.fields.num_celular') }}</label>
                <input class="form-control {{ $errors->has('num_celular') ? 'is-invalid' : '' }}" type="number" name="num_celular" id="num_celular" value="{{ old('num_celular', '0') }}" step="1" required>
                @if($errors->has('num_celular'))
                    <div class="invalid-feedback">
                        {{ $errors->first('num_celular') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiario.fields.num_celular_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="zona_domicilio">{{ trans('cruds.beneficiario.fields.zona_domicilio') }}</label>
                <input class="form-control {{ $errors->has('zona_domicilio') ? 'is-invalid' : '' }}" type="text" name="zona_domicilio" id="zona_domicilio" value="{{ old('zona_domicilio', '') }}" required>
                @if($errors->has('zona_domicilio'))
                    <div class="invalid-feedback">
                        {{ $errors->first('zona_domicilio') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiario.fields.zona_domicilio_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="correo_electronico">{{ trans('cruds.beneficiario.fields.correo_electronico') }}</label>
                <input class="form-control {{ $errors->has('correo_electronico') ? 'is-invalid' : '' }}" type="text" name="correo_electronico" id="correo_electronico" value="{{ old('correo_electronico', '') }}" required>
                @if($errors->has('correo_electronico'))
                    <div class="invalid-feedback">
                        {{ $errors->first('correo_electronico') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiario.fields.correo_electronico_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.beneficiario.fields.municipio_vive') }}</label>
                <select class="form-control {{ $errors->has('municipio_vive') ? 'is-invalid' : '' }}" name="municipio_vive" id="municipio_vive" required>
                    <option value disabled {{ old('municipio_vive', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Beneficiario::MUNICIPIO_VIVE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('municipio_vive', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('municipio_vive'))
                    <div class="invalid-feedback">
                        {{ $errors->first('municipio_vive') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiario.fields.municipio_vive_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.beneficiario.fields.macrodistrito_vive') }}</label>
                <select class="form-control {{ $errors->has('macrodistrito_vive') ? 'is-invalid' : '' }}" name="macrodistrito_vive" id="macrodistrito_vive" required>
                    <option value disabled {{ old('macrodistrito_vive', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Beneficiario::MACRODISTRITO_VIVE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('macrodistrito_vive', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('macrodistrito_vive'))
                    <div class="invalid-feedback">
                        {{ $errors->first('macrodistrito_vive') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiario.fields.macrodistrito_vive_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.beneficiario.fields.ocupacion') }}</label>
                <select class="form-control {{ $errors->has('ocupacion') ? 'is-invalid' : '' }}" name="ocupacion" id="ocupacion" required>
                    <option value disabled {{ old('ocupacion', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Beneficiario::OCUPACION_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('ocupacion', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('ocupacion'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ocupacion') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiario.fields.ocupacion_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.beneficiario.fields.tipo_beneficiario') }}</label>
                <select class="form-control {{ $errors->has('tipo_beneficiario') ? 'is-invalid' : '' }}" name="tipo_beneficiario" id="tipo_beneficiario" required>
                    <option value disabled {{ old('tipo_beneficiario', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Beneficiario::TIPO_BENEFICIARIO_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('tipo_beneficiario', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('tipo_beneficiario'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tipo_beneficiario') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiario.fields.tipo_beneficiario_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.beneficiario.fields.tipo_ingreso') }}</label>
                <select class="form-control {{ $errors->has('tipo_ingreso') ? 'is-invalid' : '' }}" name="tipo_ingreso" id="tipo_ingreso" required>
                    <option value disabled {{ old('tipo_ingreso', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Beneficiario::TIPO_INGRESO_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('tipo_ingreso', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('tipo_ingreso'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tipo_ingreso') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiario.fields.tipo_ingreso_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.beneficiario.fields.estudio_nivel') }}</label>
                @foreach(App\Beneficiario::ESTUDIO_NIVEL_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('estudio_nivel') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="estudio_nivel_{{ $key }}" name="estudio_nivel" value="{{ $key }}" {{ old('estudio_nivel', '') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="estudio_nivel_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('estudio_nivel'))
                    <div class="invalid-feedback">
                        {{ $errors->first('estudio_nivel') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiario.fields.estudio_nivel_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="universidad">{{ trans('cruds.beneficiario.fields.universidad') }}</label>
                <input class="form-control {{ $errors->has('universidad') ? 'is-invalid' : '' }}" type="text" name="universidad" id="universidad" value="{{ old('universidad', '') }}">
                @if($errors->has('universidad'))
                    <div class="invalid-feedback">
                        {{ $errors->first('universidad') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiario.fields.universidad_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="carrera">{{ trans('cruds.beneficiario.fields.carrera') }}</label>
                <input class="form-control {{ $errors->has('carrera') ? 'is-invalid' : '' }}" type="text" name="carrera" id="carrera" value="{{ old('carrera', '') }}">
                @if($errors->has('carrera'))
                    <div class="invalid-feedback">
                        {{ $errors->first('carrera') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiario.fields.carrera_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="semestre">{{ trans('cruds.beneficiario.fields.semestre') }}</label>
                <input class="form-control {{ $errors->has('semestre') ? 'is-invalid' : '' }}" type="text" name="semestre" id="semestre" value="{{ old('semestre', '') }}">
                @if($errors->has('semestre'))
                    <div class="invalid-feedback">
                        {{ $errors->first('semestre') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiario.fields.semestre_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="datos_proyecto">{{ trans('cruds.beneficiario.fields.datos_proyecto') }}</label>
                <input class="form-control {{ $errors->has('datos_proyecto') ? 'is-invalid' : '' }}" type="text" name="datos_proyecto" id="datos_proyecto" value="{{ old('datos_proyecto', '') }}">
                @if($errors->has('datos_proyecto'))
                    <div class="invalid-feedback">
                        {{ $errors->first('datos_proyecto') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiario.fields.datos_proyecto_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nombre_proyecto">{{ trans('cruds.beneficiario.fields.nombre_proyecto') }}</label>
                <input class="form-control {{ $errors->has('nombre_proyecto') ? 'is-invalid' : '' }}" type="text" name="nombre_proyecto" id="nombre_proyecto" value="{{ old('nombre_proyecto', '') }}">
                @if($errors->has('nombre_proyecto'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nombre_proyecto') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiario.fields.nombre_proyecto_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="descripcion_proyecto">{{ trans('cruds.beneficiario.fields.descripcion_proyecto') }}</label>
                <textarea class="form-control {{ $errors->has('descripcion_proyecto') ? 'is-invalid' : '' }}" name="descripcion_proyecto" id="descripcion_proyecto">{{ old('descripcion_proyecto') }}</textarea>
                @if($errors->has('descripcion_proyecto'))
                    <div class="invalid-feedback">
                        {{ $errors->first('descripcion_proyecto') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiario.fields.descripcion_proyecto_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.beneficiario.fields.rango_emprendimiento') }}</label>
                @foreach(App\Beneficiario::RANGO_EMPRENDIMIENTO_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('rango_emprendimiento') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="rango_emprendimiento_{{ $key }}" name="rango_emprendimiento" value="{{ $key }}" {{ old('rango_emprendimiento', '') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="rango_emprendimiento_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('rango_emprendimiento'))
                    <div class="invalid-feedback">
                        {{ $errors->first('rango_emprendimiento') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiario.fields.rango_emprendimiento_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nombre_emprendimiento">{{ trans('cruds.beneficiario.fields.nombre_emprendimiento') }}</label>
                <input class="form-control {{ $errors->has('nombre_emprendimiento') ? 'is-invalid' : '' }}" type="text" name="nombre_emprendimiento" id="nombre_emprendimiento" value="{{ old('nombre_emprendimiento', '') }}">
                @if($errors->has('nombre_emprendimiento'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nombre_emprendimiento') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiario.fields.nombre_emprendimiento_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.beneficiario.fields.sector_emprendimiento') }}</label>
                @foreach(App\Beneficiario::SECTOR_EMPRENDIMIENTO_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('sector_emprendimiento') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="sector_emprendimiento_{{ $key }}" name="sector_emprendimiento" value="{{ $key }}" {{ old('sector_emprendimiento', '') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="sector_emprendimiento_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('sector_emprendimiento'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sector_emprendimiento') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiario.fields.sector_emprendimiento_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="descripcion_emprendimiento">{{ trans('cruds.beneficiario.fields.descripcion_emprendimiento') }}</label>
                <textarea class="form-control {{ $errors->has('descripcion_emprendimiento') ? 'is-invalid' : '' }}" name="descripcion_emprendimiento" id="descripcion_emprendimiento">{{ old('descripcion_emprendimiento') }}</textarea>
                @if($errors->has('descripcion_emprendimiento'))
                    <div class="invalid-feedback">
                        {{ $errors->first('descripcion_emprendimiento') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiario.fields.descripcion_emprendimiento_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="rubro_emprendimiento">{{ trans('cruds.beneficiario.fields.rubro_emprendimiento') }}</label>
                <input class="form-control {{ $errors->has('rubro_emprendimiento') ? 'is-invalid' : '' }}" type="text" name="rubro_emprendimiento" id="rubro_emprendimiento" value="{{ old('rubro_emprendimiento', '') }}">
                @if($errors->has('rubro_emprendimiento'))
                    <div class="invalid-feedback">
                        {{ $errors->first('rubro_emprendimiento') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiario.fields.rubro_emprendimiento_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.beneficiario.fields.municipio_empresa') }}</label>
                @foreach(App\Beneficiario::MUNICIPIO_EMPRESA_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('municipio_empresa') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="municipio_empresa_{{ $key }}" name="municipio_empresa" value="{{ $key }}" {{ old('municipio_empresa', '') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="municipio_empresa_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('municipio_empresa'))
                    <div class="invalid-feedback">
                        {{ $errors->first('municipio_empresa') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiario.fields.municipio_empresa_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.beneficiario.fields.macrodistrito_empresa') }}</label>
                @foreach(App\Beneficiario::MACRODISTRITO_EMPRESA_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('macrodistrito_empresa') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="macrodistrito_empresa_{{ $key }}" name="macrodistrito_empresa" value="{{ $key }}" {{ old('macrodistrito_empresa', '') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="macrodistrito_empresa_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('macrodistrito_empresa'))
                    <div class="invalid-feedback">
                        {{ $errors->first('macrodistrito_empresa') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiario.fields.macrodistrito_empresa_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="direccion_empresa">{{ trans('cruds.beneficiario.fields.direccion_empresa') }}</label>
                <input class="form-control {{ $errors->has('direccion_empresa') ? 'is-invalid' : '' }}" type="text" name="direccion_empresa" id="direccion_empresa" value="{{ old('direccion_empresa', '') }}">
                @if($errors->has('direccion_empresa'))
                    <div class="invalid-feedback">
                        {{ $errors->first('direccion_empresa') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiario.fields.direccion_empresa_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="correo_empresa">{{ trans('cruds.beneficiario.fields.correo_empresa') }}</label>
                <input class="form-control {{ $errors->has('correo_empresa') ? 'is-invalid' : '' }}" type="text" name="correo_empresa" id="correo_empresa" value="{{ old('correo_empresa', '') }}">
                @if($errors->has('correo_empresa'))
                    <div class="invalid-feedback">
                        {{ $errors->first('correo_empresa') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiario.fields.correo_empresa_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="celular_empresa">{{ trans('cruds.beneficiario.fields.celular_empresa') }}</label>
                <input class="form-control {{ $errors->has('celular_empresa') ? 'is-invalid' : '' }}" type="text" name="celular_empresa" id="celular_empresa" value="{{ old('celular_empresa', '') }}">
                @if($errors->has('celular_empresa'))
                    <div class="invalid-feedback">
                        {{ $errors->first('celular_empresa') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiario.fields.celular_empresa_helper') }}</span>
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