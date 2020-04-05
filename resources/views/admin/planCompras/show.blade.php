@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.planCompra.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.plan-compras.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.planCompra.fields.id') }}
                        </th>
                        <td>
                            {{ $planCompra->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.planCompra.fields.categoria') }}
                        </th>
                        <td>
                            {{ $planCompra->categoria }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.planCompra.fields.c_utili_1') }}
                        </th>
                        <td>
                            {{ $planCompra->c_utili_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.planCompra.fields.c_util_2') }}
                        </th>
                        <td>
                            {{ $planCompra->c_util_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.planCompra.fields.porcentaje_in') }}
                        </th>
                        <td>
                            {{ $planCompra->porcentaje_in }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.planCompra.fields.cant_proyectada') }}
                        </th>
                        <td>
                            {{ $planCompra->cant_proyectada }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.planCompra.fields.stock_seg') }}
                        </th>
                        <td>
                            {{ $planCompra->stock_seg }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.planCompra.fields.cant_compra') }}
                        </th>
                        <td>
                            {{ $planCompra->cant_compra }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.planCompra.fields.costo_total') }}
                        </th>
                        <td>
                            {{ $planCompra->costo_total }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.plan-compras.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection