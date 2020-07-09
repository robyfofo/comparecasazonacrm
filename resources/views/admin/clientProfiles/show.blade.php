@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.clientProfile.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.client-profiles.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.clientProfile.fields.id') }}
                        </th>
                        <td>
                            {{ $clientProfile->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientProfile.fields.agente') }}
                        </th>
                        <td>
                            {{ $clientProfile->agente->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientProfile.fields.filiale') }}
                        </th>
                        <td>
                            {{ $clientProfile->filiale->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientProfile.fields.tipo') }}
                        </th>
                        <td>
                            {{ $clientProfile->tipo->tipologia ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientProfile.fields.ruolo') }}
                        </th>
                        <td>
                            {{ $clientProfile->ruolo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientProfile.fields.settore') }}
                        </th>
                        <td>
                            {{ $clientProfile->settore }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientProfile.fields.indirizzo') }}
                        </th>
                        <td>
                            {{ $clientProfile->indirizzo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientProfile.fields.civico') }}
                        </th>
                        <td>
                            {{ $clientProfile->civico }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientProfile.fields.cap') }}
                        </th>
                        <td>
                            {{ $clientProfile->cap }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientProfile.fields.comune') }}
                        </th>
                        <td>
                            {{ $clientProfile->comune->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientProfile.fields.provincia') }}
                        </th>
                        <td>
                            {{ $clientProfile->provincia->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientProfile.fields.azienda') }}
                        </th>
                        <td>
                            {{ $clientProfile->azienda }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientProfile.fields.piva') }}
                        </th>
                        <td>
                            {{ $clientProfile->piva }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientProfile.fields.telefono') }}
                        </th>
                        <td>
                            {{ $clientProfile->telefono }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientProfile.fields.cellulare') }}
                        </th>
                        <td>
                            {{ $clientProfile->cellulare }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientProfile.fields.fax') }}
                        </th>
                        <td>
                            {{ $clientProfile->fax }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientProfile.fields.livello') }}
                        </th>
                        <td>
                            {{ $clientProfile->livello }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientProfile.fields.note') }}
                        </th>
                        <td>
                            {{ $clientProfile->note }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientProfile.fields.birthday') }}
                        </th>
                        <td>
                            {{ $clientProfile->birthday }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientProfile.fields.nazione') }}
                        </th>
                        <td>
                            {{ $clientProfile->nazione }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientProfile.fields.nome_2') }}
                        </th>
                        <td>
                            {{ $clientProfile->nome_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientProfile.fields.cognome_2') }}
                        </th>
                        <td>
                            {{ $clientProfile->cognome_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientProfile.fields.affinita') }}
                        </th>
                        <td>
                            {{ $clientProfile->affinita }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientProfile.fields.email_2') }}
                        </th>
                        <td>
                            {{ $clientProfile->email_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientProfile.fields.comune_2') }}
                        </th>
                        <td>
                            {{ $clientProfile->comune_2->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientProfile.fields.prov_2') }}
                        </th>
                        <td>
                            {{ $clientProfile->prov_2->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientProfile.fields.indirizzo_2') }}
                        </th>
                        <td>
                            {{ $clientProfile->indirizzo_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientProfile.fields.civico_2') }}
                        </th>
                        <td>
                            {{ $clientProfile->civico_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientProfile.fields.cap_2') }}
                        </th>
                        <td>
                            {{ $clientProfile->cap_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientProfile.fields.telefono_2') }}
                        </th>
                        <td>
                            {{ $clientProfile->telefono_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientProfile.fields.cellulare_2') }}
                        </th>
                        <td>
                            {{ $clientProfile->cellulare_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientProfile.fields.fax_2') }}
                        </th>
                        <td>
                            {{ $clientProfile->fax_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientProfile.fields.stato') }}
                        </th>
                        <td>
                            {{ $clientProfile->stato }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientProfile.fields.files') }}
                        </th>
                        <td>
                            @foreach($clientProfile->files as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientProfile.fields.email_istituzionale') }}
                        </th>
                        <td>
                            {{ $clientProfile->email_istituzionale }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.client-profiles.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection