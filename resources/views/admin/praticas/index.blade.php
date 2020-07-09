@extends('layouts.admin')
@section('content')
@can('pratica_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.praticas.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.pratica.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.pratica.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Pratica">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.pratica.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.pratica.fields.pratica') }}
                        </th>
                        <th>
                            {{ trans('cruds.pratica.fields.tipologia') }}
                        </th>
                        <th>
                            {{ trans('cruds.pratica.fields.cliente') }}
                        </th>
                        <th>
                            {{ trans('cruds.pratica.fields.agente') }}
                        </th>
                        <th>
                            {{ trans('cruds.agentProfile.fields.indirizzo') }}
                        </th>
                        <th>
                            {{ trans('cruds.pratica.fields.filiale') }}
                        </th>
                        <th>
                            {{ trans('cruds.pratica.fields.tipologia_immobile') }}
                        </th>
                        <th>
                            {{ trans('cruds.pratica.fields.immobile') }}
                        </th>
                        <th>
                            {{ trans('cruds.pratica.fields.contratto') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($praticas as $key => $pratica)
                        <tr data-entry-id="{{ $pratica->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $pratica->id ?? '' }}
                            </td>
                            <td>
                                {{ $pratica->pratica ?? '' }}
                            </td>
                            <td>
                                {{ App\Pratica::TIPOLOGIA_SELECT[$pratica->tipologia] ?? '' }}
                            </td>
                            <td>
                                {{ $pratica->cliente->ruolo ?? '' }}
                            </td>
                            <td>
                                {{ $pratica->agente->nome ?? '' }}
                            </td>
                            <td>
                                {{ $pratica->agente->indirizzo ?? '' }}
                            </td>
                            <td>
                                {{ $pratica->filiale->nome ?? '' }}
                            </td>
                            <td>
                                {{ $pratica->tipologia_immobile->nome ?? '' }}
                            </td>
                            <td>
                                {{ $pratica->immobile->nome ?? '' }}
                            </td>
                            <td>
                                {{ $pratica->contratto->contratto ?? '' }}
                            </td>
                            <td>
                                @can('pratica_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.praticas.show', $pratica->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('pratica_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.praticas.edit', $pratica->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('pratica_delete')
                                    <form action="{{ route('admin.praticas.destroy', $pratica->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('pratica_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.praticas.massDestroy') }}",
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
  let table = $('.datatable-Pratica:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection