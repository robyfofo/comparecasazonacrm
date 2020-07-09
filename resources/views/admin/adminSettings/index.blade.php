@extends('layouts.admin')
@section('content')
@can('admin_setting_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.admin-settings.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.adminSetting.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.adminSetting.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-AdminSetting">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.adminSetting.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.adminSetting.fields.alert_pratica_scadenza_incarico') }}
                        </th>
                        <th>
                            {{ trans('cruds.adminSetting.fields.alert_pratica_scadenza_incarico_on') }}
                        </th>
                        <th>
                            {{ trans('cruds.adminSetting.fields.alert_appuntamento') }}
                        </th>
                        <th>
                            {{ trans('cruds.adminSetting.fields.alert_appuntamento_on') }}
                        </th>
                        <th>
                            {{ trans('cruds.adminSetting.fields.agenzia') }}
                        </th>
                        <th>
                            {{ trans('cruds.adminSetting.fields.filiale') }}
                        </th>
                        <th>
                            {{ trans('cruds.adminSetting.fields.alert_pratica_scadenza_affitto') }}
                        </th>
                        <th>
                            {{ trans('cruds.adminSetting.fields.alert_pratica_scadenza_affitto_on') }}
                        </th>
                        <th>
                            {{ trans('cruds.adminSetting.fields.alert_richiamata_cliente_on') }}
                        </th>
                        <th>
                            {{ trans('cruds.adminSetting.fields.alert_richiamata_cliente') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($adminSettings as $key => $adminSetting)
                        <tr data-entry-id="{{ $adminSetting->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $adminSetting->id ?? '' }}
                            </td>
                            <td>
                                {{ $adminSetting->alert_pratica_scadenza_incarico ?? '' }}
                            </td>
                            <td>
                                {{ App\AdminSetting::ALERT_PRATICA_SCADENZA_INCARICO_ON_RADIO[$adminSetting->alert_pratica_scadenza_incarico_on] ?? '' }}
                            </td>
                            <td>
                                {{ $adminSetting->alert_appuntamento ?? '' }}
                            </td>
                            <td>
                                {{ App\AdminSetting::ALERT_APPUNTAMENTO_ON_RADIO[$adminSetting->alert_appuntamento_on] ?? '' }}
                            </td>
                            <td>
                                {{ $adminSetting->agenzia->nome ?? '' }}
                            </td>
                            <td>
                                {{ $adminSetting->filiale->nome ?? '' }}
                            </td>
                            <td>
                                {{ $adminSetting->alert_pratica_scadenza_affitto ?? '' }}
                            </td>
                            <td>
                                {{ App\AdminSetting::ALERT_PRATICA_SCADENZA_AFFITTO_ON_RADIO[$adminSetting->alert_pratica_scadenza_affitto_on] ?? '' }}
                            </td>
                            <td>
                                {{ App\AdminSetting::ALERT_RICHIAMATA_CLIENTE_ON_RADIO[$adminSetting->alert_richiamata_cliente_on] ?? '' }}
                            </td>
                            <td>
                                {{ $adminSetting->alert_richiamata_cliente ?? '' }}
                            </td>
                            <td>
                                @can('admin_setting_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.admin-settings.show', $adminSetting->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('admin_setting_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.admin-settings.edit', $adminSetting->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('admin_setting_delete')
                                    <form action="{{ route('admin.admin-settings.destroy', $adminSetting->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('admin_setting_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.admin-settings.massDestroy') }}",
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
    order: [[ 1, 'asc' ]],
    pageLength: 25,
  });
  let table = $('.datatable-AdminSetting:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection