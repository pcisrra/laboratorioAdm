@extends('layouts.admin')
@section('content')
@can('solicitude_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.solicitudes.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.solicitude.title_singular') }}
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
            <table class=" table table-bordered table-striped table-hover datatable datatable-Solicitude">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.solicitude.fields.codigo_material') }}
                        </th>
                        <th>
                            {{ trans('cruds.solicitude.fields.nombre_solicitante') }}
                        </th>
                        <th>
                            {{ trans('cruds.solicitude.fields.fecha_solicitud') }}
                        </th>
                        <th>
                            {{ trans('cruds.solicitude.fields.cantidad_solicitud') }}
                        </th>
                        <th>
                            {{ trans('cruds.solicitude.fields.ots') }}
                        </th>
                        <th>
                            {{ trans('cruds.solicitude.fields.observaciones') }}
                        </th>
                        <th>
                            {{ trans('cruds.solicitude.fields.fabricacion_solicitud') }}
                        </th>
                        <th>
                            {{ trans('cruds.solicitude.fields.solicitud_unidad') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($solicitudes as $key => $solicitude)
                        <tr data-entry-id="{{ $solicitude->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $solicitude->codigo_material->codigo ?? '' }}
                            </td>
                            <td>
                                {{ $solicitude->nombre_solicitante->name ?? '' }}
                            </td>
                            <td>
                                {{ $solicitude->fecha_solicitud ?? '' }}
                            </td>
                            <td>
                                {{ $solicitude->cantidad_solicitud ?? '' }}
                            </td>
                            <td>
                                {{ $solicitude->ots ?? '' }}
                            </td>
                            <td>
                                {{ $solicitude->observaciones ?? '' }}
                            </td>
                            <td>
                                {{ $solicitude->fabricacion_solicitud->proyecto_nombre ?? '' }}
                            </td>
                            <td>
                                {{ $solicitude->solicitud_unidad ?? '' }}
                            </td>
                            <td>
                                <a class="btn btn-xs btn-primary" href="{{ route('admin.materials.exitMat',['codigo_material' => $solicitude->codigo_material->codigo, 'cantidad' => $solicitude->cantidad_solicitud]) }}">
                                    ACEPTAR
                                </a>

                                @can('solicitude_delete')
                                    <form action="{{ route('admin.solicitudes.destroy', $solicitude->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="RECHAZAR">
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
@can('solicitude_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.solicitudes.massDestroy') }}",
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
    pageLength: 100,
  });
  $('.datatable-Solicitude:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection