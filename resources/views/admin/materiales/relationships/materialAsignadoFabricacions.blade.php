@can('fabricacion_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.fabricacions.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.fabricacion.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.fabricacion.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Fabricacion">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.fabricacion.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.fabricacion.fields.proyecto_nombre') }}
                        </th>
                        <th>
                            {{ trans('cruds.fabricacion.fields.maquina_asignada') }}
                        </th>
                        <th>
                            {{ trans('cruds.fabricacion.fields.fecha_inicio') }}
                        </th>
                        <th>
                            {{ trans('cruds.fabricacion.fields.duracion') }}
                        </th>
                        <th>
                            {{ trans('cruds.fabricacion.fields.tecnico_asignado') }}
                        </th>
                        <th>
                            {{ trans('cruds.fabricacion.fields.material_asignado') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($fabricacions as $key => $fabricacion)
                        <tr data-entry-id="{{ $fabricacion->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $fabricacion->id ?? '' }}
                            </td>
                            <td>
                                {{ $fabricacion->proyecto_nombre ?? '' }}
                            </td>
                            <td>
                                @foreach($fabricacion->maquina_asignadas as $key => $item)
                                    <span class="badge badge-info">{{ $item->nombre }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $fabricacion->fecha_inicio ?? '' }}
                            </td>
                            <td>
                                {{ $fabricacion->duracion ?? '' }}
                            </td>
                            <td>
                                {{ $fabricacion->tecnico_asignado->name ?? '' }}
                            </td>
                            <td>
                                @foreach($fabricacion->material_asignados as $key => $item)
                                    <span class="badge badge-info">{{ $item->codigo }}</span>
                                @endforeach
                            </td>
                            <td>
                                @can('fabricacion_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.fabricacions.show', $fabricacion->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('fabricacion_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.fabricacions.edit', $fabricacion->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('fabricacion_delete')
                                    <form action="{{ route('admin.fabricacions.destroy', $fabricacion->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('fabricacion_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.fabricacions.massDestroy') }}",
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
  $('.datatable-Fabricacion:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection