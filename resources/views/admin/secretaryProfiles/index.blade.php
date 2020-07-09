@extends('layouts.admin')
@section('content')
@can('secretary_profile_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.secretary-profiles.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.secretaryProfile.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.secretaryProfile.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-SecretaryProfile">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.secretaryProfile.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.secretaryProfile.fields.nome') }}
                        </th>
                        <th>
                            {{ trans('cruds.secretaryProfile.fields.indirizzo') }}
                        </th>
                        <th>
                            {{ trans('cruds.secretaryProfile.fields.cap') }}
                        </th>
                        <th>
                            {{ trans('cruds.secretaryProfile.fields.telefono') }}
                        </th>
                        <th>
                            {{ trans('cruds.secretaryProfile.fields.cellulare') }}
                        </th>
                        <th>
                            {{ trans('cruds.secretaryProfile.fields.fax') }}
                        </th>
                        <th>
                            {{ trans('cruds.secretaryProfile.fields.lunedi_inizio') }}
                        </th>
                        <th>
                            {{ trans('cruds.secretaryProfile.fields.lunedi_fine') }}
                        </th>
                        <th>
                            {{ trans('cruds.secretaryProfile.fields.martedi_inizio') }}
                        </th>
                        <th>
                            {{ trans('cruds.secretaryProfile.fields.martedi_fine') }}
                        </th>
                        <th>
                            {{ trans('cruds.secretaryProfile.fields.mercoledi_inizio') }}
                        </th>
                        <th>
                            {{ trans('cruds.secretaryProfile.fields.mercoledi_fine') }}
                        </th>
                        <th>
                            {{ trans('cruds.secretaryProfile.fields.giovedi_inizio') }}
                        </th>
                        <th>
                            {{ trans('cruds.secretaryProfile.fields.giovedi_fine') }}
                        </th>
                        <th>
                            {{ trans('cruds.secretaryProfile.fields.venerdi_inizio') }}
                        </th>
                        <th>
                            {{ trans('cruds.secretaryProfile.fields.venerdi_fine') }}
                        </th>
                        <th>
                            {{ trans('cruds.secretaryProfile.fields.sabato_inizio') }}
                        </th>
                        <th>
                            {{ trans('cruds.secretaryProfile.fields.sabato_fine') }}
                        </th>
                        <th>
                            {{ trans('cruds.secretaryProfile.fields.domenica_inizio') }}
                        </th>
                        <th>
                            {{ trans('cruds.secretaryProfile.fields.domenica_fine') }}
                        </th>
                        <th>
                            {{ trans('cruds.secretaryProfile.fields.comune') }}
                        </th>
                        <th>
                            {{ trans('cruds.secretaryProfile.fields.filiale') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($secretaryProfiles as $key => $secretaryProfile)
                        <tr data-entry-id="{{ $secretaryProfile->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $secretaryProfile->id ?? '' }}
                            </td>
                            <td>
                                {{ $secretaryProfile->nome ?? '' }}
                            </td>
                            <td>
                                {{ $secretaryProfile->indirizzo ?? '' }}
                            </td>
                            <td>
                                {{ $secretaryProfile->cap ?? '' }}
                            </td>
                            <td>
                                {{ $secretaryProfile->telefono ?? '' }}
                            </td>
                            <td>
                                {{ $secretaryProfile->cellulare ?? '' }}
                            </td>
                            <td>
                                {{ $secretaryProfile->fax ?? '' }}
                            </td>
                            <td>
                                {{ $secretaryProfile->lunedi_inizio ?? '' }}
                            </td>
                            <td>
                                {{ $secretaryProfile->lunedi_fine ?? '' }}
                            </td>
                            <td>
                                {{ $secretaryProfile->martedi_inizio ?? '' }}
                            </td>
                            <td>
                                {{ $secretaryProfile->martedi_fine ?? '' }}
                            </td>
                            <td>
                                {{ $secretaryProfile->mercoledi_inizio ?? '' }}
                            </td>
                            <td>
                                {{ $secretaryProfile->mercoledi_fine ?? '' }}
                            </td>
                            <td>
                                {{ $secretaryProfile->giovedi_inizio ?? '' }}
                            </td>
                            <td>
                                {{ $secretaryProfile->giovedi_fine ?? '' }}
                            </td>
                            <td>
                                {{ $secretaryProfile->venerdi_inizio ?? '' }}
                            </td>
                            <td>
                                {{ $secretaryProfile->venerdi_fine ?? '' }}
                            </td>
                            <td>
                                {{ $secretaryProfile->sabato_inizio ?? '' }}
                            </td>
                            <td>
                                {{ $secretaryProfile->sabato_fine ?? '' }}
                            </td>
                            <td>
                                {{ $secretaryProfile->domenica_inizio ?? '' }}
                            </td>
                            <td>
                                {{ $secretaryProfile->domenica_fine ?? '' }}
                            </td>
                            <td>
                                {{ $secretaryProfile->comune->nome ?? '' }}
                            </td>
                            <td>
                                {{ $secretaryProfile->filiale->nome ?? '' }}
                            </td>
                            <td>
                                @can('secretary_profile_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.secretary-profiles.show', $secretaryProfile->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('secretary_profile_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.secretary-profiles.edit', $secretaryProfile->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('secretary_profile_delete')
                                    <form action="{{ route('admin.secretary-profiles.destroy', $secretaryProfile->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('secretary_profile_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.secretary-profiles.massDestroy') }}",
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
  let table = $('.datatable-SecretaryProfile:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection