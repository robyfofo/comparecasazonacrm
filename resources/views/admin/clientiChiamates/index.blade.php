@extends('layouts.admin')
@section('content')
@can('clienti_chiamate_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.clienti-chiamates.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.clientiChiamate.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.clientiChiamate.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-ClientiChiamate">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.clientiChiamate.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.clientiChiamate.fields.data_ora') }}
                        </th>
                        <th>
                            {{ trans('cruds.clientiChiamate.fields.filiale') }}
                        </th>
                        <th>
                            {{ trans('cruds.clientiChiamate.fields.agente') }}
                        </th>
                        <th>
                            {{ trans('cruds.clientiChiamate.fields.cliente') }}
                        </th>
                        <th>
                            {{ trans('cruds.clientiChiamate.fields.pratica') }}
                        </th>
                        <th>
                            {{ trans('cruds.clientiChiamate.fields.richiesta') }}
                        </th>
                        <th>
                            {{ trans('cruds.clientiChiamate.fields.direzione') }}
                        </th>
                        <th>
                            {{ trans('cruds.clientiChiamate.fields.nome') }}
                        </th>
                        <th>
                            {{ trans('cruds.clientiChiamate.fields.cognome') }}
                        </th>
                        <th>
                            {{ trans('cruds.clientiChiamate.fields.telefono') }}
                        </th>
                        <th>
                            {{ trans('cruds.clientiChiamate.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.clientiChiamate.fields.data_risposta') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clientiChiamates as $key => $clientiChiamate)
                        <tr data-entry-id="{{ $clientiChiamate->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $clientiChiamate->id ?? '' }}
                            </td>
                            <td>
                                {{ $clientiChiamate->data_ora ?? '' }}
                            </td>
                            <td>
                                {{ $clientiChiamate->filiale->nome ?? '' }}
                            </td>
                            <td>
                                {{ $clientiChiamate->agente->nome ?? '' }}
                            </td>
                            <td>
                                {{ $clientiChiamate->cliente->nome_2 ?? '' }}
                            </td>
                            <td>
                                {{ $clientiChiamate->pratica->pratica ?? '' }}
                            </td>
                            <td>
                                {{ $clientiChiamate->richiesta->destinazione ?? '' }}
                            </td>
                            <td>
                                {{ App\ClientiChiamate::DIREZIONE_SELECT[$clientiChiamate->direzione] ?? '' }}
                            </td>
                            <td>
                                {{ $clientiChiamate->nome ?? '' }}
                            </td>
                            <td>
                                {{ $clientiChiamate->cognome ?? '' }}
                            </td>
                            <td>
                                {{ $clientiChiamate->telefono ?? '' }}
                            </td>
                            <td>
                                {{ $clientiChiamate->email ?? '' }}
                            </td>
                            <td>
                                {{ $clientiChiamate->data_risposta ?? '' }}
                            </td>
                            <td>
                                @can('clienti_chiamate_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.clienti-chiamates.show', $clientiChiamate->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('clienti_chiamate_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.clienti-chiamates.edit', $clientiChiamate->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('clienti_chiamate_delete')
                                    <form action="{{ route('admin.clienti-chiamates.destroy', $clientiChiamate->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('clienti_chiamate_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.clienti-chiamates.massDestroy') }}",
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
    pageLength: 25,
  });
  let table = $('.datatable-ClientiChiamate:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection