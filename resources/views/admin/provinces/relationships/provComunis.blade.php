<div class="m-3">
    @can('comuni_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.comunis.create") }}">
                    {{ trans('global.add') }} {{ trans('cruds.comuni.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.comuni.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-Comuni">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.comuni.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.comuni.fields.nome') }}
                            </th>
                            <th>
                                {{ trans('cruds.comuni.fields.cap') }}
                            </th>
                            <th>
                                {{ trans('cruds.comuni.fields.prefisso') }}
                            </th>
                            <th>
                                {{ trans('cruds.comuni.fields.provincia') }}
                            </th>
                            <th>
                                {{ trans('cruds.comuni.fields.prov') }}
                            </th>
                            <th>
                                {{ trans('cruds.comuni.fields.stato') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($comunis as $key => $comuni)
                            <tr data-entry-id="{{ $comuni->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $comuni->id ?? '' }}
                                </td>
                                <td>
                                    {{ $comuni->nome ?? '' }}
                                </td>
                                <td>
                                    {{ $comuni->cap ?? '' }}
                                </td>
                                <td>
                                    {{ $comuni->prefisso ?? '' }}
                                </td>
                                <td>
                                    {{ $comuni->provincia ?? '' }}
                                </td>
                                <td>
                                    {{ $comuni->prov->nome ?? '' }}
                                </td>
                                <td>
                                    <span style="display:none">{{ $comuni->stato ?? '' }}</span>
                                    <input type="checkbox" disabled="disabled" {{ $comuni->stato ? 'checked' : '' }}>
                                </td>
                                <td>
                                    @can('comuni_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.comunis.show', $comuni->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('comuni_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.comunis.edit', $comuni->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('comuni_delete')
                                        <form action="{{ route('admin.comunis.destroy', $comuni->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
</div>
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('comuni_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.comunis.massDestroy') }}",
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
  $('.datatable-Comuni:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection