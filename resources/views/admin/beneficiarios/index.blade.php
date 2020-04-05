@extends('layouts.admin')
@section('content')
@can('beneficiario_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.beneficiarios.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.beneficiario.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        LISTADO
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Beneficiario">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.beneficiario.fields.nombre_completo') }}
                        </th>
                        <th>
                            {{ trans('cruds.beneficiario.fields.genero') }}
                        </th>
                        <th>
                            {{ trans('cruds.beneficiario.fields.numero_ci') }}
                        </th>
                        <th>
                            {{ trans('cruds.beneficiario.fields.extension_ci') }}
                        </th>
                        <th>
                            {{ trans('cruds.beneficiario.fields.fecha_nacimiento') }}
                        </th>
                        <th>
                            {{ trans('cruds.beneficiario.fields.num_celular') }}
                        </th>
                        <th>
                            {{ trans('cruds.beneficiario.fields.zona_domicilio') }}
                        </th>
                        <th>
                            {{ trans('cruds.beneficiario.fields.correo_electronico') }}
                        </th>
                        <th>
                            {{ trans('cruds.beneficiario.fields.municipio_vive') }}
                        </th>
                        <th>
                            {{ trans('cruds.beneficiario.fields.macrodistrito_vive') }}
                        </th>
                        <th>
                            {{ trans('cruds.beneficiario.fields.ocupacion') }}
                        </th>
                        <th>
                            {{ trans('cruds.beneficiario.fields.tipo_beneficiario') }}
                        </th>
                        <th>
                            {{ trans('cruds.beneficiario.fields.tipo_ingreso') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($beneficiarios as $key => $beneficiario)
                        <tr data-entry-id="{{ $beneficiario->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $beneficiario->nombre_completo ?? '' }}
                            </td>
                            <td>
                                {{ App\Beneficiario::GENERO_RADIO[$beneficiario->genero] ?? '' }}
                            </td>
                            <td>
                                {{ $beneficiario->numero_ci ?? '' }}
                            </td>
                            <td>
                                {{ $beneficiario->extension_ci ?? '' }}
                            </td>
                            <td>
                                {{ $beneficiario->fecha_nacimiento ?? '' }}
                            </td>
                            <td>
                                {{ $beneficiario->num_celular ?? '' }}
                            </td>
                            <td>
                                {{ $beneficiario->zona_domicilio ?? '' }}
                            </td>
                            <td>
                                {{ $beneficiario->correo_electronico ?? '' }}
                            </td>
                            <td>
                                {{ App\Beneficiario::MUNICIPIO_VIVE_SELECT[$beneficiario->municipio_vive] ?? '' }}
                            </td>
                            <td>
                                {{ App\Beneficiario::MACRODISTRITO_VIVE_SELECT[$beneficiario->macrodistrito_vive] ?? '' }}
                            </td>
                            <td>
                                {{ App\Beneficiario::OCUPACION_SELECT[$beneficiario->ocupacion] ?? '' }}
                            </td>
                            <td>
                                {{ App\Beneficiario::TIPO_BENEFICIARIO_SELECT[$beneficiario->tipo_beneficiario] ?? '' }}
                            </td>
                            <td>
                                {{ App\Beneficiario::TIPO_INGRESO_SELECT[$beneficiario->tipo_ingreso] ?? '' }}
                            </td>
                            <td>
                                @can('beneficiario_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.beneficiarios.show', $beneficiario->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('beneficiario_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.beneficiarios.edit', $beneficiario->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('beneficiario_delete')
                                    <form action="{{ route('admin.beneficiarios.destroy', $beneficiario->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('beneficiario_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.beneficiarios.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 50,
  });
  $('.datatable-Beneficiario:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection