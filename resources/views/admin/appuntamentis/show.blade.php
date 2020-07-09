@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.appuntamenti.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.appuntamentis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.appuntamenti.fields.id') }}
                        </th>
                        <td>
                            {{ $appuntamenti->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.appuntamenti.fields.tipologia') }}
                        </th>
                        <td>
                            {{ $appuntamenti->tipologia->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.appuntamenti.fields.statoapp') }}
                        </th>
                        <td>
                            {{ $appuntamenti->statoapp->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.appuntamenti.fields.filiale') }}
                        </th>
                        <td>
                            {{ $appuntamenti->filiale->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.appuntamenti.fields.data_ora') }}
                        </th>
                        <td>
                            {{ $appuntamenti->data_ora }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.appuntamenti.fields.luogo') }}
                        </th>
                        <td>
                            {{ $appuntamenti->luogo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.appuntamenti.fields.pratica') }}
                        </th>
                        <td>
                            {{ $appuntamenti->pratica->pratica ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.appuntamenti.fields.richiesta') }}
                        </th>
                        <td>
                            {{ $appuntamenti->richiesta->prezzo ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.appuntamenti.fields.cliente') }}
                        </th>
                        <td>
                            {{ $appuntamenti->cliente->ruolo ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.appuntamenti.fields.agente') }}
                        </th>
                        <td>
                            @foreach($appuntamenti->agentes as $key => $agente)
                                <span class="label label-info">{{ $agente->nome }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.appuntamenti.fields.note') }}
                        </th>
                        <td>
                            {{ $appuntamenti->note }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.appuntamenti.fields.durata') }}
                        </th>
                        <td>
                            {{ $appuntamenti->durata }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.appuntamentis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection