@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.pratica.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.praticas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.pratica.fields.id') }}
                        </th>
                        <td>
                            {{ $pratica->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pratica.fields.pratica') }}
                        </th>
                        <td>
                            {{ $pratica->pratica }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pratica.fields.tipologia') }}
                        </th>
                        <td>
                            {{ App\Pratica::TIPOLOGIA_SELECT[$pratica->tipologia] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pratica.fields.cliente') }}
                        </th>
                        <td>
                            {{ $pratica->cliente->ruolo ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pratica.fields.agente') }}
                        </th>
                        <td>
                            {{ $pratica->agente->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pratica.fields.filiale') }}
                        </th>
                        <td>
                            {{ $pratica->filiale->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pratica.fields.tipologia_immobile') }}
                        </th>
                        <td>
                            {{ $pratica->tipologia_immobile->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pratica.fields.immobile') }}
                        </th>
                        <td>
                            {{ $pratica->immobile->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pratica.fields.stato') }}
                        </th>
                        <td>
                            {{ App\Pratica::STATO_SELECT[$pratica->stato] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pratica.fields.contratto') }}
                        </th>
                        <td>
                            {{ $pratica->contratto->contratto ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pratica.fields.prezzo') }}
                        </th>
                        <td>
                            {{ $pratica->prezzo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pratica.fields.prezzo_richiesto') }}
                        </th>
                        <td>
                            {{ $pratica->prezzo_richiesto }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pratica.fields.prezzo_note') }}
                        </th>
                        <td>
                            {!! $pratica->prezzo_note !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pratica.fields.spese_condominio') }}
                        </th>
                        <td>
                            {{ $pratica->spese_condominio }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pratica.fields.consegna') }}
                        </th>
                        <td>
                            {{ $pratica->consegna->consegna ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pratica.fields.data_consegna') }}
                        </th>
                        <td>
                            {{ $pratica->data_consegna }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pratica.fields.notaio_tasse') }}
                        </th>
                        <td>
                            {!! $pratica->notaio_tasse !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pratica.fields.spese_accessori') }}
                        </th>
                        <td>
                            {!! $pratica->spese_accessori !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pratica.fields.note') }}
                        </th>
                        <td>
                            {!! $pratica->note !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pratica.fields.contratto_tipo') }}
                        </th>
                        <td>
                            {{ $pratica->contratto_tipo->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pratica.fields.prezzo_nascondi') }}
                        </th>
                        <td>
                            {{ App\Pratica::PREZZO_NASCONDI_SELECT[$pratica->prezzo_nascondi] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pratica.fields.tipo_mandato') }}
                        </th>
                        <td>
                            {{ $pratica->tipo_mandato->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pratica.fields.mandato_agente') }}
                        </th>
                        <td>
                            {{ $pratica->mandato_agente->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pratica.fields.mandato_inizio') }}
                        </th>
                        <td>
                            {{ $pratica->mandato_inizio }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pratica.fields.mandato_fine') }}
                        </th>
                        <td>
                            {{ $pratica->mandato_fine }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pratica.fields.mandato_rinnovo') }}
                        </th>
                        <td>
                            {{ $pratica->mandato_rinnovo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pratica.fields.in_home') }}
                        </th>
                        <td>
                            {{ App\Pratica::IN_HOME_SELECT[$pratica->in_home] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pratica.fields.sul_sito') }}
                        </th>
                        <td>
                            {{ App\Pratica::SUL_SITO_SELECT[$pratica->sul_sito] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pratica.fields.nascondi_foto') }}
                        </th>
                        <td>
                            {{ App\Pratica::NASCONDI_FOTO_SELECT[$pratica->nascondi_foto] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pratica.fields.newsletter') }}
                        </th>
                        <td>
                            {{ App\Pratica::NEWSLETTER_SELECT[$pratica->newsletter] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pratica.fields.documenti') }}
                        </th>
                        <td>
                            @foreach($pratica->documenti as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pratica.fields.inizio_affitto') }}
                        </th>
                        <td>
                            {{ $pratica->inizio_affitto }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pratica.fields.scadenza_affitto') }}
                        </th>
                        <td>
                            {{ $pratica->scadenza_affitto }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pratica.fields.venduto') }}
                        </th>
                        <td>
                            {{ App\Pratica::VENDUTO_SELECT[$pratica->venduto] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pratica.fields.profitto') }}
                        </th>
                        <td>
                            {{ $pratica->profitto }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pratica.fields.profitto_iva') }}
                        </th>
                        <td>
                            {{ $pratica->profitto_iva }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pratica.fields.data_vendita') }}
                        </th>
                        <td>
                            {{ $pratica->data_vendita }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.praticas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection