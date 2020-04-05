@can('capacitacion_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.capacitacions.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.capacitacion.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.capacitacion.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Capacitacion">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.capacitacion.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.capacitacion.fields.nombre') }}
                        </th>
                        <th>
                            {{ trans('cruds.capacitacion.fields.fecha_inicio') }}
                        </th>
                        <th>
                            {{ trans('cruds.capacitacion.fields.fecha_fin') }}
                        </th>
                        <th>
                            {{ trans('cruds.capacitacion.fields.funcionario_capacitacion') }}
                        </th>
                        <th>
                            {{ trans('cruds.capacitacion.fields.asistentes') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($capacitacions as $key => $capacitacion)
                        <tr data-entry-id="{{ $capacitacion->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $capacitacion->id ?? '' }}
                            </td>
                            <td>
                                {{ $capacitacion->nombre ?? '' }}
                            </td>
                            <td>
                                {{ $capacitacion->fecha_inicio ?? '' }}
                            </td>
                            <td>
                                {{ $capacitacion->fecha_fin ?? '' }}
                            </td>
                            <td>
                                {{ $capacitacion->funcionario_capacitacion->name ?? '' }}
                            </td>
                            <td>
                                @foreach($capacitacion->asistentes as $key => $item)
                                    <span class="badge badge-info">{{ $item->nombre_completo }}</span>
                                @endforeach
                            </td>
                            <td>
                                @can('capacitacion_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.capacitacions.show', $capacitacion->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('capacitacion_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.capacitacions.edit', $capacitacion->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('capacitacion_delete')
                                    <form action="{{ route('admin.capacitacions.destroy', $capacitacion->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('capacitacion_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.capacitacions.massDestroy') }}",
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
  $('.datatable-Capacitacion:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection