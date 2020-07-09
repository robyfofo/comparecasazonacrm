@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.agentClient.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.agent-clients.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.agentClient.fields.id') }}
                        </th>
                        <td>
                            {{ $agentClient->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agentClient.fields.agente') }}
                        </th>
                        <td>
                            {{ $agentClient->agente->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agentClient.fields.filiale') }}
                        </th>
                        <td>
                            {{ $agentClient->filiale->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agentClient.fields.tipo') }}
                        </th>
                        <td>
                            {{ $agentClient->tipo->tipologia ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agentClient.fields.ruolo') }}
                        </th>
                        <td>
                            {{ $agentClient->ruolo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agentClient.fields.settore') }}
                        </th>
                        <td>
                            {{ $agentClient->settore }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agentClient.fields.indirizzo') }}
                        </th>
                        <td>
                            {{ $agentClient->indirizzo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agentClient.fields.civico') }}
                        </th>
                        <td>
                            {{ $agentClient->civico }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agentClient.fields.cap') }}
                        </th>
                        <td>
                            {{ $agentClient->cap }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agentClient.fields.comune') }}
                        </th>
                        <td>
                            {{ $agentClient->comune->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agentClient.fields.provincia') }}
                        </th>
                        <td>
                            {{ $agentClient->provincia->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agentClient.fields.azienda') }}
                        </th>
                        <td>
                            {{ $agentClient->azienda }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agentClient.fields.piva') }}
                        </th>
                        <td>
                            {{ $agentClient->piva }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agentClient.fields.telefono') }}
                        </th>
                        <td>
                            {{ $agentClient->telefono }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agentClient.fields.cellulare') }}
                        </th>
                        <td>
                            {{ $agentClient->cellulare }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agentClient.fields.fax') }}
                        </th>
                        <td>
                            {{ $agentClient->fax }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agentClient.fields.livello') }}
                        </th>
                        <td>
                            {{ $agentClient->livello }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agentClient.fields.note') }}
                        </th>
                        <td>
                            {{ $agentClient->note }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agentClient.fields.birthday') }}
                        </th>
                        <td>
                            {{ $agentClient->birthday }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agentClient.fields.nazione') }}
                        </th>
                        <td>
                            {{ $agentClient->nazione }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agentClient.fields.nome_2') }}
                        </th>
                        <td>
                            {{ $agentClient->nome_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agentClient.fields.cognome_2') }}
                        </th>
                        <td>
                            {{ $agentClient->cognome_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agentClient.fields.affinita') }}
                        </th>
                        <td>
                            {{ $agentClient->affinita }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agentClient.fields.email_2') }}
                        </th>
                        <td>
                            {{ $agentClient->email_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agentClient.fields.comune_2') }}
                        </th>
                        <td>
                            {{ $agentClient->comune_2->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agentClient.fields.prov_2') }}
                        </th>
                        <td>
                            {{ $agentClient->prov_2->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agentClient.fields.indirizzo_2') }}
                        </th>
                        <td>
                            {{ $agentClient->indirizzo_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agentClient.fields.civico_2') }}
                        </th>
                        <td>
                            {{ $agentClient->civico_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agentClient.fields.cap_2') }}
                        </th>
                        <td>
                            {{ $agentClient->cap_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agentClient.fields.telefono_2') }}
                        </th>
                        <td>
                            {{ $agentClient->telefono_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agentClient.fields.cellulare_2') }}
                        </th>
                        <td>
                            {{ $agentClient->cellulare_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agentClient.fields.fax_2') }}
                        </th>
                        <td>
                            {{ $agentClient->fax_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agentClient.fields.stato') }}
                        </th>
                        <td>
                            {{ $agentClient->stato }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agentClient.fields.files') }}
                        </th>
                        <td>
                            @foreach($agentClient->files as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agentClient.fields.email_istituzionale') }}
                        </th>
                        <td>
                            {{ $agentClient->email_istituzionale }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.agent-clients.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection