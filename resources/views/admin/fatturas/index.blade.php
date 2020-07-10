@extends('layouts.admin')
@section('content')
@can('fattura_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.fatturas.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.fattura.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.fattura.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Fattura">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.fattura.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.fattura.fields.cliente_nome') }}
                        </th>
                        <th>
                            {{ trans('cruds.fattura.fields.cliente_cognome') }}
                        </th>
                        <th>
                            {{ trans('cruds.fattura.fields.fattura_numero') }}
                        </th>
                        <th>
                            {{ trans('cruds.fattura.fields.fattura_anno') }}
                        </th>
                        <th>
                            {{ trans('cruds.fattura.fields.data_emissione') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($fatturas as $key => $fattura)
                        <tr data-entry-id="{{ $fattura->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $fattura->id ?? '' }}
                            </td>
                            <td>
                                {{ $fattura->cliente_nome ?? '' }}
                            </td>
                            <td>
                                {{ $fattura->cliente_cognome ?? '' }}
                            </td>
                            <td>
                                {{ $fattura->fattura_numero ?? '' }}
                            </td>
                            <td>
                                {{ $fattura->fattura_anno ?? '' }}
                            </td>
                            <td>
                                {{ $fattura->data_emissione ?? '' }}
                            </td>
                            <td>
                                @can('fattura_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.fatturas.show', $fattura->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('fattura_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.fatturas.edit', $fattura->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('fattura_delete')
                                    <form action="{{ route('admin.fatturas.destroy', $fattura->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('fattura_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.fatturas.massDestroy') }}",
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
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Fattura:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection