@extends('layouts.admin')
@section('content')
@can('localizacione_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.localizaciones.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.localizacione.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.localizacione.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Localizacione">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.localizacione.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.localizacione.fields.codigo') }}
                        </th>
                        <th>
                            {{ trans('cruds.localizacione.fields.descripcion') }}
                        </th>
                        <th>
                            {{ trans('cruds.localizacione.fields.foto') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($localizaciones as $key => $localizacione)
                        <tr data-entry-id="{{ $localizacione->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $localizacione->id ?? '' }}
                            </td>
                            <td>
                                {{ $localizacione->codigo ?? '' }}
                            </td>
                            <td>
                                {{ $localizacione->descripcion ?? '' }}
                            </td>
                            <td>
                                @if($localizacione->foto)
                                    <a href="{{ $localizacione->foto->getUrl() }}" target="_blank">
                                        <img src="{{ $localizacione->foto->getUrl('thumb') }}" width="50px" height="50px">
                                    </a>
                                @endif
                            </td>
                            <td>
                                @can('localizacione_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.localizaciones.show', $localizacione->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('localizacione_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.localizaciones.edit', $localizacione->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('localizacione_delete')
                                    <form action="{{ route('admin.localizaciones.destroy', $localizacione->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('localizacione_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.localizaciones.massDestroy') }}",
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
  $('.datatable-Localizacione:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection