@extends('layouts.admin')
@section('content')
@can('tipologia_mandato_pratica_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.tipologia-mandato-praticas.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.tipologiaMandatoPratica.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.tipologiaMandatoPratica.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-TipologiaMandatoPratica">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.tipologiaMandatoPratica.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.tipologiaMandatoPratica.fields.nome') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tipologiaMandatoPraticas as $key => $tipologiaMandatoPratica)
                        <tr data-entry-id="{{ $tipologiaMandatoPratica->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $tipologiaMandatoPratica->id ?? '' }}
                            </td>
                            <td>
                                {{ $tipologiaMandatoPratica->nome ?? '' }}
                            </td>
                            <td>
                                @can('tipologia_mandato_pratica_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.tipologia-mandato-praticas.show', $tipologiaMandatoPratica->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('tipologia_mandato_pratica_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.tipologia-mandato-praticas.edit', $tipologiaMandatoPratica->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('tipologia_mandato_pratica_delete')
                                    <form action="{{ route('admin.tipologia-mandato-praticas.destroy', $tipologiaMandatoPratica->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('tipologia_mandato_pratica_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.tipologia-mandato-praticas.massDestroy') }}",
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
  $('.datatable-TipologiaMandatoPratica:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection