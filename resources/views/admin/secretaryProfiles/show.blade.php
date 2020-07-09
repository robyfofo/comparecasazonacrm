@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.secretaryProfile.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.secretary-profiles.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.secretaryProfile.fields.id') }}
                        </th>
                        <td>
                            {{ $secretaryProfile->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.secretaryProfile.fields.nome') }}
                        </th>
                        <td>
                            {{ $secretaryProfile->nome }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.secretaryProfile.fields.indirizzo') }}
                        </th>
                        <td>
                            {{ $secretaryProfile->indirizzo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.secretaryProfile.fields.cap') }}
                        </th>
                        <td>
                            {{ $secretaryProfile->cap }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.secretaryProfile.fields.telefono') }}
                        </th>
                        <td>
                            {{ $secretaryProfile->telefono }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.secretaryProfile.fields.cellulare') }}
                        </th>
                        <td>
                            {{ $secretaryProfile->cellulare }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.secretaryProfile.fields.fax') }}
                        </th>
                        <td>
                            {{ $secretaryProfile->fax }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.secretaryProfile.fields.lunedi_inizio') }}
                        </th>
                        <td>
                            {{ $secretaryProfile->lunedi_inizio }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.secretaryProfile.fields.lunedi_fine') }}
                        </th>
                        <td>
                            {{ $secretaryProfile->lunedi_fine }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.secretaryProfile.fields.martedi_inizio') }}
                        </th>
                        <td>
                            {{ $secretaryProfile->martedi_inizio }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.secretaryProfile.fields.martedi_fine') }}
                        </th>
                        <td>
                            {{ $secretaryProfile->martedi_fine }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.secretaryProfile.fields.mercoledi_inizio') }}
                        </th>
                        <td>
                            {{ $secretaryProfile->mercoledi_inizio }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.secretaryProfile.fields.mercoledi_fine') }}
                        </th>
                        <td>
                            {{ $secretaryProfile->mercoledi_fine }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.secretaryProfile.fields.giovedi_inizio') }}
                        </th>
                        <td>
                            {{ $secretaryProfile->giovedi_inizio }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.secretaryProfile.fields.giovedi_fine') }}
                        </th>
                        <td>
                            {{ $secretaryProfile->giovedi_fine }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.secretaryProfile.fields.venerdi_inizio') }}
                        </th>
                        <td>
                            {{ $secretaryProfile->venerdi_inizio }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.secretaryProfile.fields.venerdi_fine') }}
                        </th>
                        <td>
                            {{ $secretaryProfile->venerdi_fine }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.secretaryProfile.fields.sabato_inizio') }}
                        </th>
                        <td>
                            {{ $secretaryProfile->sabato_inizio }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.secretaryProfile.fields.sabato_fine') }}
                        </th>
                        <td>
                            {{ $secretaryProfile->sabato_fine }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.secretaryProfile.fields.domenica_inizio') }}
                        </th>
                        <td>
                            {{ $secretaryProfile->domenica_inizio }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.secretaryProfile.fields.domenica_fine') }}
                        </th>
                        <td>
                            {{ $secretaryProfile->domenica_fine }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.secretaryProfile.fields.comune') }}
                        </th>
                        <td>
                            {{ $secretaryProfile->comune->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.secretaryProfile.fields.filiale') }}
                        </th>
                        <td>
                            {{ $secretaryProfile->filiale->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.secretaryProfile.fields.email_istituzionale') }}
                        </th>
                        <td>
                            {{ $secretaryProfile->email_istituzionale }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.secretary-profiles.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection