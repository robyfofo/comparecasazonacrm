@extends('layouts.admin')
@section('content')
@can('clienti_tipologium_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.clienti-tipologia.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.clientiTipologium.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.clientiTipologium.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-ClientiTipologium">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.clientiTipologium.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.clientiTipologium.fields.tipologia') }}
                        </th>
                        <th>
                            {{ trans('cruds.clientiTipologium.fields.stato') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clientiTipologia as $key => $clientiTipologium)
                        <tr data-entry-id="{{ $clientiTipologium->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $clientiTipologium->id ?? '' }}
                            </td>
                            <td>
                                {{ $clientiTipologium->tipologia ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $clientiTipologium->stato ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $clientiTipologium->stato ? 'checked' : '' }}>
                            </td>
                            <td>
                                @can('clienti_tipologium_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.clienti-tipologia.show', $clientiTipologium->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('clienti_tipologium_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.clienti-tipologia.edit', $clientiTipologium->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('clienti_tipologium_delete')
                                    <form action="{{ route('admin.clienti-tipologia.destroy', $clientiTipologium->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('clienti_tipologium_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.clienti-tipologia.massDestroy') }}",
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
    order: [[ 1, 'asc' ]],
    pageLength: 25,
  });
  $('.datatable-ClientiTipologium:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection