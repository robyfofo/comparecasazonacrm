@extends('layouts.admin')
@section('content')
@can('tipologia_immobili_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.tipologia-immobilis.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.tipologiaImmobili.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.tipologiaImmobili.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-TipologiaImmobili">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.tipologiaImmobili.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.tipologiaImmobili.fields.insieme') }}
                        </th>
                        <th>
                            {{ trans('cruds.tipologiaImmobili.fields.nome') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tipologiaImmobilis as $key => $tipologiaImmobili)
                        <tr data-entry-id="{{ $tipologiaImmobili->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $tipologiaImmobili->id ?? '' }}
                            </td>
                            <td>
                                {{ $tipologiaImmobili->insieme ?? '' }}
                            </td>
                            <td>
                                {{ $tipologiaImmobili->nome ?? '' }}
                            </td>
                            <td>
                                @can('tipologia_immobili_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.tipologia-immobilis.show', $tipologiaImmobili->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('tipologia_immobili_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.tipologia-immobilis.edit', $tipologiaImmobili->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('tipologia_immobili_delete')
                                    <form action="{{ route('admin.tipologia-immobilis.destroy', $tipologiaImmobili->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('tipologia_immobili_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.tipologia-immobilis.massDestroy') }}",
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
  $('.datatable-TipologiaImmobili:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection