@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.adminSetting.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.admin-settings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.adminSetting.fields.id') }}
                        </th>
                        <td>
                            {{ $adminSetting->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.adminSetting.fields.alert_pratica_scadenza_incarico') }}
                        </th>
                        <td>
                            {{ $adminSetting->alert_pratica_scadenza_incarico }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.adminSetting.fields.alert_pratica_scadenza_incarico_on') }}
                        </th>
                        <td>
                            {{ App\AdminSetting::ALERT_PRATICA_SCADENZA_INCARICO_ON_RADIO[$adminSetting->alert_pratica_scadenza_incarico_on] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.adminSetting.fields.alert_appuntamento') }}
                        </th>
                        <td>
                            {{ $adminSetting->alert_appuntamento }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.adminSetting.fields.alert_appuntamento_on') }}
                        </th>
                        <td>
                            {{ App\AdminSetting::ALERT_APPUNTAMENTO_ON_RADIO[$adminSetting->alert_appuntamento_on] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.adminSetting.fields.agenzia') }}
                        </th>
                        <td>
                            {{ $adminSetting->agenzia->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.adminSetting.fields.filiale') }}
                        </th>
                        <td>
                            {{ $adminSetting->filiale->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.adminSetting.fields.alert_pratica_scadenza_affitto') }}
                        </th>
                        <td>
                            {{ $adminSetting->alert_pratica_scadenza_affitto }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.adminSetting.fields.alert_pratica_scadenza_affitto_on') }}
                        </th>
                        <td>
                            {{ App\AdminSetting::ALERT_PRATICA_SCADENZA_AFFITTO_ON_RADIO[$adminSetting->alert_pratica_scadenza_affitto_on] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.adminSetting.fields.alert_richiamata_cliente_on') }}
                        </th>
                        <td>
                            {{ App\AdminSetting::ALERT_RICHIAMATA_CLIENTE_ON_RADIO[$adminSetting->alert_richiamata_cliente_on] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.adminSetting.fields.alert_richiamata_cliente') }}
                        </th>
                        <td>
                            {{ $adminSetting->alert_richiamata_cliente }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.admin-settings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection