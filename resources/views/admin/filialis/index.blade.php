@extends('layouts.admin')
@section('content')
@can('filiali_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.filialis.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.filiali.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.filiali.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Filiali">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.filiali.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.filiali.fields.agenzia') }}
                        </th>
                        <th>
                            {{ trans('cruds.filiali.fields.nome') }}
                        </th>
                        <th>
                            {{ trans('cruds.filiali.fields.comune') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($filialis as $key => $filiali)
                        <tr data-entry-id="{{ $filiali->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $filiali->id ?? '' }}
                            </td>
                            <td>
                                {{ $filiali->agenzia->nome ?? '' }}
                            </td>
                            <td>
                                {{ $filiali->nome ?? '' }}
                            </td>
                            <td>
                                {{ $filiali->comune->nome ?? '' }}
                            </td>
                            <td>
                                @can('filiali_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.filialis.show', $filiali->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('filiali_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.filialis.edit', $filiali->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('filiali_delete')
                                    <form action="{{ route('admin.filialis.destroy', $filiali->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('filiali_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.filialis.massDestroy') }}",
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
  let table = $('.datatable-Filiali:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection