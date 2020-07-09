@extends('layouts.admin')
@section('content')
@can('immobile_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.immobiles.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.immobile.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.immobile.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Immobile">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.immobile.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.immobile.fields.nome') }}
                        </th>
                        <th>
                            {{ trans('cruds.immobile.fields.tipologia') }}
                        </th>
                        <th>
                            {{ trans('cruds.immobile.fields.cliente') }}
                        </th>
                        <th>
                            {{ trans('cruds.immobile.fields.agente') }}
                        </th>
                        <th>
                            {{ trans('cruds.agentProfile.fields.indirizzo') }}
                        </th>
                        <th>
                            {{ trans('cruds.immobile.fields.filiale') }}
                        </th>
                        <th>
                            {{ trans('cruds.immobile.fields.tipologia_immobile') }}
                        </th>
                        <th>
                            {{ trans('cruds.immobile.fields.comune') }}
                        </th>
                        <th>
                            {{ trans('cruds.immobile.fields.indirizzo') }}
                        </th>
                        <th>
                            {{ trans('cruds.immobile.fields.civico') }}
                        </th>
                        <th>
                            {{ trans('cruds.immobile.fields.anno_ristrutturazione') }}
                        </th>
                        <th>
                            {{ trans('cruds.immobile.fields.catasto_sezione') }}
                        </th>
                        <th>
                            {{ trans('cruds.immobile.fields.ml_2') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($immobiles as $key => $immobile)
                        <tr data-entry-id="{{ $immobile->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $immobile->id ?? '' }}
                            </td>
                            <td>
                                {{ $immobile->nome ?? '' }}
                            </td>
                            <td>
                                {{ App\Immobile::TIPOLOGIA_SELECT[$immobile->tipologia] ?? '' }}
                            </td>
                            <td>
                                {{ $immobile->cliente->ruolo ?? '' }}
                            </td>
                            <td>
                                {{ $immobile->agente->nome ?? '' }}
                            </td>
                            <td>
                                {{ $immobile->agente->indirizzo ?? '' }}
                            </td>
                            <td>
                                {{ $immobile->filiale->nome ?? '' }}
                            </td>
                            <td>
                                {{ $immobile->tipologia_immobile->nome ?? '' }}
                            </td>
                            <td>
                                {{ $immobile->comune->nome ?? '' }}
                            </td>
                            <td>
                                {{ $immobile->indirizzo ?? '' }}
                            </td>
                            <td>
                                {{ $immobile->civico ?? '' }}
                            </td>
                            <td>
                                {{ $immobile->anno_ristrutturazione ?? '' }}
                            </td>
                            <td>
                                {{ $immobile->catasto_sezione ?? '' }}
                            </td>
                            <td>
                                {{ $immobile->ml_2 ?? '' }}
                            </td>
                            <td>
                                @can('immobile_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.immobiles.show', $immobile->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('immobile_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.immobiles.edit', $immobile->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('immobile_delete')
                                    <form action="{{ route('admin.immobiles.destroy', $immobile->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('immobile_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.immobiles.massDestroy') }}",
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
  $('.datatable-Immobile:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection