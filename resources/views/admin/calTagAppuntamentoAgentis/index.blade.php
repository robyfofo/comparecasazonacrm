@extends('layouts.admin')
@section('content')
@can('cal_tag_appuntamento_agenti_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.cal-tag-appuntamento-agentis.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.calTagAppuntamentoAgenti.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.calTagAppuntamentoAgenti.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-CalTagAppuntamentoAgenti">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.calTagAppuntamentoAgenti.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.calTagAppuntamentoAgenti.fields.appuntamento') }}
                        </th>
                        <th>
                            {{ trans('cruds.calTagAppuntamentoAgenti.fields.agente') }}
                        </th>
                        <th>
                            {{ trans('cruds.calTagAppuntamentoAgenti.fields.data_ora') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($calTagAppuntamentoAgentis as $key => $calTagAppuntamentoAgenti)
                        <tr data-entry-id="{{ $calTagAppuntamentoAgenti->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $calTagAppuntamentoAgenti->id ?? '' }}
                            </td>
                            <td>
                                {{ $calTagAppuntamentoAgenti->appuntamento->data_ora ?? '' }}
                            </td>
                            <td>
                                {{ $calTagAppuntamentoAgenti->agente->nome ?? '' }}
                            </td>
                            <td>
                                {{ $calTagAppuntamentoAgenti->data_ora ?? '' }}
                            </td>
                            <td>
                                @can('cal_tag_appuntamento_agenti_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.cal-tag-appuntamento-agentis.show', $calTagAppuntamentoAgenti->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('cal_tag_appuntamento_agenti_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.cal-tag-appuntamento-agentis.edit', $calTagAppuntamentoAgenti->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('cal_tag_appuntamento_agenti_delete')
                                    <form action="{{ route('admin.cal-tag-appuntamento-agentis.destroy', $calTagAppuntamentoAgenti->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('cal_tag_appuntamento_agenti_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.cal-tag-appuntamento-agentis.massDestroy') }}",
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
    pageLength: 25,
  });
  $('.datatable-CalTagAppuntamentoAgenti:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection