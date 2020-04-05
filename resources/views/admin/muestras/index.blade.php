@extends('layouts.admin')
@section('content')
@can('muestra_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.muestras.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.muestra.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.muestra.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Muestra">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.muestra.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.muestra.fields.codigo') }}
                        </th>
                        <th>
                            {{ trans('cruds.muestra.fields.detalle') }}
                        </th>
                        <th>
                            {{ trans('cruds.muestra.fields.material') }}
                        </th>
                        <th>
                            {{ trans('cruds.muestra.fields.estado') }}
                        </th>
                        <th>
                            {{ trans('cruds.muestra.fields.cantidad') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($muestras as $key => $muestra)
                        <tr data-entry-id="{{ $muestra->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $muestra->id ?? '' }}
                            </td>
                            <td>
                                {{ $muestra->codigo ?? '' }}
                            </td>
                            <td>
                                {{ $muestra->detalle ?? '' }}
                            </td>
                            <td>
                                {{ $muestra->material ?? '' }}
                            </td>
                            <td>
                                {{ $muestra->estado ?? '' }}
                            </td>
                            <td>
                                {{ $muestra->cantidad ?? '' }}
                            </td>
                            <td>
                                @can('muestra_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.muestras.show', $muestra->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('muestra_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.muestras.edit', $muestra->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('muestra_delete')
                                    <form action="{{ route('admin.muestras.destroy', $muestra->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('muestra_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.muestras.massDestroy') }}",
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
  $('.datatable-Muestra:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection