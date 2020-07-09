@extends('layouts.admin')
@section('content')
@can('tipologia_contratto_prezzo_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.tipologia-contratto-prezzos.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.tipologiaContrattoPrezzo.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.tipologiaContrattoPrezzo.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-TipologiaContrattoPrezzo">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.tipologiaContrattoPrezzo.fields.id') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tipologiaContrattoPrezzos as $key => $tipologiaContrattoPrezzo)
                        <tr data-entry-id="{{ $tipologiaContrattoPrezzo->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $tipologiaContrattoPrezzo->id ?? '' }}
                            </td>
                            <td>
                                @can('tipologia_contratto_prezzo_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.tipologia-contratto-prezzos.show', $tipologiaContrattoPrezzo->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('tipologia_contratto_prezzo_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.tipologia-contratto-prezzos.edit', $tipologiaContrattoPrezzo->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('tipologia_contratto_prezzo_delete')
                                    <form action="{{ route('admin.tipologia-contratto-prezzos.destroy', $tipologiaContrattoPrezzo->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('tipologia_contratto_prezzo_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.tipologia-contratto-prezzos.massDestroy') }}",
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
  $('.datatable-TipologiaContrattoPrezzo:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection