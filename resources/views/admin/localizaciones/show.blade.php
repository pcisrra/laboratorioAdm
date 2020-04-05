@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.localizacione.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.localizaciones.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.localizacione.fields.id') }}
                        </th>
                        <td>
                            {{ $localizacione->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.localizacione.fields.codigo') }}
                        </th>
                        <td>
                            {{ $localizacione->codigo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.localizacione.fields.descripcion') }}
                        </th>
                        <td>
                            {{ $localizacione->descripcion }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.localizacione.fields.foto') }}
                        </th>
                        <td>
                            @if($localizacione->foto)
                                <a href="{{ $localizacione->foto->getUrl() }}" target="_blank">
                                    <img src="{{ $localizacione->foto->getUrl('thumb') }}" width="50px" height="50px">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.localizaciones.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#localizacion_materiales" role="tab" data-toggle="tab">
                {{ trans('cruds.materiale.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#localizacion_activos" role="tab" data-toggle="tab">
                {{ trans('cruds.activo.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="localizacion_materiales">
            @includeIf('admin.localizaciones.relationships.localizacionMateriales', ['materiales' => $localizacione->localizacionMateriales])
        </div>
        <div class="tab-pane" role="tabpanel" id="localizacion_activos">
            @includeIf('admin.localizaciones.relationships.localizacionActivos', ['activos' => $localizacione->localizacionActivos])
        </div>
    </div>
</div>

@endsection