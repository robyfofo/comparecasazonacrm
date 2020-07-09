@extends('layouts.admin')
@section('content')
@can('richiestum_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.richiesta.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.richiestum.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.richiestum.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Richiestum">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.richiestum.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.richiestum.fields.agente') }}
                    </th>
                    <th>
                        {{ trans('cruds.richiestum.fields.agenzia') }}
                    </th>
                    <th>
                        {{ trans('cruds.richiestum.fields.cliente') }}
                    </th>
                    <th>
                        {{ trans('cruds.richiestum.fields.provincia') }}
                    </th>
                    <th>
                        {{ trans('cruds.richiestum.fields.prezzo') }}
                    </th>
                    <th>
                        {{ trans('cruds.richiestum.fields.tipologia_immobile') }}
                    </th>
                    <th>
                        {{ trans('cruds.richiestum.fields.priorita') }}
                    </th>
                    <th>
                        {{ trans('cruds.richiestum.fields.destinazione') }}
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
            </thead>
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('richiestum_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.richiesta.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
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

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.richiesta.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'agente_telefono', name: 'agente.telefono' },
{ data: 'agenzia_nome', name: 'agenzia.nome' },
{ data: 'cliente_ruolo', name: 'cliente.ruolo' },
{ data: 'provincia_nome', name: 'provincia.nome' },
{ data: 'prezzo', name: 'prezzo' },
{ data: 'tipologia_immobile_insieme', name: 'tipologia_immobile.insieme' },
{ data: 'priorita', name: 'priorita' },
{ data: 'destinazione', name: 'destinazione' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  };
  $('.datatable-Richiestum').DataTable(dtOverrideGlobals);
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
});

</script>
@endsection