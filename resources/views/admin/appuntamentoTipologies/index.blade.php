@extends('layouts.admin')
@section('content')
@can('appuntamento_tipologie_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.appuntamento-tipologies.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.appuntamentoTipologie.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.appuntamentoTipologie.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-AppuntamentoTipologie">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.appuntamentoTipologie.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.appuntamentoTipologie.fields.nome') }}
                        </th>
                        <th>
                            {{ trans('cruds.appuntamentoTipologie.fields.pos') }}
                        </th>
                        <th>
                            {{ trans('cruds.appuntamentoTipologie.fields.bgcolor') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($appuntamentoTipologies as $key => $appuntamentoTipologie)
                        <tr data-entry-id="{{ $appuntamentoTipologie->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $appuntamentoTipologie->id ?? '' }}
                            </td>
                            <td>
                                {{ $appuntamentoTipologie->nome ?? '' }}
                            </td>
                            <td>
                                {{ $appuntamentoTipologie->pos ?? '' }}
                            </td>
                            <td>
                                {{ $appuntamentoTipologie->bgcolor ?? '' }}
                            </td>
                            <td>
                                @can('appuntamento_tipologie_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.appuntamento-tipologies.show', $appuntamentoTipologie->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('appuntamento_tipologie_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.appuntamento-tipologies.edit', $appuntamentoTipologie->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('appuntamento_tipologie_delete')
                                    <form action="{{ route('admin.appuntamento-tipologies.destroy', $appuntamentoTipologie->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('appuntamento_tipologie_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.appuntamento-tipologies.massDestroy') }}",
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
  $('.datatable-AppuntamentoTipologie:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection