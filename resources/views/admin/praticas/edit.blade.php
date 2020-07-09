@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.pratica.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.praticas.update", [$pratica->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="pratica">{{ trans('cruds.pratica.fields.pratica') }}</label>
                <input class="form-control {{ $errors->has('pratica') ? 'is-invalid' : '' }}" type="text" name="pratica" id="pratica" value="{{ old('pratica', $pratica->pratica) }}" required>
                @if($errors->has('pratica'))
                    <span class="text-danger">{{ $errors->first('pratica') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pratica.fields.pratica_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.pratica.fields.tipologia') }}</label>
                <select class="form-control {{ $errors->has('tipologia') ? 'is-invalid' : '' }}" name="tipologia" id="tipologia" required>
                    <option value disabled {{ old('tipologia', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Pratica::TIPOLOGIA_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('tipologia', $pratica->tipologia) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('tipologia'))
                    <span class="text-danger">{{ $errors->first('tipologia') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pratica.fields.tipologia_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="cliente_id">{{ trans('cruds.pratica.fields.cliente') }}</label>
                <select class="form-control select2 {{ $errors->has('cliente') ? 'is-invalid' : '' }}" name="cliente_id" id="cliente_id" required>
                    @foreach($clientes as $id => $cliente)
                        <option value="{{ $id }}" {{ ($pratica->cliente ? $pratica->cliente->id : old('cliente_id')) == $id ? 'selected' : '' }}>{{ $cliente }}</option>
                    @endforeach
                </select>
                @if($errors->has('cliente'))
                    <span class="text-danger">{{ $errors->first('cliente') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pratica.fields.cliente_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="agente_id">{{ trans('cruds.pratica.fields.agente') }}</label>
                <select class="form-control select2 {{ $errors->has('agente') ? 'is-invalid' : '' }}" name="agente_id" id="agente_id" required>
                    @foreach($agentes as $id => $agente)
                        <option value="{{ $id }}" {{ ($pratica->agente ? $pratica->agente->id : old('agente_id')) == $id ? 'selected' : '' }}>{{ $agente }}</option>
                    @endforeach
                </select>
                @if($errors->has('agente'))
                    <span class="text-danger">{{ $errors->first('agente') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pratica.fields.agente_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="filiale_id">{{ trans('cruds.pratica.fields.filiale') }}</label>
                <select class="form-control select2 {{ $errors->has('filiale') ? 'is-invalid' : '' }}" name="filiale_id" id="filiale_id" required>
                    @foreach($filiales as $id => $filiale)
                        <option value="{{ $id }}" {{ ($pratica->filiale ? $pratica->filiale->id : old('filiale_id')) == $id ? 'selected' : '' }}>{{ $filiale }}</option>
                    @endforeach
                </select>
                @if($errors->has('filiale'))
                    <span class="text-danger">{{ $errors->first('filiale') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pratica.fields.filiale_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="tipologia_immobile_id">{{ trans('cruds.pratica.fields.tipologia_immobile') }}</label>
                <select class="form-control select2 {{ $errors->has('tipologia_immobile') ? 'is-invalid' : '' }}" name="tipologia_immobile_id" id="tipologia_immobile_id" required>
                    @foreach($tipologia_immobiles as $id => $tipologia_immobile)
                        <option value="{{ $id }}" {{ ($pratica->tipologia_immobile ? $pratica->tipologia_immobile->id : old('tipologia_immobile_id')) == $id ? 'selected' : '' }}>{{ $tipologia_immobile }}</option>
                    @endforeach
                </select>
                @if($errors->has('tipologia_immobile'))
                    <span class="text-danger">{{ $errors->first('tipologia_immobile') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pratica.fields.tipologia_immobile_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="immobile_id">{{ trans('cruds.pratica.fields.immobile') }}</label>
                <select class="form-control select2 {{ $errors->has('immobile') ? 'is-invalid' : '' }}" name="immobile_id" id="immobile_id" required>
                    @foreach($immobiles as $id => $immobile)
                        <option value="{{ $id }}" {{ ($pratica->immobile ? $pratica->immobile->id : old('immobile_id')) == $id ? 'selected' : '' }}>{{ $immobile }}</option>
                    @endforeach
                </select>
                @if($errors->has('immobile'))
                    <span class="text-danger">{{ $errors->first('immobile') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pratica.fields.immobile_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.pratica.fields.stato') }}</label>
                <select class="form-control {{ $errors->has('stato') ? 'is-invalid' : '' }}" name="stato" id="stato" required>
                    <option value disabled {{ old('stato', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Pratica::STATO_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('stato', $pratica->stato) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('stato'))
                    <span class="text-danger">{{ $errors->first('stato') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pratica.fields.stato_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="contratto_id">{{ trans('cruds.pratica.fields.contratto') }}</label>
                <select class="form-control select2 {{ $errors->has('contratto') ? 'is-invalid' : '' }}" name="contratto_id" id="contratto_id" required>
                    @foreach($contrattos as $id => $contratto)
                        <option value="{{ $id }}" {{ ($pratica->contratto ? $pratica->contratto->id : old('contratto_id')) == $id ? 'selected' : '' }}>{{ $contratto }}</option>
                    @endforeach
                </select>
                @if($errors->has('contratto'))
                    <span class="text-danger">{{ $errors->first('contratto') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pratica.fields.contratto_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="prezzo">{{ trans('cruds.pratica.fields.prezzo') }}</label>
                <input class="form-control {{ $errors->has('prezzo') ? 'is-invalid' : '' }}" type="number" name="prezzo" id="prezzo" value="{{ old('prezzo', $pratica->prezzo) }}" step="0.01">
                @if($errors->has('prezzo'))
                    <span class="text-danger">{{ $errors->first('prezzo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pratica.fields.prezzo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="prezzo_richiesto">{{ trans('cruds.pratica.fields.prezzo_richiesto') }}</label>
                <input class="form-control {{ $errors->has('prezzo_richiesto') ? 'is-invalid' : '' }}" type="number" name="prezzo_richiesto" id="prezzo_richiesto" value="{{ old('prezzo_richiesto', $pratica->prezzo_richiesto) }}" step="0.01">
                @if($errors->has('prezzo_richiesto'))
                    <span class="text-danger">{{ $errors->first('prezzo_richiesto') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pratica.fields.prezzo_richiesto_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="prezzo_note">{{ trans('cruds.pratica.fields.prezzo_note') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('prezzo_note') ? 'is-invalid' : '' }}" name="prezzo_note" id="prezzo_note">{!! old('prezzo_note', $pratica->prezzo_note) !!}</textarea>
                @if($errors->has('prezzo_note'))
                    <span class="text-danger">{{ $errors->first('prezzo_note') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pratica.fields.prezzo_note_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="spese_condominio">{{ trans('cruds.pratica.fields.spese_condominio') }}</label>
                <input class="form-control {{ $errors->has('spese_condominio') ? 'is-invalid' : '' }}" type="text" name="spese_condominio" id="spese_condominio" value="{{ old('spese_condominio', $pratica->spese_condominio) }}">
                @if($errors->has('spese_condominio'))
                    <span class="text-danger">{{ $errors->first('spese_condominio') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pratica.fields.spese_condominio_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="consegna_id">{{ trans('cruds.pratica.fields.consegna') }}</label>
                <select class="form-control select2 {{ $errors->has('consegna') ? 'is-invalid' : '' }}" name="consegna_id" id="consegna_id">
                    @foreach($consegnas as $id => $consegna)
                        <option value="{{ $id }}" {{ ($pratica->consegna ? $pratica->consegna->id : old('consegna_id')) == $id ? 'selected' : '' }}>{{ $consegna }}</option>
                    @endforeach
                </select>
                @if($errors->has('consegna'))
                    <span class="text-danger">{{ $errors->first('consegna') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pratica.fields.consegna_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="data_consegna">{{ trans('cruds.pratica.fields.data_consegna') }}</label>
                <input class="form-control {{ $errors->has('data_consegna') ? 'is-invalid' : '' }}" type="text" name="data_consegna" id="data_consegna" value="{{ old('data_consegna', $pratica->data_consegna) }}">
                @if($errors->has('data_consegna'))
                    <span class="text-danger">{{ $errors->first('data_consegna') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pratica.fields.data_consegna_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="notaio_tasse">{{ trans('cruds.pratica.fields.notaio_tasse') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('notaio_tasse') ? 'is-invalid' : '' }}" name="notaio_tasse" id="notaio_tasse">{!! old('notaio_tasse', $pratica->notaio_tasse) !!}</textarea>
                @if($errors->has('notaio_tasse'))
                    <span class="text-danger">{{ $errors->first('notaio_tasse') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pratica.fields.notaio_tasse_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="spese_accessori">{{ trans('cruds.pratica.fields.spese_accessori') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('spese_accessori') ? 'is-invalid' : '' }}" name="spese_accessori" id="spese_accessori">{!! old('spese_accessori', $pratica->spese_accessori) !!}</textarea>
                @if($errors->has('spese_accessori'))
                    <span class="text-danger">{{ $errors->first('spese_accessori') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pratica.fields.spese_accessori_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="note">{{ trans('cruds.pratica.fields.note') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('note') ? 'is-invalid' : '' }}" name="note" id="note">{!! old('note', $pratica->note) !!}</textarea>
                @if($errors->has('note'))
                    <span class="text-danger">{{ $errors->first('note') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pratica.fields.note_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="contratto_tipo_id">{{ trans('cruds.pratica.fields.contratto_tipo') }}</label>
                <select class="form-control select2 {{ $errors->has('contratto_tipo') ? 'is-invalid' : '' }}" name="contratto_tipo_id" id="contratto_tipo_id">
                    @foreach($contratto_tipos as $id => $contratto_tipo)
                        <option value="{{ $id }}" {{ ($pratica->contratto_tipo ? $pratica->contratto_tipo->id : old('contratto_tipo_id')) == $id ? 'selected' : '' }}>{{ $contratto_tipo }}</option>
                    @endforeach
                </select>
                @if($errors->has('contratto_tipo'))
                    <span class="text-danger">{{ $errors->first('contratto_tipo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pratica.fields.contratto_tipo_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.pratica.fields.prezzo_nascondi') }}</label>
                <select class="form-control {{ $errors->has('prezzo_nascondi') ? 'is-invalid' : '' }}" name="prezzo_nascondi" id="prezzo_nascondi">
                    <option value disabled {{ old('prezzo_nascondi', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Pratica::PREZZO_NASCONDI_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('prezzo_nascondi', $pratica->prezzo_nascondi) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('prezzo_nascondi'))
                    <span class="text-danger">{{ $errors->first('prezzo_nascondi') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pratica.fields.prezzo_nascondi_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tipo_mandato_id">{{ trans('cruds.pratica.fields.tipo_mandato') }}</label>
                <select class="form-control select2 {{ $errors->has('tipo_mandato') ? 'is-invalid' : '' }}" name="tipo_mandato_id" id="tipo_mandato_id">
                    @foreach($tipo_mandatos as $id => $tipo_mandato)
                        <option value="{{ $id }}" {{ ($pratica->tipo_mandato ? $pratica->tipo_mandato->id : old('tipo_mandato_id')) == $id ? 'selected' : '' }}>{{ $tipo_mandato }}</option>
                    @endforeach
                </select>
                @if($errors->has('tipo_mandato'))
                    <span class="text-danger">{{ $errors->first('tipo_mandato') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pratica.fields.tipo_mandato_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mandato_agente_id">{{ trans('cruds.pratica.fields.mandato_agente') }}</label>
                <select class="form-control select2 {{ $errors->has('mandato_agente') ? 'is-invalid' : '' }}" name="mandato_agente_id" id="mandato_agente_id">
                    @foreach($mandato_agentes as $id => $mandato_agente)
                        <option value="{{ $id }}" {{ ($pratica->mandato_agente ? $pratica->mandato_agente->id : old('mandato_agente_id')) == $id ? 'selected' : '' }}>{{ $mandato_agente }}</option>
                    @endforeach
                </select>
                @if($errors->has('mandato_agente'))
                    <span class="text-danger">{{ $errors->first('mandato_agente') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pratica.fields.mandato_agente_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mandato_inizio">{{ trans('cruds.pratica.fields.mandato_inizio') }}</label>
                <input class="form-control date {{ $errors->has('mandato_inizio') ? 'is-invalid' : '' }}" type="text" name="mandato_inizio" id="mandato_inizio" value="{{ old('mandato_inizio', $pratica->mandato_inizio) }}">
                @if($errors->has('mandato_inizio'))
                    <span class="text-danger">{{ $errors->first('mandato_inizio') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pratica.fields.mandato_inizio_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mandato_fine">{{ trans('cruds.pratica.fields.mandato_fine') }}</label>
                <input class="form-control date {{ $errors->has('mandato_fine') ? 'is-invalid' : '' }}" type="text" name="mandato_fine" id="mandato_fine" value="{{ old('mandato_fine', $pratica->mandato_fine) }}">
                @if($errors->has('mandato_fine'))
                    <span class="text-danger">{{ $errors->first('mandato_fine') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pratica.fields.mandato_fine_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mandato_rinnovo">{{ trans('cruds.pratica.fields.mandato_rinnovo') }}</label>
                <input class="form-control date {{ $errors->has('mandato_rinnovo') ? 'is-invalid' : '' }}" type="text" name="mandato_rinnovo" id="mandato_rinnovo" value="{{ old('mandato_rinnovo', $pratica->mandato_rinnovo) }}">
                @if($errors->has('mandato_rinnovo'))
                    <span class="text-danger">{{ $errors->first('mandato_rinnovo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pratica.fields.mandato_rinnovo_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.pratica.fields.in_home') }}</label>
                <select class="form-control {{ $errors->has('in_home') ? 'is-invalid' : '' }}" name="in_home" id="in_home">
                    <option value disabled {{ old('in_home', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Pratica::IN_HOME_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('in_home', $pratica->in_home) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('in_home'))
                    <span class="text-danger">{{ $errors->first('in_home') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pratica.fields.in_home_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.pratica.fields.sul_sito') }}</label>
                <select class="form-control {{ $errors->has('sul_sito') ? 'is-invalid' : '' }}" name="sul_sito" id="sul_sito">
                    <option value disabled {{ old('sul_sito', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Pratica::SUL_SITO_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('sul_sito', $pratica->sul_sito) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('sul_sito'))
                    <span class="text-danger">{{ $errors->first('sul_sito') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pratica.fields.sul_sito_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.pratica.fields.nascondi_foto') }}</label>
                <select class="form-control {{ $errors->has('nascondi_foto') ? 'is-invalid' : '' }}" name="nascondi_foto" id="nascondi_foto">
                    <option value disabled {{ old('nascondi_foto', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Pratica::NASCONDI_FOTO_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('nascondi_foto', $pratica->nascondi_foto) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('nascondi_foto'))
                    <span class="text-danger">{{ $errors->first('nascondi_foto') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pratica.fields.nascondi_foto_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.pratica.fields.newsletter') }}</label>
                <select class="form-control {{ $errors->has('newsletter') ? 'is-invalid' : '' }}" name="newsletter" id="newsletter">
                    <option value disabled {{ old('newsletter', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Pratica::NEWSLETTER_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('newsletter', $pratica->newsletter) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('newsletter'))
                    <span class="text-danger">{{ $errors->first('newsletter') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pratica.fields.newsletter_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="documenti">{{ trans('cruds.pratica.fields.documenti') }}</label>
                <div class="needsclick dropzone {{ $errors->has('documenti') ? 'is-invalid' : '' }}" id="documenti-dropzone">
                </div>
                @if($errors->has('documenti'))
                    <span class="text-danger">{{ $errors->first('documenti') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pratica.fields.documenti_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="inizio_affitto">{{ trans('cruds.pratica.fields.inizio_affitto') }}</label>
                <input class="form-control date {{ $errors->has('inizio_affitto') ? 'is-invalid' : '' }}" type="text" name="inizio_affitto" id="inizio_affitto" value="{{ old('inizio_affitto', $pratica->inizio_affitto) }}">
                @if($errors->has('inizio_affitto'))
                    <span class="text-danger">{{ $errors->first('inizio_affitto') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pratica.fields.inizio_affitto_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="scadenza_affitto">{{ trans('cruds.pratica.fields.scadenza_affitto') }}</label>
                <input class="form-control date {{ $errors->has('scadenza_affitto') ? 'is-invalid' : '' }}" type="text" name="scadenza_affitto" id="scadenza_affitto" value="{{ old('scadenza_affitto', $pratica->scadenza_affitto) }}">
                @if($errors->has('scadenza_affitto'))
                    <span class="text-danger">{{ $errors->first('scadenza_affitto') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pratica.fields.scadenza_affitto_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.pratica.fields.venduto') }}</label>
                <select class="form-control {{ $errors->has('venduto') ? 'is-invalid' : '' }}" name="venduto" id="venduto">
                    <option value disabled {{ old('venduto', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Pratica::VENDUTO_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('venduto', $pratica->venduto) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('venduto'))
                    <span class="text-danger">{{ $errors->first('venduto') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pratica.fields.venduto_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="profitto">{{ trans('cruds.pratica.fields.profitto') }}</label>
                <input class="form-control {{ $errors->has('profitto') ? 'is-invalid' : '' }}" type="number" name="profitto" id="profitto" value="{{ old('profitto', $pratica->profitto) }}" step="0.01">
                @if($errors->has('profitto'))
                    <span class="text-danger">{{ $errors->first('profitto') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pratica.fields.profitto_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="profitto_iva">{{ trans('cruds.pratica.fields.profitto_iva') }}</label>
                <input class="form-control {{ $errors->has('profitto_iva') ? 'is-invalid' : '' }}" type="number" name="profitto_iva" id="profitto_iva" value="{{ old('profitto_iva', $pratica->profitto_iva) }}" step="0.01">
                @if($errors->has('profitto_iva'))
                    <span class="text-danger">{{ $errors->first('profitto_iva') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pratica.fields.profitto_iva_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="data_vendita">{{ trans('cruds.pratica.fields.data_vendita') }}</label>
                <input class="form-control date {{ $errors->has('data_vendita') ? 'is-invalid' : '' }}" type="text" name="data_vendita" id="data_vendita" value="{{ old('data_vendita', $pratica->data_vendita) }}">
                @if($errors->has('data_vendita'))
                    <span class="text-danger">{{ $errors->first('data_vendita') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pratica.fields.data_vendita_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '/admin/praticas/ckmedia', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', {{ $pratica->id ?? 0 }});
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

<script>
    var uploadedDocumentiMap = {}
Dropzone.options.documentiDropzone = {
    url: '{{ route('admin.praticas.storeMedia') }}',
    maxFilesize: 5, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 5
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="documenti[]" value="' + response.name + '">')
      uploadedDocumentiMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedDocumentiMap[file.name]
      }
      $('form').find('input[name="documenti[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($pratica) && $pratica->documenti)
          var files =
            {!! json_encode($pratica->documenti) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="documenti[]" value="' + file.file_name + '">')
            }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection