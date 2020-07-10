@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.fattura.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.fatturas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.fattura.fields.id') }}
                        </th>
                        <td>
                            {{ $fattura->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fattura.fields.cliente_nome') }}
                        </th>
                        <td>
                            {{ $fattura->cliente_nome }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fattura.fields.cliente_cognome') }}
                        </th>
                        <td>
                            {{ $fattura->cliente_cognome }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fattura.fields.cliente_ragione_sociale') }}
                        </th>
                        <td>
                            {{ $fattura->cliente_ragione_sociale }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fattura.fields.cliente_codice_fiscale') }}
                        </th>
                        <td>
                            {{ $fattura->cliente_codice_fiscale }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fattura.fields.cliente_partita_iva') }}
                        </th>
                        <td>
                            {{ $fattura->cliente_partita_iva }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fattura.fields.cliente_indirizzo') }}
                        </th>
                        <td>
                            {{ $fattura->cliente_indirizzo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fattura.fields.filiale_agenzia_nome') }}
                        </th>
                        <td>
                            {{ $fattura->filiale_agenzia_nome }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fattura.fields.fattura_numero') }}
                        </th>
                        <td>
                            {{ $fattura->fattura_numero }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fattura.fields.fattura_anno') }}
                        </th>
                        <td>
                            {{ $fattura->fattura_anno }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fattura.fields.data_emissione') }}
                        </th>
                        <td>
                            {{ $fattura->data_emissione }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.fatturas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection