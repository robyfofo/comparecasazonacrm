@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.agentProfile.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.agent-profiles.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.agentProfile.fields.id') }}
                        </th>
                        <td>
                            {{ $agentProfile->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agentProfile.fields.nome') }}
                        </th>
                        <td>
                            {{ $agentProfile->nome }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agentProfile.fields.indirizzo') }}
                        </th>
                        <td>
                            {{ $agentProfile->indirizzo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agentProfile.fields.cap') }}
                        </th>
                        <td>
                            {{ $agentProfile->cap }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agentProfile.fields.telefono') }}
                        </th>
                        <td>
                            {{ $agentProfile->telefono }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agentProfile.fields.cellulare') }}
                        </th>
                        <td>
                            {{ $agentProfile->cellulare }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agentProfile.fields.fax') }}
                        </th>
                        <td>
                            {{ $agentProfile->fax }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agentProfile.fields.lunedi_inizio') }}
                        </th>
                        <td>
                            {{ $agentProfile->lunedi_inizio }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agentProfile.fields.lunedi_fine') }}
                        </th>
                        <td>
                            {{ $agentProfile->lunedi_fine }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agentProfile.fields.martedi_inizio') }}
                        </th>
                        <td>
                            {{ $agentProfile->martedi_inizio }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agentProfile.fields.martedi_fine') }}
                        </th>
                        <td>
                            {{ $agentProfile->martedi_fine }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agentProfile.fields.mercoledi_inizio') }}
                        </th>
                        <td>
                            {{ $agentProfile->mercoledi_inizio }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agentProfile.fields.mercoledi_fine') }}
                        </th>
                        <td>
                            {{ $agentProfile->mercoledi_fine }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agentProfile.fields.giovedi_inizio') }}
                        </th>
                        <td>
                            {{ $agentProfile->giovedi_inizio }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agentProfile.fields.giovedi_fine') }}
                        </th>
                        <td>
                            {{ $agentProfile->giovedi_fine }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agentProfile.fields.venerdi_inizio') }}
                        </th>
                        <td>
                            {{ $agentProfile->venerdi_inizio }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agentProfile.fields.venerdi_fine') }}
                        </th>
                        <td>
                            {{ $agentProfile->venerdi_fine }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agentProfile.fields.sabato_inizio') }}
                        </th>
                        <td>
                            {{ $agentProfile->sabato_inizio }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agentProfile.fields.sabato_fine') }}
                        </th>
                        <td>
                            {{ $agentProfile->sabato_fine }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agentProfile.fields.domenica_inizio') }}
                        </th>
                        <td>
                            {{ $agentProfile->domenica_inizio }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agentProfile.fields.domenica_fine') }}
                        </th>
                        <td>
                            {{ $agentProfile->domenica_fine }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agentProfile.fields.comune') }}
                        </th>
                        <td>
                            {{ $agentProfile->comune->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agentProfile.fields.filiale') }}
                        </th>
                        <td>
                            {{ $agentProfile->filiale->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agentProfile.fields.email_istituzionale') }}
                        </th>
                        <td>
                            {{ $agentProfile->email_istituzionale }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.agent-profiles.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection