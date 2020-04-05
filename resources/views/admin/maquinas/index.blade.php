@extends('layouts.admin')
@section('content')
@can('maquina_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.maquinas.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.maquina.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.maquina.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Maquina">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.maquina.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.maquina.fields.codigo') }}
                        </th>
                        <th>
                            {{ trans('cruds.maquina.fields.nombre') }}
                        </th>
                        <th>
                            {{ trans('cruds.maquina.fields.estado') }}
                        </th>
                        <th>
                            {{ trans('cruds.maquina.fields.foto_ref') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($maquinas as $key => $maquina)
                        <tr data-entry-id="{{ $maquina->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $maquina->id ?? '' }}
                            </td>
                            <td>
                                {{ $maquina->codigo ?? '' }}
                            </td>
                            <td>
                                {{ $maquina->nombre ?? '' }}
                            </td>
                            <td>
                                {{ $maquina->estado ?? '' }}
                            </td>
                            <td>
                                @foreach($maquina->foto_ref as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank">
                                        <img src="{{ $media->getUrl('thumb') }}" width="50px" height="50px">
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                @can('maquina_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.maquinas.show', $maquina->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('maquina_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.maquinas.edit', $maquina->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('maquina_delete')
                                    <form action="{{ route('admin.maquinas.destroy', $maquina->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('maquina_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.maquinas.massDestroy') }}",
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
  $('.datatable-Maquina:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection