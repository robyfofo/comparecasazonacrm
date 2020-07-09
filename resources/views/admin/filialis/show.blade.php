@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.filiali.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.filialis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.filiali.fields.id') }}
                        </th>
                        <td>
                            {{ $filiali->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.filiali.fields.agenzia') }}
                        </th>
                        <td>
                            {{ $filiali->agenzia->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.filiali.fields.nome') }}
                        </th>
                        <td>
                            {{ $filiali->nome }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.filiali.fields.comune') }}
                        </th>
                        <td>
                            {{ $filiali->comune->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.filiali.fields.indirizzo') }}
                        </th>
                        <td>
                            {{ $filiali->indirizzo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.filiali.fields.cap') }}
                        </th>
                        <td>
                            {{ $filiali->cap }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.filiali.fields.email') }}
                        </th>
                        <td>
                            {{ $filiali->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.filiali.fields.telefono') }}
                        </th>
                        <td>
                            {{ $filiali->telefono }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.filiali.fields.fax') }}
                        </th>
                        <td>
                            {{ $filiali->fax }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.filiali.fields.email_pec') }}
                        </th>
                        <td>
                            {{ $filiali->email_pec }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.filiali.fields.cellulare') }}
                        </th>
                        <td>
                            {{ $filiali->cellulare }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.filiali.fields.web') }}
                        </th>
                        <td>
                            {{ $filiali->web }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.filiali.fields.codice_fiscale') }}
                        </th>
                        <td>
                            {{ $filiali->codice_fiscale }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.filiali.fields.partita_iva') }}
                        </th>
                        <td>
                            {{ $filiali->partita_iva }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.filiali.fields.ccia_numero_rea') }}
                        </th>
                        <td>
                            {{ $filiali->ccia_numero_rea }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.filiali.fields.capitale_sociale') }}
                        </th>
                        <td>
                            {{ $filiali->capitale_sociale }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.filialis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection