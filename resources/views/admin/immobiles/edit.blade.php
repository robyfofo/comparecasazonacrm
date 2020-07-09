@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.immobile.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.immobiles.update", [$immobile->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="nome">{{ trans('cruds.immobile.fields.nome') }}</label>
                <input class="form-control {{ $errors->has('nome') ? 'is-invalid' : '' }}" type="text" name="nome" id="nome" value="{{ old('nome', $immobile->nome) }}" required>
                @if($errors->has('nome'))
                    <span class="text-danger">{{ $errors->first('nome') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.nome_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.immobile.fields.tipologia') }}</label>
                <select class="form-control {{ $errors->has('tipologia') ? 'is-invalid' : '' }}" name="tipologia" id="tipologia" required>
                    <option value disabled {{ old('tipologia', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Immobile::TIPOLOGIA_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('tipologia', $immobile->tipologia) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('tipologia'))
                    <span class="text-danger">{{ $errors->first('tipologia') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.tipologia_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="cliente_id">{{ trans('cruds.immobile.fields.cliente') }}</label>
                <select class="form-control select2 {{ $errors->has('cliente') ? 'is-invalid' : '' }}" name="cliente_id" id="cliente_id" required>
                    @foreach($clientes as $id => $cliente)
                        <option value="{{ $id }}" {{ ($immobile->cliente ? $immobile->cliente->id : old('cliente_id')) == $id ? 'selected' : '' }}>{{ $cliente }}</option>
                    @endforeach
                </select>
                @if($errors->has('cliente'))
                    <span class="text-danger">{{ $errors->first('cliente') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.cliente_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="agente_id">{{ trans('cruds.immobile.fields.agente') }}</label>
                <select class="form-control select2 {{ $errors->has('agente') ? 'is-invalid' : '' }}" name="agente_id" id="agente_id" required>
                    @foreach($agentes as $id => $agente)
                        <option value="{{ $id }}" {{ ($immobile->agente ? $immobile->agente->id : old('agente_id')) == $id ? 'selected' : '' }}>{{ $agente }}</option>
                    @endforeach
                </select>
                @if($errors->has('agente'))
                    <span class="text-danger">{{ $errors->first('agente') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.agente_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="filiale_id">{{ trans('cruds.immobile.fields.filiale') }}</label>
                <select class="form-control select2 {{ $errors->has('filiale') ? 'is-invalid' : '' }}" name="filiale_id" id="filiale_id" required>
                    @foreach($filiales as $id => $filiale)
                        <option value="{{ $id }}" {{ ($immobile->filiale ? $immobile->filiale->id : old('filiale_id')) == $id ? 'selected' : '' }}>{{ $filiale }}</option>
                    @endforeach
                </select>
                @if($errors->has('filiale'))
                    <span class="text-danger">{{ $errors->first('filiale') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.filiale_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="tipologia_immobile_id">{{ trans('cruds.immobile.fields.tipologia_immobile') }}</label>
                <select class="form-control select2 {{ $errors->has('tipologia_immobile') ? 'is-invalid' : '' }}" name="tipologia_immobile_id" id="tipologia_immobile_id" required>
                    @foreach($tipologia_immobiles as $id => $tipologia_immobile)
                        <option value="{{ $id }}" {{ ($immobile->tipologia_immobile ? $immobile->tipologia_immobile->id : old('tipologia_immobile_id')) == $id ? 'selected' : '' }}>{{ $tipologia_immobile }}</option>
                    @endforeach
                </select>
                @if($errors->has('tipologia_immobile'))
                    <span class="text-danger">{{ $errors->first('tipologia_immobile') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.tipologia_immobile_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="provincia_id">{{ trans('cruds.immobile.fields.provincia') }}</label>
                <select class="form-control select2 {{ $errors->has('provincia') ? 'is-invalid' : '' }}" name="provincia_id" id="provincia_id" required>
                    @foreach($provincias as $id => $provincia)
                        <option value="{{ $id }}" {{ ($immobile->provincia ? $immobile->provincia->id : old('provincia_id')) == $id ? 'selected' : '' }}>{{ $provincia }}</option>
                    @endforeach
                </select>
                @if($errors->has('provincia'))
                    <span class="text-danger">{{ $errors->first('provincia') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.provincia_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="comune_id">{{ trans('cruds.immobile.fields.comune') }}</label>
                <select class="form-control select2 {{ $errors->has('comune') ? 'is-invalid' : '' }}" name="comune_id" id="comune_id" required>
                    @foreach($comunes as $id => $comune)
                        <option value="{{ $id }}" {{ ($immobile->comune ? $immobile->comune->id : old('comune_id')) == $id ? 'selected' : '' }}>{{ $comune }}</option>
                    @endforeach
                </select>
                @if($errors->has('comune'))
                    <span class="text-danger">{{ $errors->first('comune') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.comune_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="indirizzo">{{ trans('cruds.immobile.fields.indirizzo') }}</label>
                <input class="form-control {{ $errors->has('indirizzo') ? 'is-invalid' : '' }}" type="text" name="indirizzo" id="indirizzo" value="{{ old('indirizzo', $immobile->indirizzo) }}">
                @if($errors->has('indirizzo'))
                    <span class="text-danger">{{ $errors->first('indirizzo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.indirizzo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="civico">{{ trans('cruds.immobile.fields.civico') }}</label>
                <input class="form-control {{ $errors->has('civico') ? 'is-invalid' : '' }}" type="text" name="civico" id="civico" value="{{ old('civico', $immobile->civico) }}">
                @if($errors->has('civico'))
                    <span class="text-danger">{{ $errors->first('civico') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.civico_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="prezzo">{{ trans('cruds.immobile.fields.prezzo') }}</label>
                <input class="form-control {{ $errors->has('prezzo') ? 'is-invalid' : '' }}" type="number" name="prezzo" id="prezzo" value="{{ old('prezzo', $immobile->prezzo) }}" step="0.01">
                @if($errors->has('prezzo'))
                    <span class="text-danger">{{ $errors->first('prezzo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.prezzo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="garage_id">{{ trans('cruds.immobile.fields.garage') }}</label>
                <select class="form-control select2 {{ $errors->has('garage') ? 'is-invalid' : '' }}" name="garage_id" id="garage_id">
                    @foreach($garages as $id => $garage)
                        <option value="{{ $id }}" {{ ($immobile->garage ? $immobile->garage->id : old('garage_id')) == $id ? 'selected' : '' }}>{{ $garage }}</option>
                    @endforeach
                </select>
                @if($errors->has('garage'))
                    <span class="text-danger">{{ $errors->first('garage') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.garage_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mq">{{ trans('cruds.immobile.fields.mq') }}</label>
                <input class="form-control {{ $errors->has('mq') ? 'is-invalid' : '' }}" type="text" name="mq" id="mq" value="{{ old('mq', $immobile->mq) }}">
                @if($errors->has('mq'))
                    <span class="text-danger">{{ $errors->first('mq') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.mq_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.immobile.fields.cucina') }}</label>
                <select class="form-control {{ $errors->has('cucina') ? 'is-invalid' : '' }}" name="cucina" id="cucina">
                    <option value disabled {{ old('cucina', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Immobile::CUCINA_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('cucina', $immobile->cucina) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('cucina'))
                    <span class="text-danger">{{ $errors->first('cucina') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.cucina_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.immobile.fields.giardino') }}</label>
                <select class="form-control {{ $errors->has('giardino') ? 'is-invalid' : '' }}" name="giardino" id="giardino">
                    <option value disabled {{ old('giardino', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Immobile::GIARDINO_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('giardino', $immobile->giardino) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('giardino'))
                    <span class="text-danger">{{ $errors->first('giardino') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.giardino_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.immobile.fields.terrazza') }}</label>
                <select class="form-control {{ $errors->has('terrazza') ? 'is-invalid' : '' }}" name="terrazza" id="terrazza">
                    <option value disabled {{ old('terrazza', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Immobile::TERRAZZA_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('terrazza', $immobile->terrazza) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('terrazza'))
                    <span class="text-danger">{{ $errors->first('terrazza') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.terrazza_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="anno_costruzione">{{ trans('cruds.immobile.fields.anno_costruzione') }}</label>
                <input class="form-control {{ $errors->has('anno_costruzione') ? 'is-invalid' : '' }}" type="text" name="anno_costruzione" id="anno_costruzione" value="{{ old('anno_costruzione', $immobile->anno_costruzione) }}">
                @if($errors->has('anno_costruzione'))
                    <span class="text-danger">{{ $errors->first('anno_costruzione') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.anno_costruzione_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="anno_ristrutturazione">{{ trans('cruds.immobile.fields.anno_ristrutturazione') }}</label>
                <input class="form-control {{ $errors->has('anno_ristrutturazione') ? 'is-invalid' : '' }}" type="text" name="anno_ristrutturazione" id="anno_ristrutturazione" value="{{ old('anno_ristrutturazione', $immobile->anno_ristrutturazione) }}">
                @if($errors->has('anno_ristrutturazione'))
                    <span class="text-danger">{{ $errors->first('anno_ristrutturazione') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.anno_ristrutturazione_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="contesto">{{ trans('cruds.immobile.fields.contesto') }}</label>
                <input class="form-control {{ $errors->has('contesto') ? 'is-invalid' : '' }}" type="text" name="contesto" id="contesto" value="{{ old('contesto', $immobile->contesto) }}">
                @if($errors->has('contesto'))
                    <span class="text-danger">{{ $errors->first('contesto') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.contesto_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="camere">{{ trans('cruds.immobile.fields.camere') }}</label>
                <input class="form-control {{ $errors->has('camere') ? 'is-invalid' : '' }}" type="text" name="camere" id="camere" value="{{ old('camere', $immobile->camere) }}">
                @if($errors->has('camere'))
                    <span class="text-danger">{{ $errors->first('camere') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.camere_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="vani">{{ trans('cruds.immobile.fields.vani') }}</label>
                <input class="form-control {{ $errors->has('vani') ? 'is-invalid' : '' }}" type="text" name="vani" id="vani" value="{{ old('vani', $immobile->vani) }}">
                @if($errors->has('vani'))
                    <span class="text-danger">{{ $errors->first('vani') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.vani_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ripostigli">{{ trans('cruds.immobile.fields.ripostigli') }}</label>
                <input class="form-control {{ $errors->has('ripostigli') ? 'is-invalid' : '' }}" type="text" name="ripostigli" id="ripostigli" value="{{ old('ripostigli', $immobile->ripostigli) }}">
                @if($errors->has('ripostigli'))
                    <span class="text-danger">{{ $errors->first('ripostigli') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.ripostigli_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bagni">{{ trans('cruds.immobile.fields.bagni') }}</label>
                <input class="form-control {{ $errors->has('bagni') ? 'is-invalid' : '' }}" type="text" name="bagni" id="bagni" value="{{ old('bagni', $immobile->bagni) }}">
                @if($errors->has('bagni'))
                    <span class="text-danger">{{ $errors->first('bagni') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.bagni_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="balconi">{{ trans('cruds.immobile.fields.balconi') }}</label>
                <input class="form-control {{ $errors->has('balconi') ? 'is-invalid' : '' }}" type="text" name="balconi" id="balconi" value="{{ old('balconi', $immobile->balconi) }}">
                @if($errors->has('balconi'))
                    <span class="text-danger">{{ $errors->first('balconi') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.balconi_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="soffitta">{{ trans('cruds.immobile.fields.soffitta') }}</label>
                <input class="form-control {{ $errors->has('soffitta') ? 'is-invalid' : '' }}" type="text" name="soffitta" id="soffitta" value="{{ old('soffitta', $immobile->soffitta) }}">
                @if($errors->has('soffitta'))
                    <span class="text-danger">{{ $errors->first('soffitta') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.soffitta_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cantina">{{ trans('cruds.immobile.fields.cantina') }}</label>
                <input class="form-control {{ $errors->has('cantina') ? 'is-invalid' : '' }}" type="text" name="cantina" id="cantina" value="{{ old('cantina', $immobile->cantina) }}">
                @if($errors->has('cantina'))
                    <span class="text-danger">{{ $errors->first('cantina') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.cantina_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="taverna">{{ trans('cruds.immobile.fields.taverna') }}</label>
                <input class="form-control {{ $errors->has('taverna') ? 'is-invalid' : '' }}" type="text" name="taverna" id="taverna" value="{{ old('taverna', $immobile->taverna) }}">
                @if($errors->has('taverna'))
                    <span class="text-danger">{{ $errors->first('taverna') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.taverna_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="catasto_sezione">{{ trans('cruds.immobile.fields.catasto_sezione') }}</label>
                <input class="form-control {{ $errors->has('catasto_sezione') ? 'is-invalid' : '' }}" type="text" name="catasto_sezione" id="catasto_sezione" value="{{ old('catasto_sezione', $immobile->catasto_sezione) }}">
                @if($errors->has('catasto_sezione'))
                    <span class="text-danger">{{ $errors->first('catasto_sezione') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.catasto_sezione_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="catasto_foglio">{{ trans('cruds.immobile.fields.catasto_foglio') }}</label>
                <input class="form-control {{ $errors->has('catasto_foglio') ? 'is-invalid' : '' }}" type="text" name="catasto_foglio" id="catasto_foglio" value="{{ old('catasto_foglio', $immobile->catasto_foglio) }}">
                @if($errors->has('catasto_foglio'))
                    <span class="text-danger">{{ $errors->first('catasto_foglio') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.catasto_foglio_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="catasto_mappale">{{ trans('cruds.immobile.fields.catasto_mappale') }}</label>
                <input class="form-control {{ $errors->has('catasto_mappale') ? 'is-invalid' : '' }}" type="text" name="catasto_mappale" id="catasto_mappale" value="{{ old('catasto_mappale', $immobile->catasto_mappale) }}">
                @if($errors->has('catasto_mappale'))
                    <span class="text-danger">{{ $errors->first('catasto_mappale') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.catasto_mappale_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="catasto_sub">{{ trans('cruds.immobile.fields.catasto_sub') }}</label>
                <input class="form-control {{ $errors->has('catasto_sub') ? 'is-invalid' : '' }}" type="text" name="catasto_sub" id="catasto_sub" value="{{ old('catasto_sub', $immobile->catasto_sub) }}">
                @if($errors->has('catasto_sub'))
                    <span class="text-danger">{{ $errors->first('catasto_sub') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.catasto_sub_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="catasto_zona">{{ trans('cruds.immobile.fields.catasto_zona') }}</label>
                <input class="form-control {{ $errors->has('catasto_zona') ? 'is-invalid' : '' }}" type="text" name="catasto_zona" id="catasto_zona" value="{{ old('catasto_zona', $immobile->catasto_zona) }}">
                @if($errors->has('catasto_zona'))
                    <span class="text-danger">{{ $errors->first('catasto_zona') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.catasto_zona_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="catasto_categoria">{{ trans('cruds.immobile.fields.catasto_categoria') }}</label>
                <input class="form-control {{ $errors->has('catasto_categoria') ? 'is-invalid' : '' }}" type="text" name="catasto_categoria" id="catasto_categoria" value="{{ old('catasto_categoria', $immobile->catasto_categoria) }}">
                @if($errors->has('catasto_categoria'))
                    <span class="text-danger">{{ $errors->first('catasto_categoria') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.catasto_categoria_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="catasto_classe">{{ trans('cruds.immobile.fields.catasto_classe') }}</label>
                <input class="form-control {{ $errors->has('catasto_classe') ? 'is-invalid' : '' }}" type="text" name="catasto_classe" id="catasto_classe" value="{{ old('catasto_classe', $immobile->catasto_classe) }}">
                @if($errors->has('catasto_classe'))
                    <span class="text-danger">{{ $errors->first('catasto_classe') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.catasto_classe_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="catasto_consvani">{{ trans('cruds.immobile.fields.catasto_consvani') }}</label>
                <input class="form-control {{ $errors->has('catasto_consvani') ? 'is-invalid' : '' }}" type="text" name="catasto_consvani" id="catasto_consvani" value="{{ old('catasto_consvani', $immobile->catasto_consvani) }}">
                @if($errors->has('catasto_consvani'))
                    <span class="text-danger">{{ $errors->first('catasto_consvani') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.catasto_consvani_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="catasto_superficie">{{ trans('cruds.immobile.fields.catasto_superficie') }}</label>
                <input class="form-control {{ $errors->has('catasto_superficie') ? 'is-invalid' : '' }}" type="text" name="catasto_superficie" id="catasto_superficie" value="{{ old('catasto_superficie', $immobile->catasto_superficie) }}">
                @if($errors->has('catasto_superficie'))
                    <span class="text-danger">{{ $errors->first('catasto_superficie') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.catasto_superficie_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="catasto_rendita">{{ trans('cruds.immobile.fields.catasto_rendita') }}</label>
                <input class="form-control {{ $errors->has('catasto_rendita') ? 'is-invalid' : '' }}" type="text" name="catasto_rendita" id="catasto_rendita" value="{{ old('catasto_rendita', $immobile->catasto_rendita) }}">
                @if($errors->has('catasto_rendita'))
                    <span class="text-danger">{{ $errors->first('catasto_rendita') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.catasto_rendita_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="catasto_codcomune">{{ trans('cruds.immobile.fields.catasto_codcomune') }}</label>
                <input class="form-control {{ $errors->has('catasto_codcomune') ? 'is-invalid' : '' }}" type="text" name="catasto_codcomune" id="catasto_codcomune" value="{{ old('catasto_codcomune', $immobile->catasto_codcomune) }}">
                @if($errors->has('catasto_codcomune'))
                    <span class="text-danger">{{ $errors->first('catasto_codcomune') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.catasto_codcomune_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="posti_auto">{{ trans('cruds.immobile.fields.posti_auto') }}</label>
                <input class="form-control {{ $errors->has('posti_auto') ? 'is-invalid' : '' }}" type="text" name="posti_auto" id="posti_auto" value="{{ old('posti_auto', $immobile->posti_auto) }}">
                @if($errors->has('posti_auto'))
                    <span class="text-danger">{{ $errors->first('posti_auto') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.posti_auto_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="imp_satellite">{{ trans('cruds.immobile.fields.imp_satellite') }}</label>
                <input class="form-control {{ $errors->has('imp_satellite') ? 'is-invalid' : '' }}" type="text" name="imp_satellite" id="imp_satellite" value="{{ old('imp_satellite', $immobile->imp_satellite) }}">
                @if($errors->has('imp_satellite'))
                    <span class="text-danger">{{ $errors->first('imp_satellite') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.imp_satellite_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="imp_aria">{{ trans('cruds.immobile.fields.imp_aria') }}</label>
                <input class="form-control {{ $errors->has('imp_aria') ? 'is-invalid' : '' }}" type="text" name="imp_aria" id="imp_aria" value="{{ old('imp_aria', $immobile->imp_aria) }}">
                @if($errors->has('imp_aria'))
                    <span class="text-danger">{{ $errors->first('imp_aria') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.imp_aria_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="imp_allarme">{{ trans('cruds.immobile.fields.imp_allarme') }}</label>
                <input class="form-control {{ $errors->has('imp_allarme') ? 'is-invalid' : '' }}" type="text" name="imp_allarme" id="imp_allarme" value="{{ old('imp_allarme', $immobile->imp_allarme) }}">
                @if($errors->has('imp_allarme'))
                    <span class="text-danger">{{ $errors->first('imp_allarme') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.imp_allarme_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="riscaldamento">{{ trans('cruds.immobile.fields.riscaldamento') }}</label>
                <input class="form-control {{ $errors->has('riscaldamento') ? 'is-invalid' : '' }}" type="text" name="riscaldamento" id="riscaldamento" value="{{ old('riscaldamento', $immobile->riscaldamento) }}">
                @if($errors->has('riscaldamento'))
                    <span class="text-danger">{{ $errors->first('riscaldamento') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.riscaldamento_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="citofono">{{ trans('cruds.immobile.fields.citofono') }}</label>
                <input class="form-control {{ $errors->has('citofono') ? 'is-invalid' : '' }}" type="text" name="citofono" id="citofono" value="{{ old('citofono', $immobile->citofono) }}">
                @if($errors->has('citofono'))
                    <span class="text-danger">{{ $errors->first('citofono') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.citofono_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ascensore">{{ trans('cruds.immobile.fields.ascensore') }}</label>
                <input class="form-control {{ $errors->has('ascensore') ? 'is-invalid' : '' }}" type="text" name="ascensore" id="ascensore" value="{{ old('ascensore', $immobile->ascensore) }}">
                @if($errors->has('ascensore'))
                    <span class="text-danger">{{ $errors->first('ascensore') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.ascensore_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pan_solari">{{ trans('cruds.immobile.fields.pan_solari') }}</label>
                <input class="form-control {{ $errors->has('pan_solari') ? 'is-invalid' : '' }}" type="text" name="pan_solari" id="pan_solari" value="{{ old('pan_solari', $immobile->pan_solari) }}">
                @if($errors->has('pan_solari'))
                    <span class="text-danger">{{ $errors->first('pan_solari') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.pan_solari_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="loggia">{{ trans('cruds.immobile.fields.loggia') }}</label>
                <input class="form-control {{ $errors->has('loggia') ? 'is-invalid' : '' }}" type="text" name="loggia" id="loggia" value="{{ old('loggia', $immobile->loggia) }}">
                @if($errors->has('loggia'))
                    <span class="text-danger">{{ $errors->first('loggia') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.loggia_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="veranda">{{ trans('cruds.immobile.fields.veranda') }}</label>
                <input class="form-control {{ $errors->has('veranda') ? 'is-invalid' : '' }}" type="text" name="veranda" id="veranda" value="{{ old('veranda', $immobile->veranda) }}">
                @if($errors->has('veranda'))
                    <span class="text-danger">{{ $errors->first('veranda') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.veranda_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="posto_auto">{{ trans('cruds.immobile.fields.posto_auto') }}</label>
                <input class="form-control {{ $errors->has('posto_auto') ? 'is-invalid' : '' }}" type="text" name="posto_auto" id="posto_auto" value="{{ old('posto_auto', $immobile->posto_auto) }}">
                @if($errors->has('posto_auto'))
                    <span class="text-danger">{{ $errors->first('posto_auto') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.posto_auto_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pavimenti">{{ trans('cruds.immobile.fields.pavimenti') }}</label>
                <input class="form-control {{ $errors->has('pavimenti') ? 'is-invalid' : '' }}" type="text" name="pavimenti" id="pavimenti" value="{{ old('pavimenti', $immobile->pavimenti) }}">
                @if($errors->has('pavimenti'))
                    <span class="text-danger">{{ $errors->first('pavimenti') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.pavimenti_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="infissi">{{ trans('cruds.immobile.fields.infissi') }}</label>
                <input class="form-control {{ $errors->has('infissi') ? 'is-invalid' : '' }}" type="text" name="infissi" id="infissi" value="{{ old('infissi', $immobile->infissi) }}">
                @if($errors->has('infissi'))
                    <span class="text-danger">{{ $errors->first('infissi') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.infissi_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="facciata">{{ trans('cruds.immobile.fields.facciata') }}</label>
                <input class="form-control {{ $errors->has('facciata') ? 'is-invalid' : '' }}" type="text" name="facciata" id="facciata" value="{{ old('facciata', $immobile->facciata) }}">
                @if($errors->has('facciata'))
                    <span class="text-danger">{{ $errors->first('facciata') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.facciata_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fabbricato">{{ trans('cruds.immobile.fields.fabbricato') }}</label>
                <input class="form-control {{ $errors->has('fabbricato') ? 'is-invalid' : '' }}" type="text" name="fabbricato" id="fabbricato" value="{{ old('fabbricato', $immobile->fabbricato) }}">
                @if($errors->has('fabbricato'))
                    <span class="text-danger">{{ $errors->first('fabbricato') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.fabbricato_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="unita_totali">{{ trans('cruds.immobile.fields.unita_totali') }}</label>
                <input class="form-control {{ $errors->has('unita_totali') ? 'is-invalid' : '' }}" type="text" name="unita_totali" id="unita_totali" value="{{ old('unita_totali', $immobile->unita_totali) }}">
                @if($errors->has('unita_totali'))
                    <span class="text-danger">{{ $errors->first('unita_totali') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.unita_totali_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="descrizione_immobile">{{ trans('cruds.immobile.fields.descrizione_immobile') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('descrizione_immobile') ? 'is-invalid' : '' }}" name="descrizione_immobile" id="descrizione_immobile">{!! old('descrizione_immobile', $immobile->descrizione_immobile) !!}</textarea>
                @if($errors->has('descrizione_immobile'))
                    <span class="text-danger">{{ $errors->first('descrizione_immobile') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.descrizione_immobile_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="opere_rinnovi">{{ trans('cruds.immobile.fields.opere_rinnovi') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('opere_rinnovi') ? 'is-invalid' : '' }}" name="opere_rinnovi" id="opere_rinnovi">{!! old('opere_rinnovi', $immobile->opere_rinnovi) !!}</textarea>
                @if($errors->has('opere_rinnovi'))
                    <span class="text-danger">{{ $errors->first('opere_rinnovi') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.opere_rinnovi_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.immobile.fields.classe_energetica') }}</label>
                <select class="form-control {{ $errors->has('classe_energetica') ? 'is-invalid' : '' }}" name="classe_energetica" id="classe_energetica">
                    <option value disabled {{ old('classe_energetica', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Immobile::CLASSE_ENERGETICA_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('classe_energetica', $immobile->classe_energetica) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('classe_energetica'))
                    <span class="text-danger">{{ $errors->first('classe_energetica') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.classe_energetica_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="piano_ids">{{ trans('cruds.immobile.fields.piano_ids') }}</label>
                <input class="form-control {{ $errors->has('piano_ids') ? 'is-invalid' : '' }}" type="text" name="piano_ids" id="piano_ids" value="{{ old('piano_ids', $immobile->piano_ids) }}">
                @if($errors->has('piano_ids'))
                    <span class="text-danger">{{ $errors->first('piano_ids') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.piano_ids_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="piano">{{ trans('cruds.immobile.fields.piano') }}</label>
                <input class="form-control {{ $errors->has('piano') ? 'is-invalid' : '' }}" type="text" name="piano" id="piano" value="{{ old('piano', $immobile->piano) }}">
                @if($errors->has('piano'))
                    <span class="text-danger">{{ $errors->first('piano') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.piano_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="foto">{{ trans('cruds.immobile.fields.foto') }}</label>
                <div class="needsclick dropzone {{ $errors->has('foto') ? 'is-invalid' : '' }}" id="foto-dropzone">
                </div>
                @if($errors->has('foto'))
                    <span class="text-danger">{{ $errors->first('foto') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.foto_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="planimetrie">{{ trans('cruds.immobile.fields.planimetrie') }}</label>
                <div class="needsclick dropzone {{ $errors->has('planimetrie') ? 'is-invalid' : '' }}" id="planimetrie-dropzone">
                </div>
                @if($errors->has('planimetrie'))
                    <span class="text-danger">{{ $errors->first('planimetrie') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.planimetrie_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ma_0">{{ trans('cruds.immobile.fields.ma_0') }}</label>
                <input class="form-control {{ $errors->has('ma_0') ? 'is-invalid' : '' }}" type="text" name="ma_0" id="ma_0" value="{{ old('ma_0', $immobile->ma_0) }}">
                @if($errors->has('ma_0'))
                    <span class="text-danger">{{ $errors->first('ma_0') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.ma_0_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ma_1">{{ trans('cruds.immobile.fields.ma_1') }}</label>
                <input class="form-control {{ $errors->has('ma_1') ? 'is-invalid' : '' }}" type="text" name="ma_1" id="ma_1" value="{{ old('ma_1', $immobile->ma_1) }}">
                @if($errors->has('ma_1'))
                    <span class="text-danger">{{ $errors->first('ma_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.ma_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ma_2">{{ trans('cruds.immobile.fields.ma_2') }}</label>
                <input class="form-control {{ $errors->has('ma_2') ? 'is-invalid' : '' }}" type="text" name="ma_2" id="ma_2" value="{{ old('ma_2', $immobile->ma_2) }}">
                @if($errors->has('ma_2'))
                    <span class="text-danger">{{ $errors->first('ma_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.ma_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ma_3">{{ trans('cruds.immobile.fields.ma_3') }}</label>
                <input class="form-control {{ $errors->has('ma_3') ? 'is-invalid' : '' }}" type="text" name="ma_3" id="ma_3" value="{{ old('ma_3', $immobile->ma_3) }}">
                @if($errors->has('ma_3'))
                    <span class="text-danger">{{ $errors->first('ma_3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.ma_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mb_0">{{ trans('cruds.immobile.fields.mb_0') }}</label>
                <input class="form-control {{ $errors->has('mb_0') ? 'is-invalid' : '' }}" type="text" name="mb_0" id="mb_0" value="{{ old('mb_0', $immobile->mb_0) }}">
                @if($errors->has('mb_0'))
                    <span class="text-danger">{{ $errors->first('mb_0') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.mb_0_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mb_1">{{ trans('cruds.immobile.fields.mb_1') }}</label>
                <input class="form-control {{ $errors->has('mb_1') ? 'is-invalid' : '' }}" type="text" name="mb_1" id="mb_1" value="{{ old('mb_1', $immobile->mb_1) }}">
                @if($errors->has('mb_1'))
                    <span class="text-danger">{{ $errors->first('mb_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.mb_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mb_2">{{ trans('cruds.immobile.fields.mb_2') }}</label>
                <input class="form-control {{ $errors->has('mb_2') ? 'is-invalid' : '' }}" type="text" name="mb_2" id="mb_2" value="{{ old('mb_2', $immobile->mb_2) }}">
                @if($errors->has('mb_2'))
                    <span class="text-danger">{{ $errors->first('mb_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.mb_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mb_3">{{ trans('cruds.immobile.fields.mb_3') }}</label>
                <input class="form-control {{ $errors->has('mb_3') ? 'is-invalid' : '' }}" type="text" name="mb_3" id="mb_3" value="{{ old('mb_3', $immobile->mb_3) }}">
                @if($errors->has('mb_3'))
                    <span class="text-danger">{{ $errors->first('mb_3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.mb_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mc_0">{{ trans('cruds.immobile.fields.mc_0') }}</label>
                <input class="form-control {{ $errors->has('mc_0') ? 'is-invalid' : '' }}" type="text" name="mc_0" id="mc_0" value="{{ old('mc_0', $immobile->mc_0) }}">
                @if($errors->has('mc_0'))
                    <span class="text-danger">{{ $errors->first('mc_0') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.mc_0_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mc_1">{{ trans('cruds.immobile.fields.mc_1') }}</label>
                <input class="form-control {{ $errors->has('mc_1') ? 'is-invalid' : '' }}" type="text" name="mc_1" id="mc_1" value="{{ old('mc_1', $immobile->mc_1) }}">
                @if($errors->has('mc_1'))
                    <span class="text-danger">{{ $errors->first('mc_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.mc_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mc_2">{{ trans('cruds.immobile.fields.mc_2') }}</label>
                <input class="form-control {{ $errors->has('mc_2') ? 'is-invalid' : '' }}" type="text" name="mc_2" id="mc_2" value="{{ old('mc_2', $immobile->mc_2) }}">
                @if($errors->has('mc_2'))
                    <span class="text-danger">{{ $errors->first('mc_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.mc_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mc_3">{{ trans('cruds.immobile.fields.mc_3') }}</label>
                <input class="form-control {{ $errors->has('mc_3') ? 'is-invalid' : '' }}" type="text" name="mc_3" id="mc_3" value="{{ old('mc_3', $immobile->mc_3) }}">
                @if($errors->has('mc_3'))
                    <span class="text-danger">{{ $errors->first('mc_3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.mc_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="md_0">{{ trans('cruds.immobile.fields.md_0') }}</label>
                <input class="form-control {{ $errors->has('md_0') ? 'is-invalid' : '' }}" type="text" name="md_0" id="md_0" value="{{ old('md_0', $immobile->md_0) }}">
                @if($errors->has('md_0'))
                    <span class="text-danger">{{ $errors->first('md_0') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.md_0_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="md_1">{{ trans('cruds.immobile.fields.md_1') }}</label>
                <input class="form-control {{ $errors->has('md_1') ? 'is-invalid' : '' }}" type="text" name="md_1" id="md_1" value="{{ old('md_1', $immobile->md_1) }}">
                @if($errors->has('md_1'))
                    <span class="text-danger">{{ $errors->first('md_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.md_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="md_2">{{ trans('cruds.immobile.fields.md_2') }}</label>
                <input class="form-control {{ $errors->has('md_2') ? 'is-invalid' : '' }}" type="text" name="md_2" id="md_2" value="{{ old('md_2', $immobile->md_2) }}">
                @if($errors->has('md_2'))
                    <span class="text-danger">{{ $errors->first('md_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.md_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="md_3">{{ trans('cruds.immobile.fields.md_3') }}</label>
                <input class="form-control {{ $errors->has('md_3') ? 'is-invalid' : '' }}" type="text" name="md_3" id="md_3" value="{{ old('md_3', $immobile->md_3) }}">
                @if($errors->has('md_3'))
                    <span class="text-danger">{{ $errors->first('md_3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.md_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="me_0">{{ trans('cruds.immobile.fields.me_0') }}</label>
                <input class="form-control {{ $errors->has('me_0') ? 'is-invalid' : '' }}" type="text" name="me_0" id="me_0" value="{{ old('me_0', $immobile->me_0) }}">
                @if($errors->has('me_0'))
                    <span class="text-danger">{{ $errors->first('me_0') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.me_0_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="me_1">{{ trans('cruds.immobile.fields.me_1') }}</label>
                <input class="form-control {{ $errors->has('me_1') ? 'is-invalid' : '' }}" type="text" name="me_1" id="me_1" value="{{ old('me_1', $immobile->me_1) }}">
                @if($errors->has('me_1'))
                    <span class="text-danger">{{ $errors->first('me_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.me_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="me_2">{{ trans('cruds.immobile.fields.me_2') }}</label>
                <input class="form-control {{ $errors->has('me_2') ? 'is-invalid' : '' }}" type="text" name="me_2" id="me_2" value="{{ old('me_2', $immobile->me_2) }}">
                @if($errors->has('me_2'))
                    <span class="text-danger">{{ $errors->first('me_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.me_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="me_3">{{ trans('cruds.immobile.fields.me_3') }}</label>
                <input class="form-control {{ $errors->has('me_3') ? 'is-invalid' : '' }}" type="text" name="me_3" id="me_3" value="{{ old('me_3', $immobile->me_3) }}">
                @if($errors->has('me_3'))
                    <span class="text-danger">{{ $errors->first('me_3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.me_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mf_0">{{ trans('cruds.immobile.fields.mf_0') }}</label>
                <input class="form-control {{ $errors->has('mf_0') ? 'is-invalid' : '' }}" type="text" name="mf_0" id="mf_0" value="{{ old('mf_0', $immobile->mf_0) }}">
                @if($errors->has('mf_0'))
                    <span class="text-danger">{{ $errors->first('mf_0') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.mf_0_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mf_1">{{ trans('cruds.immobile.fields.mf_1') }}</label>
                <input class="form-control {{ $errors->has('mf_1') ? 'is-invalid' : '' }}" type="text" name="mf_1" id="mf_1" value="{{ old('mf_1', $immobile->mf_1) }}">
                @if($errors->has('mf_1'))
                    <span class="text-danger">{{ $errors->first('mf_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.mf_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mf_2">{{ trans('cruds.immobile.fields.mf_2') }}</label>
                <input class="form-control {{ $errors->has('mf_2') ? 'is-invalid' : '' }}" type="text" name="mf_2" id="mf_2" value="{{ old('mf_2', $immobile->mf_2) }}">
                @if($errors->has('mf_2'))
                    <span class="text-danger">{{ $errors->first('mf_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.mf_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mf_3">{{ trans('cruds.immobile.fields.mf_3') }}</label>
                <input class="form-control {{ $errors->has('mf_3') ? 'is-invalid' : '' }}" type="text" name="mf_3" id="mf_3" value="{{ old('mf_3', $immobile->mf_3) }}">
                @if($errors->has('mf_3'))
                    <span class="text-danger">{{ $errors->first('mf_3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.mf_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mg_0">{{ trans('cruds.immobile.fields.mg_0') }}</label>
                <input class="form-control {{ $errors->has('mg_0') ? 'is-invalid' : '' }}" type="text" name="mg_0" id="mg_0" value="{{ old('mg_0', $immobile->mg_0) }}">
                @if($errors->has('mg_0'))
                    <span class="text-danger">{{ $errors->first('mg_0') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.mg_0_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mg_1">{{ trans('cruds.immobile.fields.mg_1') }}</label>
                <input class="form-control {{ $errors->has('mg_1') ? 'is-invalid' : '' }}" type="text" name="mg_1" id="mg_1" value="{{ old('mg_1', $immobile->mg_1) }}">
                @if($errors->has('mg_1'))
                    <span class="text-danger">{{ $errors->first('mg_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.mg_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mg_2">{{ trans('cruds.immobile.fields.mg_2') }}</label>
                <input class="form-control {{ $errors->has('mg_2') ? 'is-invalid' : '' }}" type="text" name="mg_2" id="mg_2" value="{{ old('mg_2', $immobile->mg_2) }}">
                @if($errors->has('mg_2'))
                    <span class="text-danger">{{ $errors->first('mg_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.mg_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mg_3">{{ trans('cruds.immobile.fields.mg_3') }}</label>
                <input class="form-control {{ $errors->has('mg_3') ? 'is-invalid' : '' }}" type="text" name="mg_3" id="mg_3" value="{{ old('mg_3', $immobile->mg_3) }}">
                @if($errors->has('mg_3'))
                    <span class="text-danger">{{ $errors->first('mg_3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.mg_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mh_0">{{ trans('cruds.immobile.fields.mh_0') }}</label>
                <input class="form-control {{ $errors->has('mh_0') ? 'is-invalid' : '' }}" type="text" name="mh_0" id="mh_0" value="{{ old('mh_0', $immobile->mh_0) }}">
                @if($errors->has('mh_0'))
                    <span class="text-danger">{{ $errors->first('mh_0') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.mh_0_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mh_1">{{ trans('cruds.immobile.fields.mh_1') }}</label>
                <input class="form-control {{ $errors->has('mh_1') ? 'is-invalid' : '' }}" type="text" name="mh_1" id="mh_1" value="{{ old('mh_1', $immobile->mh_1) }}">
                @if($errors->has('mh_1'))
                    <span class="text-danger">{{ $errors->first('mh_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.mh_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mh_2">{{ trans('cruds.immobile.fields.mh_2') }}</label>
                <input class="form-control {{ $errors->has('mh_2') ? 'is-invalid' : '' }}" type="text" name="mh_2" id="mh_2" value="{{ old('mh_2', $immobile->mh_2) }}">
                @if($errors->has('mh_2'))
                    <span class="text-danger">{{ $errors->first('mh_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.mh_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mh_3">{{ trans('cruds.immobile.fields.mh_3') }}</label>
                <input class="form-control {{ $errors->has('mh_3') ? 'is-invalid' : '' }}" type="text" name="mh_3" id="mh_3" value="{{ old('mh_3', $immobile->mh_3) }}">
                @if($errors->has('mh_3'))
                    <span class="text-danger">{{ $errors->first('mh_3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.mh_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mi_0">{{ trans('cruds.immobile.fields.mi_0') }}</label>
                <input class="form-control {{ $errors->has('mi_0') ? 'is-invalid' : '' }}" type="text" name="mi_0" id="mi_0" value="{{ old('mi_0', $immobile->mi_0) }}">
                @if($errors->has('mi_0'))
                    <span class="text-danger">{{ $errors->first('mi_0') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.mi_0_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mi_1">{{ trans('cruds.immobile.fields.mi_1') }}</label>
                <input class="form-control {{ $errors->has('mi_1') ? 'is-invalid' : '' }}" type="text" name="mi_1" id="mi_1" value="{{ old('mi_1', $immobile->mi_1) }}">
                @if($errors->has('mi_1'))
                    <span class="text-danger">{{ $errors->first('mi_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.mi_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mi_2">{{ trans('cruds.immobile.fields.mi_2') }}</label>
                <input class="form-control {{ $errors->has('mi_2') ? 'is-invalid' : '' }}" type="text" name="mi_2" id="mi_2" value="{{ old('mi_2', $immobile->mi_2) }}">
                @if($errors->has('mi_2'))
                    <span class="text-danger">{{ $errors->first('mi_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.mi_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mi_3">{{ trans('cruds.immobile.fields.mi_3') }}</label>
                <input class="form-control {{ $errors->has('mi_3') ? 'is-invalid' : '' }}" type="text" name="mi_3" id="mi_3" value="{{ old('mi_3', $immobile->mi_3) }}">
                @if($errors->has('mi_3'))
                    <span class="text-danger">{{ $errors->first('mi_3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.mi_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ml_0">{{ trans('cruds.immobile.fields.ml_0') }}</label>
                <input class="form-control {{ $errors->has('ml_0') ? 'is-invalid' : '' }}" type="text" name="ml_0" id="ml_0" value="{{ old('ml_0', $immobile->ml_0) }}">
                @if($errors->has('ml_0'))
                    <span class="text-danger">{{ $errors->first('ml_0') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.ml_0_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ml_1">{{ trans('cruds.immobile.fields.ml_1') }}</label>
                <input class="form-control {{ $errors->has('ml_1') ? 'is-invalid' : '' }}" type="text" name="ml_1" id="ml_1" value="{{ old('ml_1', $immobile->ml_1) }}">
                @if($errors->has('ml_1'))
                    <span class="text-danger">{{ $errors->first('ml_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.ml_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ml_2">{{ trans('cruds.immobile.fields.ml_2') }}</label>
                <input class="form-control {{ $errors->has('ml_2') ? 'is-invalid' : '' }}" type="text" name="ml_2" id="ml_2" value="{{ old('ml_2', $immobile->ml_2) }}">
                @if($errors->has('ml_2'))
                    <span class="text-danger">{{ $errors->first('ml_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.ml_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ml_3">{{ trans('cruds.immobile.fields.ml_3') }}</label>
                <input class="form-control {{ $errors->has('ml_3') ? 'is-invalid' : '' }}" type="text" name="ml_3" id="ml_3" value="{{ old('ml_3', $immobile->ml_3) }}">
                @if($errors->has('ml_3'))
                    <span class="text-danger">{{ $errors->first('ml_3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.ml_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mm_0">{{ trans('cruds.immobile.fields.mm_0') }}</label>
                <input class="form-control {{ $errors->has('mm_0') ? 'is-invalid' : '' }}" type="text" name="mm_0" id="mm_0" value="{{ old('mm_0', $immobile->mm_0) }}">
                @if($errors->has('mm_0'))
                    <span class="text-danger">{{ $errors->first('mm_0') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.mm_0_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mm_1">{{ trans('cruds.immobile.fields.mm_1') }}</label>
                <input class="form-control {{ $errors->has('mm_1') ? 'is-invalid' : '' }}" type="text" name="mm_1" id="mm_1" value="{{ old('mm_1', $immobile->mm_1) }}">
                @if($errors->has('mm_1'))
                    <span class="text-danger">{{ $errors->first('mm_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.mm_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mm_2">{{ trans('cruds.immobile.fields.mm_2') }}</label>
                <input class="form-control {{ $errors->has('mm_2') ? 'is-invalid' : '' }}" type="text" name="mm_2" id="mm_2" value="{{ old('mm_2', $immobile->mm_2) }}">
                @if($errors->has('mm_2'))
                    <span class="text-danger">{{ $errors->first('mm_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.mm_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mm_3">{{ trans('cruds.immobile.fields.mm_3') }}</label>
                <input class="form-control {{ $errors->has('mm_3') ? 'is-invalid' : '' }}" type="text" name="mm_3" id="mm_3" value="{{ old('mm_3', $immobile->mm_3) }}">
                @if($errors->has('mm_3'))
                    <span class="text-danger">{{ $errors->first('mm_3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.mm_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mn_0">{{ trans('cruds.immobile.fields.mn_0') }}</label>
                <input class="form-control {{ $errors->has('mn_0') ? 'is-invalid' : '' }}" type="text" name="mn_0" id="mn_0" value="{{ old('mn_0', $immobile->mn_0) }}">
                @if($errors->has('mn_0'))
                    <span class="text-danger">{{ $errors->first('mn_0') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.mn_0_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mn_1">{{ trans('cruds.immobile.fields.mn_1') }}</label>
                <input class="form-control {{ $errors->has('mn_1') ? 'is-invalid' : '' }}" type="text" name="mn_1" id="mn_1" value="{{ old('mn_1', $immobile->mn_1) }}">
                @if($errors->has('mn_1'))
                    <span class="text-danger">{{ $errors->first('mn_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.mn_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mn_2">{{ trans('cruds.immobile.fields.mn_2') }}</label>
                <input class="form-control {{ $errors->has('mn_2') ? 'is-invalid' : '' }}" type="text" name="mn_2" id="mn_2" value="{{ old('mn_2', $immobile->mn_2) }}">
                @if($errors->has('mn_2'))
                    <span class="text-danger">{{ $errors->first('mn_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.mn_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mn_3">{{ trans('cruds.immobile.fields.mn_3') }}</label>
                <input class="form-control {{ $errors->has('mn_3') ? 'is-invalid' : '' }}" type="text" name="mn_3" id="mn_3" value="{{ old('mn_3', $immobile->mn_3) }}">
                @if($errors->has('mn_3'))
                    <span class="text-danger">{{ $errors->first('mn_3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.mn_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mo_0">{{ trans('cruds.immobile.fields.mo_0') }}</label>
                <input class="form-control {{ $errors->has('mo_0') ? 'is-invalid' : '' }}" type="text" name="mo_0" id="mo_0" value="{{ old('mo_0', $immobile->mo_0) }}">
                @if($errors->has('mo_0'))
                    <span class="text-danger">{{ $errors->first('mo_0') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.mo_0_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mo_1">{{ trans('cruds.immobile.fields.mo_1') }}</label>
                <input class="form-control {{ $errors->has('mo_1') ? 'is-invalid' : '' }}" type="text" name="mo_1" id="mo_1" value="{{ old('mo_1', $immobile->mo_1) }}">
                @if($errors->has('mo_1'))
                    <span class="text-danger">{{ $errors->first('mo_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.mo_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mo_2">{{ trans('cruds.immobile.fields.mo_2') }}</label>
                <input class="form-control {{ $errors->has('mo_2') ? 'is-invalid' : '' }}" type="text" name="mo_2" id="mo_2" value="{{ old('mo_2', $immobile->mo_2) }}">
                @if($errors->has('mo_2'))
                    <span class="text-danger">{{ $errors->first('mo_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.mo_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mo_3">{{ trans('cruds.immobile.fields.mo_3') }}</label>
                <input class="form-control {{ $errors->has('mo_3') ? 'is-invalid' : '' }}" type="text" name="mo_3" id="mo_3" value="{{ old('mo_3', $immobile->mo_3) }}">
                @if($errors->has('mo_3'))
                    <span class="text-danger">{{ $errors->first('mo_3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.mo_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mp_0">{{ trans('cruds.immobile.fields.mp_0') }}</label>
                <input class="form-control {{ $errors->has('mp_0') ? 'is-invalid' : '' }}" type="text" name="mp_0" id="mp_0" value="{{ old('mp_0', $immobile->mp_0) }}">
                @if($errors->has('mp_0'))
                    <span class="text-danger">{{ $errors->first('mp_0') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.mp_0_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mp_1">{{ trans('cruds.immobile.fields.mp_1') }}</label>
                <input class="form-control {{ $errors->has('mp_1') ? 'is-invalid' : '' }}" type="text" name="mp_1" id="mp_1" value="{{ old('mp_1', $immobile->mp_1) }}">
                @if($errors->has('mp_1'))
                    <span class="text-danger">{{ $errors->first('mp_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.mp_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mp_2">{{ trans('cruds.immobile.fields.mp_2') }}</label>
                <input class="form-control {{ $errors->has('mp_2') ? 'is-invalid' : '' }}" type="text" name="mp_2" id="mp_2" value="{{ old('mp_2', $immobile->mp_2) }}">
                @if($errors->has('mp_2'))
                    <span class="text-danger">{{ $errors->first('mp_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.mp_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mp_3">{{ trans('cruds.immobile.fields.mp_3') }}</label>
                <input class="form-control {{ $errors->has('mp_3') ? 'is-invalid' : '' }}" type="text" name="mp_3" id="mp_3" value="{{ old('mp_3', $immobile->mp_3) }}">
                @if($errors->has('mp_3'))
                    <span class="text-danger">{{ $errors->first('mp_3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.mp_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mq_0">{{ trans('cruds.immobile.fields.mq_0') }}</label>
                <input class="form-control {{ $errors->has('mq_0') ? 'is-invalid' : '' }}" type="text" name="mq_0" id="mq_0" value="{{ old('mq_0', $immobile->mq_0) }}">
                @if($errors->has('mq_0'))
                    <span class="text-danger">{{ $errors->first('mq_0') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.mq_0_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mq_1">{{ trans('cruds.immobile.fields.mq_1') }}</label>
                <input class="form-control {{ $errors->has('mq_1') ? 'is-invalid' : '' }}" type="text" name="mq_1" id="mq_1" value="{{ old('mq_1', $immobile->mq_1) }}">
                @if($errors->has('mq_1'))
                    <span class="text-danger">{{ $errors->first('mq_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.mq_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mq_2">{{ trans('cruds.immobile.fields.mq_2') }}</label>
                <input class="form-control {{ $errors->has('mq_2') ? 'is-invalid' : '' }}" type="text" name="mq_2" id="mq_2" value="{{ old('mq_2', $immobile->mq_2) }}">
                @if($errors->has('mq_2'))
                    <span class="text-danger">{{ $errors->first('mq_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.mq_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mq_3">{{ trans('cruds.immobile.fields.mq_3') }}</label>
                <input class="form-control {{ $errors->has('mq_3') ? 'is-invalid' : '' }}" type="text" name="mq_3" id="mq_3" value="{{ old('mq_3', $immobile->mq_3) }}">
                @if($errors->has('mq_3'))
                    <span class="text-danger">{{ $errors->first('mq_3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.mq_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mr_0">{{ trans('cruds.immobile.fields.mr_0') }}</label>
                <input class="form-control {{ $errors->has('mr_0') ? 'is-invalid' : '' }}" type="text" name="mr_0" id="mr_0" value="{{ old('mr_0', $immobile->mr_0) }}">
                @if($errors->has('mr_0'))
                    <span class="text-danger">{{ $errors->first('mr_0') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.mr_0_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mr_1">{{ trans('cruds.immobile.fields.mr_1') }}</label>
                <input class="form-control {{ $errors->has('mr_1') ? 'is-invalid' : '' }}" type="text" name="mr_1" id="mr_1" value="{{ old('mr_1', $immobile->mr_1) }}">
                @if($errors->has('mr_1'))
                    <span class="text-danger">{{ $errors->first('mr_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.mr_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mr_2">{{ trans('cruds.immobile.fields.mr_2') }}</label>
                <input class="form-control {{ $errors->has('mr_2') ? 'is-invalid' : '' }}" type="text" name="mr_2" id="mr_2" value="{{ old('mr_2', $immobile->mr_2) }}">
                @if($errors->has('mr_2'))
                    <span class="text-danger">{{ $errors->first('mr_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.mr_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mr_3">{{ trans('cruds.immobile.fields.mr_3') }}</label>
                <input class="form-control {{ $errors->has('mr_3') ? 'is-invalid' : '' }}" type="text" name="mr_3" id="mr_3" value="{{ old('mr_3', $immobile->mr_3) }}">
                @if($errors->has('mr_3'))
                    <span class="text-danger">{{ $errors->first('mr_3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.mr_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ms_0">{{ trans('cruds.immobile.fields.ms_0') }}</label>
                <input class="form-control {{ $errors->has('ms_0') ? 'is-invalid' : '' }}" type="text" name="ms_0" id="ms_0" value="{{ old('ms_0', $immobile->ms_0) }}">
                @if($errors->has('ms_0'))
                    <span class="text-danger">{{ $errors->first('ms_0') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.ms_0_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ms_1">{{ trans('cruds.immobile.fields.ms_1') }}</label>
                <input class="form-control {{ $errors->has('ms_1') ? 'is-invalid' : '' }}" type="text" name="ms_1" id="ms_1" value="{{ old('ms_1', $immobile->ms_1) }}">
                @if($errors->has('ms_1'))
                    <span class="text-danger">{{ $errors->first('ms_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.ms_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ms_2">{{ trans('cruds.immobile.fields.ms_2') }}</label>
                <input class="form-control {{ $errors->has('ms_2') ? 'is-invalid' : '' }}" type="text" name="ms_2" id="ms_2" value="{{ old('ms_2', $immobile->ms_2) }}">
                @if($errors->has('ms_2'))
                    <span class="text-danger">{{ $errors->first('ms_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.ms_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ms_3">{{ trans('cruds.immobile.fields.ms_3') }}</label>
                <input class="form-control {{ $errors->has('ms_3') ? 'is-invalid' : '' }}" type="text" name="ms_3" id="ms_3" value="{{ old('ms_3', $immobile->ms_3) }}">
                @if($errors->has('ms_3'))
                    <span class="text-danger">{{ $errors->first('ms_3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.ms_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mt_0">{{ trans('cruds.immobile.fields.mt_0') }}</label>
                <input class="form-control {{ $errors->has('mt_0') ? 'is-invalid' : '' }}" type="text" name="mt_0" id="mt_0" value="{{ old('mt_0', $immobile->mt_0) }}">
                @if($errors->has('mt_0'))
                    <span class="text-danger">{{ $errors->first('mt_0') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.mt_0_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mt_1">{{ trans('cruds.immobile.fields.mt_1') }}</label>
                <input class="form-control {{ $errors->has('mt_1') ? 'is-invalid' : '' }}" type="text" name="mt_1" id="mt_1" value="{{ old('mt_1', $immobile->mt_1) }}">
                @if($errors->has('mt_1'))
                    <span class="text-danger">{{ $errors->first('mt_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.mt_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mt_2">{{ trans('cruds.immobile.fields.mt_2') }}</label>
                <input class="form-control {{ $errors->has('mt_2') ? 'is-invalid' : '' }}" type="text" name="mt_2" id="mt_2" value="{{ old('mt_2', $immobile->mt_2) }}">
                @if($errors->has('mt_2'))
                    <span class="text-danger">{{ $errors->first('mt_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.mt_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mt_3">{{ trans('cruds.immobile.fields.mt_3') }}</label>
                <input class="form-control {{ $errors->has('mt_3') ? 'is-invalid' : '' }}" type="text" name="mt_3" id="mt_3" value="{{ old('mt_3', $immobile->mt_3) }}">
                @if($errors->has('mt_3'))
                    <span class="text-danger">{{ $errors->first('mt_3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.mt_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mu_0">{{ trans('cruds.immobile.fields.mu_0') }}</label>
                <input class="form-control {{ $errors->has('mu_0') ? 'is-invalid' : '' }}" type="text" name="mu_0" id="mu_0" value="{{ old('mu_0', $immobile->mu_0) }}">
                @if($errors->has('mu_0'))
                    <span class="text-danger">{{ $errors->first('mu_0') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.mu_0_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mu_1">{{ trans('cruds.immobile.fields.mu_1') }}</label>
                <input class="form-control {{ $errors->has('mu_1') ? 'is-invalid' : '' }}" type="text" name="mu_1" id="mu_1" value="{{ old('mu_1', $immobile->mu_1) }}">
                @if($errors->has('mu_1'))
                    <span class="text-danger">{{ $errors->first('mu_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.mu_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mu_2">{{ trans('cruds.immobile.fields.mu_2') }}</label>
                <input class="form-control {{ $errors->has('mu_2') ? 'is-invalid' : '' }}" type="text" name="mu_2" id="mu_2" value="{{ old('mu_2', $immobile->mu_2) }}">
                @if($errors->has('mu_2'))
                    <span class="text-danger">{{ $errors->first('mu_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.mu_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mu_3">{{ trans('cruds.immobile.fields.mu_3') }}</label>
                <input class="form-control {{ $errors->has('mu_3') ? 'is-invalid' : '' }}" type="text" name="mu_3" id="mu_3" value="{{ old('mu_3', $immobile->mu_3) }}">
                @if($errors->has('mu_3'))
                    <span class="text-danger">{{ $errors->first('mu_3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.mu_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mtotale_01">{{ trans('cruds.immobile.fields.mtotale_01') }}</label>
                <input class="form-control {{ $errors->has('mtotale_01') ? 'is-invalid' : '' }}" type="text" name="mtotale_01" id="mtotale_01" value="{{ old('mtotale_01', $immobile->mtotale_01) }}">
                @if($errors->has('mtotale_01'))
                    <span class="text-danger">{{ $errors->first('mtotale_01') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.mtotale_01_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mtotale_02">{{ trans('cruds.immobile.fields.mtotale_02') }}</label>
                <input class="form-control {{ $errors->has('mtotale_02') ? 'is-invalid' : '' }}" type="text" name="mtotale_02" id="mtotale_02" value="{{ old('mtotale_02', $immobile->mtotale_02) }}">
                @if($errors->has('mtotale_02'))
                    <span class="text-danger">{{ $errors->first('mtotale_02') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.immobile.fields.mtotale_02_helper') }}</span>
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
                xhr.open('POST', '/admin/immobiles/ckmedia', true);
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
                data.append('crud_id', {{ $immobile->id ?? 0 }});
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
    var uploadedFotoMap = {}
Dropzone.options.fotoDropzone = {
    url: '{{ route('admin.immobiles.storeMedia') }}',
    maxFilesize: 5, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 5,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="foto[]" value="' + response.name + '">')
      uploadedFotoMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedFotoMap[file.name]
      }
      $('form').find('input[name="foto[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($immobile) && $immobile->foto)
      var files =
        {!! json_encode($immobile->foto) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="foto[]" value="' + file.file_name + '">')
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
<script>
    var uploadedPlanimetrieMap = {}
Dropzone.options.planimetrieDropzone = {
    url: '{{ route('admin.immobiles.storeMedia') }}',
    maxFilesize: 5, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 5,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="planimetrie[]" value="' + response.name + '">')
      uploadedPlanimetrieMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedPlanimetrieMap[file.name]
      }
      $('form').find('input[name="planimetrie[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($immobile) && $immobile->planimetrie)
      var files =
        {!! json_encode($immobile->planimetrie) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="planimetrie[]" value="' + file.file_name + '">')
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