@extends('layouts.admin')
@section('content')
@can('agent_client_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.agent-clients.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.agentClient.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.agentClient.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-AgentClient">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.agentClient.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.agentClient.fields.tipo') }}
                        </th>
                        <th>
                            {{ trans('cruds.agentClient.fields.ruolo') }}
                        </th>
                        <th>
                            {{ trans('cruds.agentClient.fields.settore') }}
                        </th>
                        <th>
                            {{ trans('cruds.agentClient.fields.indirizzo') }}
                        </th>
                        <th>
                            {{ trans('cruds.agentClient.fields.civico') }}
                        </th>
                        <th>
                            {{ trans('cruds.agentClient.fields.cap') }}
                        </th>
                        <th>
                            {{ trans('cruds.agentClient.fields.comune') }}
                        </th>
                        <th>
                            {{ trans('cruds.agentClient.fields.provincia') }}
                        </th>
                        <th>
                            {{ trans('cruds.agentClient.fields.azienda') }}
                        </th>
                        <th>
                            {{ trans('cruds.agentClient.fields.piva') }}
                        </th>
                        <th>
                            {{ trans('cruds.agentClient.fields.telefono') }}
                        </th>
                        <th>
                            {{ trans('cruds.agentClient.fields.cellulare') }}
                        </th>
                        <th>
                            {{ trans('cruds.agentClient.fields.fax') }}
                        </th>
                        <th>
                            {{ trans('cruds.agentClient.fields.livello') }}
                        </th>
                        <th>
                            {{ trans('cruds.agentClient.fields.note') }}
                        </th>
                        <th>
                            {{ trans('cruds.agentClient.fields.birthday') }}
                        </th>
                        <th>
                            {{ trans('cruds.agentClient.fields.nazione') }}
                        </th>
                        <th>
                            {{ trans('cruds.agentClient.fields.nome_2') }}
                        </th>
                        <th>
                            {{ trans('cruds.agentClient.fields.cognome_2') }}
                        </th>
                        <th>
                            {{ trans('cruds.agentClient.fields.affinita') }}
                        </th>
                        <th>
                            {{ trans('cruds.agentClient.fields.email_2') }}
                        </th>
                        <th>
                            {{ trans('cruds.agentClient.fields.comune_2') }}
                        </th>
                        <th>
                            {{ trans('cruds.agentClient.fields.prov_2') }}
                        </th>
                        <th>
                            {{ trans('cruds.agentClient.fields.indirizzo_2') }}
                        </th>
                        <th>
                            {{ trans('cruds.agentClient.fields.civico_2') }}
                        </th>
                        <th>
                            {{ trans('cruds.agentClient.fields.cap_2') }}
                        </th>
                        <th>
                            {{ trans('cruds.agentClient.fields.telefono_2') }}
                        </th>
                        <th>
                            {{ trans('cruds.agentClient.fields.cellulare_2') }}
                        </th>
                        <th>
                            {{ trans('cruds.agentClient.fields.fax_2') }}
                        </th>
                        <th>
                            {{ trans('cruds.agentClient.fields.stato') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($agentClients as $key => $agentClient)
                        <tr data-entry-id="{{ $agentClient->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $agentClient->id ?? '' }}
                            </td>
                            <td>
                                {{ $agentClient->tipo->tipologia ?? '' }}
                            </td>
                            <td>
                                {{ $agentClient->ruolo ?? '' }}
                            </td>
                            <td>
                                {{ $agentClient->settore ?? '' }}
                            </td>
                            <td>
                                {{ $agentClient->indirizzo ?? '' }}
                            </td>
                            <td>
                                {{ $agentClient->civico ?? '' }}
                            </td>
                            <td>
                                {{ $agentClient->cap ?? '' }}
                            </td>
                            <td>
                                {{ $agentClient->comune->nome ?? '' }}
                            </td>
                            <td>
                                {{ $agentClient->provincia->nome ?? '' }}
                            </td>
                            <td>
                                {{ $agentClient->azienda ?? '' }}
                            </td>
                            <td>
                                {{ $agentClient->piva ?? '' }}
                            </td>
                            <td>
                                {{ $agentClient->telefono ?? '' }}
                            </td>
                            <td>
                                {{ $agentClient->cellulare ?? '' }}
                            </td>
                            <td>
                                {{ $agentClient->fax ?? '' }}
                            </td>
                            <td>
                                {{ $agentClient->livello ?? '' }}
                            </td>
                            <td>
                                {{ $agentClient->note ?? '' }}
                            </td>
                            <td>
                                {{ $agentClient->birthday ?? '' }}
                            </td>
                            <td>
                                {{ $agentClient->nazione ?? '' }}
                            </td>
                            <td>
                                {{ $agentClient->nome_2 ?? '' }}
                            </td>
                            <td>
                                {{ $agentClient->cognome_2 ?? '' }}
                            </td>
                            <td>
                                {{ $agentClient->affinita ?? '' }}
                            </td>
                            <td>
                                {{ $agentClient->email_2 ?? '' }}
                            </td>
                            <td>
                                {{ $agentClient->comune_2->nome ?? '' }}
                            </td>
                            <td>
                                {{ $agentClient->prov_2->nome ?? '' }}
                            </td>
                            <td>
                                {{ $agentClient->indirizzo_2 ?? '' }}
                            </td>
                            <td>
                                {{ $agentClient->civico_2 ?? '' }}
                            </td>
                            <td>
                                {{ $agentClient->cap_2 ?? '' }}
                            </td>
                            <td>
                                {{ $agentClient->telefono_2 ?? '' }}
                            </td>
                            <td>
                                {{ $agentClient->cellulare_2 ?? '' }}
                            </td>
                            <td>
                                {{ $agentClient->fax_2 ?? '' }}
                            </td>
                            <td>
                                {{ $agentClient->stato ?? '' }}
                            </td>
                            <td>
                                @can('agent_client_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.agent-clients.show', $agentClient->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('agent_client_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.agent-clients.edit', $agentClient->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('agent_client_delete')
                                    <form action="{{ route('admin.agent-clients.destroy', $agentClient->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('agent_client_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.agent-clients.massDestroy') }}",
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
  $('.datatable-AgentClient:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection