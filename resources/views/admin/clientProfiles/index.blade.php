@extends('layouts.admin')
@section('content')
@can('client_profile_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.client-profiles.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.clientProfile.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.clientProfile.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-ClientProfile">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.clientProfile.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.clientProfile.fields.tipo') }}
                    </th>
                    <th>
                        {{ trans('cruds.clientProfile.fields.ruolo') }}
                    </th>
                    <th>
                        {{ trans('cruds.clientProfile.fields.settore') }}
                    </th>
                    <th>
                        {{ trans('cruds.clientProfile.fields.indirizzo') }}
                    </th>
                    <th>
                        {{ trans('cruds.clientProfile.fields.civico') }}
                    </th>
                    <th>
                        {{ trans('cruds.clientProfile.fields.cap') }}
                    </th>
                    <th>
                        {{ trans('cruds.clientProfile.fields.comune') }}
                    </th>
                    <th>
                        {{ trans('cruds.clientProfile.fields.provincia') }}
                    </th>
                    <th>
                        {{ trans('cruds.clientProfile.fields.azienda') }}
                    </th>
                    <th>
                        {{ trans('cruds.clientProfile.fields.piva') }}
                    </th>
                    <th>
                        {{ trans('cruds.clientProfile.fields.telefono') }}
                    </th>
                    <th>
                        {{ trans('cruds.clientProfile.fields.cellulare') }}
                    </th>
                    <th>
                        {{ trans('cruds.clientProfile.fields.fax') }}
                    </th>
                    <th>
                        {{ trans('cruds.clientProfile.fields.livello') }}
                    </th>
                    <th>
                        {{ trans('cruds.clientProfile.fields.note') }}
                    </th>
                    <th>
                        {{ trans('cruds.clientProfile.fields.birthday') }}
                    </th>
                    <th>
                        {{ trans('cruds.clientProfile.fields.nazione') }}
                    </th>
                    <th>
                        {{ trans('cruds.clientProfile.fields.nome_2') }}
                    </th>
                    <th>
                        {{ trans('cruds.clientProfile.fields.cognome_2') }}
                    </th>
                    <th>
                        {{ trans('cruds.clientProfile.fields.affinita') }}
                    </th>
                    <th>
                        {{ trans('cruds.clientProfile.fields.email_2') }}
                    </th>
                    <th>
                        {{ trans('cruds.clientProfile.fields.comune_2') }}
                    </th>
                    <th>
                        {{ trans('cruds.clientProfile.fields.prov_2') }}
                    </th>
                    <th>
                        {{ trans('cruds.clientProfile.fields.indirizzo_2') }}
                    </th>
                    <th>
                        {{ trans('cruds.clientProfile.fields.civico_2') }}
                    </th>
                    <th>
                        {{ trans('cruds.clientProfile.fields.cap_2') }}
                    </th>
                    <th>
                        {{ trans('cruds.clientProfile.fields.telefono_2') }}
                    </th>
                    <th>
                        {{ trans('cruds.clientProfile.fields.cellulare_2') }}
                    </th>
                    <th>
                        {{ trans('cruds.clientProfile.fields.fax_2') }}
                    </th>
                    <th>
                        {{ trans('cruds.clientProfile.fields.stato') }}
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
@can('client_profile_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.client-profiles.massDestroy') }}",
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
    ajax: "{{ route('admin.client-profiles.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'tipo_tipologia', name: 'tipo.tipologia' },
{ data: 'ruolo', name: 'ruolo' },
{ data: 'settore', name: 'settore' },
{ data: 'indirizzo', name: 'indirizzo' },
{ data: 'civico', name: 'civico' },
{ data: 'cap', name: 'cap' },
{ data: 'comune_nome', name: 'comune.nome' },
{ data: 'provincia_nome', name: 'provincia.nome' },
{ data: 'azienda', name: 'azienda' },
{ data: 'piva', name: 'piva' },
{ data: 'telefono', name: 'telefono' },
{ data: 'cellulare', name: 'cellulare' },
{ data: 'fax', name: 'fax' },
{ data: 'livello', name: 'livello' },
{ data: 'note', name: 'note' },
{ data: 'birthday', name: 'birthday' },
{ data: 'nazione', name: 'nazione' },
{ data: 'nome_2', name: 'nome_2' },
{ data: 'cognome_2', name: 'cognome_2' },
{ data: 'affinita', name: 'affinita' },
{ data: 'email_2', name: 'email_2' },
{ data: 'comune_2_nome', name: 'comune_2.nome' },
{ data: 'prov_2_nome', name: 'prov_2.nome' },
{ data: 'indirizzo_2', name: 'indirizzo_2' },
{ data: 'civico_2', name: 'civico_2' },
{ data: 'cap_2', name: 'cap_2' },
{ data: 'telefono_2', name: 'telefono_2' },
{ data: 'cellulare_2', name: 'cellulare_2' },
{ data: 'fax_2', name: 'fax_2' },
{ data: 'stato', name: 'stato' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  };
  let table = $('.datatable-ClientProfile').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection