<div class="m-3">
    @can('agent_profile_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.agent-profiles.create") }}">
                    {{ trans('global.add') }} {{ trans('cruds.agentProfile.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.agentProfile.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-AgentProfile">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.agentProfile.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.agentProfile.fields.nome') }}
                            </th>
                            <th>
                                {{ trans('cruds.agentProfile.fields.cognome') }}
                            </th>
                            <th>
                                {{ trans('cruds.agentProfile.fields.indirizzo') }}
                            </th>
                            <th>
                                {{ trans('cruds.agentProfile.fields.cap') }}
                            </th>
                            <th>
                                {{ trans('cruds.agentProfile.fields.telefono') }}
                            </th>
                            <th>
                                {{ trans('cruds.agentProfile.fields.cellulare') }}
                            </th>
                            <th>
                                {{ trans('cruds.agentProfile.fields.fax') }}
                            </th>
                            <th>
                                {{ trans('cruds.agentProfile.fields.lunedi_inizio') }}
                            </th>
                            <th>
                                {{ trans('cruds.agentProfile.fields.lunedi_fine') }}
                            </th>
                            <th>
                                {{ trans('cruds.agentProfile.fields.martedi_inizio') }}
                            </th>
                            <th>
                                {{ trans('cruds.agentProfile.fields.martedi_fine') }}
                            </th>
                            <th>
                                {{ trans('cruds.agentProfile.fields.mercoledi_inizio') }}
                            </th>
                            <th>
                                {{ trans('cruds.agentProfile.fields.mercoledi_fine') }}
                            </th>
                            <th>
                                {{ trans('cruds.agentProfile.fields.giovedi_inizio') }}
                            </th>
                            <th>
                                {{ trans('cruds.agentProfile.fields.giovedi_fine') }}
                            </th>
                            <th>
                                {{ trans('cruds.agentProfile.fields.venerdi_inizio') }}
                            </th>
                            <th>
                                {{ trans('cruds.agentProfile.fields.venerdi_fine') }}
                            </th>
                            <th>
                                {{ trans('cruds.agentProfile.fields.sabato_inizio') }}
                            </th>
                            <th>
                                {{ trans('cruds.agentProfile.fields.sabato_fine') }}
                            </th>
                            <th>
                                {{ trans('cruds.agentProfile.fields.domenica_inizio') }}
                            </th>
                            <th>
                                {{ trans('cruds.agentProfile.fields.domenica_fine') }}
                            </th>
                            <th>
                                {{ trans('cruds.agentProfile.fields.comune') }}
                            </th>
                            <th>
                                {{ trans('cruds.agentProfile.fields.filiale') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($agentProfiles as $key => $agentProfile)
                            <tr data-entry-id="{{ $agentProfile->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $agentProfile->id ?? '' }}
                                </td>
                                <td>
                                    {{ $agentProfile->nome ?? '' }}
                                </td>
                                <td>
                                    {{ $agentProfile->cognome ?? '' }}
                                </td>
                                <td>
                                    {{ $agentProfile->indirizzo ?? '' }}
                                </td>
                                <td>
                                    {{ $agentProfile->cap ?? '' }}
                                </td>
                                <td>
                                    {{ $agentProfile->telefono ?? '' }}
                                </td>
                                <td>
                                    {{ $agentProfile->cellulare ?? '' }}
                                </td>
                                <td>
                                    {{ $agentProfile->fax ?? '' }}
                                </td>
                                <td>
                                    {{ $agentProfile->lunedi_inizio ?? '' }}
                                </td>
                                <td>
                                    {{ $agentProfile->lunedi_fine ?? '' }}
                                </td>
                                <td>
                                    {{ $agentProfile->martedi_inizio ?? '' }}
                                </td>
                                <td>
                                    {{ $agentProfile->martedi_fine ?? '' }}
                                </td>
                                <td>
                                    {{ $agentProfile->mercoledi_inizio ?? '' }}
                                </td>
                                <td>
                                    {{ $agentProfile->mercoledi_fine ?? '' }}
                                </td>
                                <td>
                                    {{ $agentProfile->giovedi_inizio ?? '' }}
                                </td>
                                <td>
                                    {{ $agentProfile->giovedi_fine ?? '' }}
                                </td>
                                <td>
                                    {{ $agentProfile->venerdi_inizio ?? '' }}
                                </td>
                                <td>
                                    {{ $agentProfile->venerdi_fine ?? '' }}
                                </td>
                                <td>
                                    {{ $agentProfile->sabato_inizio ?? '' }}
                                </td>
                                <td>
                                    {{ $agentProfile->sabato_fine ?? '' }}
                                </td>
                                <td>
                                    {{ $agentProfile->domenica_inizio ?? '' }}
                                </td>
                                <td>
                                    {{ $agentProfile->domenica_fine ?? '' }}
                                </td>
                                <td>
                                    {{ $agentProfile->comune->nome ?? '' }}
                                </td>
                                <td>
                                    {{ $agentProfile->filiale->nome ?? '' }}
                                </td>
                                <td>
                                    @can('agent_profile_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.agent-profiles.show', $agentProfile->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('agent_profile_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.agent-profiles.edit', $agentProfile->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('agent_profile_delete')
                                        <form action="{{ route('admin.agent-profiles.destroy', $agentProfile->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('agent_profile_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.agent-profiles.massDestroy') }}",
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
  $('.datatable-AgentProfile:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection