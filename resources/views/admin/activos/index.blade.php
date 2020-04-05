@extends('layouts.admin')
@section('content')
@can('activo_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.activos.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.activo.title_singular') }}
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
            <table class=" table table-bordered table-striped table-hover datatable datatable-Activo">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.activo.fields.codigo') }}
                        </th>
                        <th>
                            {{ trans('cruds.activo.fields.clasificacion') }}
                        </th>
                        <th>
                            {{ trans('cruds.activo.fields.activo') }}
                        </th>
                        <th>
                            {{ trans('cruds.activo.fields.descripcion') }}
                        </th>
                        <th>
                            {{ trans('cruds.activo.fields.costo') }}
                        </th>
                        <th>
                            {{ trans('cruds.activo.fields.localizacion') }}
                        </th>
                        <th>
                            {{ trans('cruds.activo.fields.ubicacion') }}
                        </th>
                        <th>
                            {{ trans('cruds.activo.fields.estado') }}
                        </th>
                        <th>
                            {{ trans('cruds.activo.fields.observaciones') }}
                        </th>
                        <th>
                            {{ trans('cruds.activo.fields.func_asignado') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($activos as $key => $activo)
                        <tr data-entry-id="{{ $activo->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $activo->codigo ?? '' }}
                            </td>
                            <td>
                                {{ $activo->clasificacion ?? '' }}
                            </td>
                            <td>
                                {{ $activo->activo ?? '' }}
                            </td>
                            <td>
                                {{ $activo->descripcion ?? '' }}
                            </td>
                            <td>
                                {{ $activo->costo ?? '' }}
                            </td>
                            <td>
                                {{ $activo->localizacion->codigo ?? '' }}
                            </td>
                            <td>
                                {{ $activo->ubicacion ?? '' }}
                            </td>
                            <td>
                                {{ $activo->estado ?? '' }}
                            </td>
                            <td>
                                {{ $activo->observaciones ?? '' }}
                            </td>
                            <td>
                                {{ $activo->func_asignado->name ?? '' }}
                            </td>
                            <td>
                                @can('activo_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.activos.show', $activo->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('activo_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.activos.edit', $activo->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('activo_delete')
                                    <form action="{{ route('admin.activos.destroy', $activo->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('activo_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.activos.massDestroy') }}",
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
  $('.datatable-Activo:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection