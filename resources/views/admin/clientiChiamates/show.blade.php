@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.clientiChiamate.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.clienti-chiamates.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.clientiChiamate.fields.id') }}
                        </th>
                        <td>
                            {{ $clientiChiamate->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientiChiamate.fields.data_ora') }}
                        </th>
                        <td>
                            {{ $clientiChiamate->data_ora }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientiChiamate.fields.filiale') }}
                        </th>
                        <td>
                            {{ $clientiChiamate->filiale->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientiChiamate.fields.agente') }}
                        </th>
                        <td>
                            {{ $clientiChiamate->agente->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientiChiamate.fields.cliente') }}
                        </th>
                        <td>
                            {{ $clientiChiamate->cliente->nome_2 ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientiChiamate.fields.pratica') }}
                        </th>
                        <td>
                            {{ $clientiChiamate->pratica->pratica ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientiChiamate.fields.richiesta') }}
                        </th>
                        <td>
                            {{ $clientiChiamate->richiesta->destinazione ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientiChiamate.fields.stato') }}
                        </th>
                        <td>
                            {{ $clientiChiamate->stato }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientiChiamate.fields.direzione') }}
                        </th>
                        <td>
                            {{ App\ClientiChiamate::DIREZIONE_SELECT[$clientiChiamate->direzione] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientiChiamate.fields.nome') }}
                        </th>
                        <td>
                            {{ $clientiChiamate->nome }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientiChiamate.fields.cognome') }}
                        </th>
                        <td>
                            {{ $clientiChiamate->cognome }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientiChiamate.fields.telefono') }}
                        </th>
                        <td>
                            {{ $clientiChiamate->telefono }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientiChiamate.fields.cellulare') }}
                        </th>
                        <td>
                            {{ $clientiChiamate->cellulare }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientiChiamate.fields.email') }}
                        </th>
                        <td>
                            {{ $clientiChiamate->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientiChiamate.fields.data_risposta') }}
                        </th>
                        <td>
                            {{ $clientiChiamate->data_risposta }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.clienti-chiamates.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection