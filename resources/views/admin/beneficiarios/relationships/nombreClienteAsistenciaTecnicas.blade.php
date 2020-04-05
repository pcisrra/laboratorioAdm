@can('asistencia_tecnica_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.asistencia-tecnicas.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.asistenciaTecnica.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.asistenciaTecnica.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-AsistenciaTecnica">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.asistenciaTecnica.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.asistenciaTecnica.fields.detalle') }}
                        </th>
                        <th>
                            {{ trans('cruds.asistenciaTecnica.fields.descripcion') }}
                        </th>
                        <th>
                            {{ trans('cruds.asistenciaTecnica.fields.fecha') }}
                        </th>
                        <th>
                            {{ trans('cruds.asistenciaTecnica.fields.cantidad_horas') }}
                        </th>
                        <th>
                            {{ trans('cruds.asistenciaTecnica.fields.funcionario_asistencia') }}
                        </th>
                        <th>
                            {{ trans('cruds.asistenciaTecnica.fields.costo') }}
                        </th>
                        <th>
                            {{ trans('cruds.asistenciaTecnica.fields.nombre_cliente') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($asistenciaTecnicas as $key => $asistenciaTecnica)
                        <tr data-entry-id="{{ $asistenciaTecnica->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $asistenciaTecnica->id ?? '' }}
                            </td>
                            <td>
                                {{ $asistenciaTecnica->detalle ?? '' }}
                            </td>
                            <td>
                                {{ $asistenciaTecnica->descripcion ?? '' }}
                            </td>
                            <td>
                                {{ $asistenciaTecnica->fecha ?? '' }}
                            </td>
                            <td>
                                {{ $asistenciaTecnica->cantidad_horas ?? '' }}
                            </td>
                            <td>
                                {{ $asistenciaTecnica->funcionario_asistencia->name ?? '' }}
                            </td>
                            <td>
                                {{ $asistenciaTecnica->costo ?? '' }}
                            </td>
                            <td>
                                {{ $asistenciaTecnica->nombre_cliente->nombre_completo ?? '' }}
                            </td>
                            <td>
                                @can('asistencia_tecnica_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.asistencia-tecnicas.show', $asistenciaTecnica->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('asistencia_tecnica_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.asistencia-tecnicas.edit', $asistenciaTecnica->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('asistencia_tecnica_delete')
                                    <form action="{{ route('admin.asistencia-tecnicas.destroy', $asistenciaTecnica->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('asistencia_tecnica_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.asistencia-tecnicas.massDestroy') }}",
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
  $('.datatable-AsistenciaTecnica:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection