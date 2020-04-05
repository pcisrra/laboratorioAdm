@can('diseno_asistido_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.diseno-asistidos.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.disenoAsistido.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.disenoAsistido.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-DisenoAsistido">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.disenoAsistido.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.disenoAsistido.fields.descripcion') }}
                        </th>
                        <th>
                            {{ trans('cruds.disenoAsistido.fields.fecha') }}
                        </th>
                        <th>
                            {{ trans('cruds.disenoAsistido.fields.cantidad_horas') }}
                        </th>
                        <th>
                            {{ trans('cruds.disenoAsistido.fields.costo') }}
                        </th>
                        <th>
                            {{ trans('cruds.disenoAsistido.fields.usuario_asignado') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($disenoAsistidos as $key => $disenoAsistido)
                        <tr data-entry-id="{{ $disenoAsistido->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $disenoAsistido->id ?? '' }}
                            </td>
                            <td>
                                {{ $disenoAsistido->descripcion ?? '' }}
                            </td>
                            <td>
                                {{ $disenoAsistido->fecha ?? '' }}
                            </td>
                            <td>
                                {{ $disenoAsistido->cantidad_horas ?? '' }}
                            </td>
                            <td>
                                {{ $disenoAsistido->costo ?? '' }}
                            </td>
                            <td>
                                {{ $disenoAsistido->usuario_asignado->name ?? '' }}
                            </td>
                            <td>
                                @can('diseno_asistido_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.diseno-asistidos.show', $disenoAsistido->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('diseno_asistido_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.diseno-asistidos.edit', $disenoAsistido->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('diseno_asistido_delete')
                                    <form action="{{ route('admin.diseno-asistidos.destroy', $disenoAsistido->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('diseno_asistido_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.diseno-asistidos.massDestroy') }}",
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
  $('.datatable-DisenoAsistido:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection