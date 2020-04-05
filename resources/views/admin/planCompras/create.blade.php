@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.planCompra.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.plan-compras.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="categoria">{{ trans('cruds.planCompra.fields.categoria') }}</label>
                <input class="form-control {{ $errors->has('categoria') ? 'is-invalid' : '' }}" type="text" name="categoria" id="categoria" value="{{ old('categoria', '') }}" required>
                @if($errors->has('categoria'))
                    <div class="invalid-feedback">
                        {{ $errors->first('categoria') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.planCompra.fields.categoria_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="c_utili_1">{{ trans('cruds.planCompra.fields.c_utili_1') }}</label>
                <input class="form-control {{ $errors->has('c_utili_1') ? 'is-invalid' : '' }}" type="number" name="c_utili_1" id="c_utili_1" value="{{ old('c_utili_1') }}" step="1" required>
                @if($errors->has('c_utili_1'))
                    <div class="invalid-feedback">
                        {{ $errors->first('c_utili_1') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.planCompra.fields.c_utili_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="c_util_2">{{ trans('cruds.planCompra.fields.c_util_2') }}</label>
                <input class="form-control {{ $errors->has('c_util_2') ? 'is-invalid' : '' }}" type="number" name="c_util_2" id="c_util_2" value="{{ old('c_util_2') }}" step="1" required>
                @if($errors->has('c_util_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('c_util_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.planCompra.fields.c_util_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="porcentaje_in">{{ trans('cruds.planCompra.fields.porcentaje_in') }}</label>
                <input class="form-control {{ $errors->has('porcentaje_in') ? 'is-invalid' : '' }}" type="number" name="porcentaje_in" id="porcentaje_in" value="{{ old('porcentaje_in') }}" step="0.01" required>
                @if($errors->has('porcentaje_in'))
                    <div class="invalid-feedback">
                        {{ $errors->first('porcentaje_in') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.planCompra.fields.porcentaje_in_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="cant_proyectada">{{ trans('cruds.planCompra.fields.cant_proyectada') }}</label>
                <input class="form-control {{ $errors->has('cant_proyectada') ? 'is-invalid' : '' }}" type="number" name="cant_proyectada" id="cant_proyectada" value="{{ old('cant_proyectada') }}" step="1" required>
                @if($errors->has('cant_proyectada'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cant_proyectada') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.planCompra.fields.cant_proyectada_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="stock_seg">{{ trans('cruds.planCompra.fields.stock_seg') }}</label>
                <input class="form-control {{ $errors->has('stock_seg') ? 'is-invalid' : '' }}" type="number" name="stock_seg" id="stock_seg" value="{{ old('stock_seg') }}" step="1" required>
                @if($errors->has('stock_seg'))
                    <div class="invalid-feedback">
                        {{ $errors->first('stock_seg') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.planCompra.fields.stock_seg_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="cant_compra">{{ trans('cruds.planCompra.fields.cant_compra') }}</label>
                <input class="form-control {{ $errors->has('cant_compra') ? 'is-invalid' : '' }}" type="number" name="cant_compra" id="cant_compra" value="{{ old('cant_compra') }}" step="1" required>
                @if($errors->has('cant_compra'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cant_compra') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.planCompra.fields.cant_compra_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="costo_total">{{ trans('cruds.planCompra.fields.costo_total') }}</label>
                <input class="form-control {{ $errors->has('costo_total') ? 'is-invalid' : '' }}" type="number" name="costo_total" id="costo_total" value="{{ old('costo_total') }}" step="0.01" required>
                @if($errors->has('costo_total'))
                    <div class="invalid-feedback">
                        {{ $errors->first('costo_total') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.planCompra.fields.costo_total_helper') }}</span>
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