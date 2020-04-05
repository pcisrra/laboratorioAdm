@extends('layouts.admin')
@section('content')
@can('plan_compra_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.plan-compras.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.planCompra.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.planCompra.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-PlanCompra">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.planCompra.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.planCompra.fields.categoria') }}
                        </th>
                        <th>
                            {{ trans('cruds.planCompra.fields.c_utili_1') }}
                        </th>
                        <th>
                            {{ trans('cruds.planCompra.fields.c_util_2') }}
                        </th>
                        <th>
                            {{ trans('cruds.planCompra.fields.porcentaje_in') }}
                        </th>
                        <th>
                            {{ trans('cruds.planCompra.fields.cant_proyectada') }}
                        </th>
                        <th>
                            {{ trans('cruds.planCompra.fields.stock_seg') }}
                        </th>
                        <th>
                            {{ trans('cruds.planCompra.fields.cant_compra') }}
                        </th>
                        <th>
                            {{ trans('cruds.planCompra.fields.costo_total') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($planCompras as $key => $planCompra)
                        <tr data-entry-id="{{ $planCompra->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $planCompra->id ?? '' }}
                            </td>
                            <td>
                                {{ $planCompra->categoria ?? '' }}
                            </td>
                            <td>
                                {{ $planCompra->c_utili_1 ?? '' }}
                            </td>
                            <td>
                                {{ $planCompra->c_util_2 ?? '' }}
                            </td>
                            <td>
                                {{ $planCompra->porcentaje_in ?? '' }}
                            </td>
                            <td>
                                {{ $planCompra->cant_proyectada ?? '' }}
                            </td>
                            <td>
                                {{ $planCompra->stock_seg ?? '' }}
                            </td>
                            <td>
                                {{ $planCompra->cant_compra ?? '' }}
                            </td>
                            <td>
                                {{ $planCompra->costo_total ?? '' }}
                            </td>
                            <td>
                                @can('plan_compra_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.plan-compras.show', $planCompra->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('plan_compra_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.plan-compras.edit', $planCompra->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('plan_compra_delete')
                                    <form action="{{ route('admin.plan-compras.destroy', $planCompra->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('plan_compra_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.plan-compras.massDestroy') }}",
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
  $('.datatable-PlanCompra:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection