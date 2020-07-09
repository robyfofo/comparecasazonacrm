@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.richiestum.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.richiesta.update", [$richiestum->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="agente_id">{{ trans('cruds.richiestum.fields.agente') }}</label>
                <select class="form-control select2 {{ $errors->has('agente') ? 'is-invalid' : '' }}" name="agente_id" id="agente_id" required>
                    @foreach($agentes as $id => $agente)
                        <option value="{{ $id }}" {{ ($richiestum->agente ? $richiestum->agente->id : old('agente_id')) == $id ? 'selected' : '' }}>{{ $agente }}</option>
                    @endforeach
                </select>
                @if($errors->has('agente'))
                    <span class="text-danger">{{ $errors->first('agente') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.richiestum.fields.agente_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="agenzia_id">{{ trans('cruds.richiestum.fields.agenzia') }}</label>
                <select class="form-control select2 {{ $errors->has('agenzia') ? 'is-invalid' : '' }}" name="agenzia_id" id="agenzia_id" required>
                    @foreach($agenzias as $id => $agenzia)
                        <option value="{{ $id }}" {{ ($richiestum->agenzia ? $richiestum->agenzia->id : old('agenzia_id')) == $id ? 'selected' : '' }}>{{ $agenzia }}</option>
                    @endforeach
                </select>
                @if($errors->has('agenzia'))
                    <span class="text-danger">{{ $errors->first('agenzia') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.richiestum.fields.agenzia_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cliente_id">{{ trans('cruds.richiestum.fields.cliente') }}</label>
                <select class="form-control select2 {{ $errors->has('cliente') ? 'is-invalid' : '' }}" name="cliente_id" id="cliente_id">
                    @foreach($clientes as $id => $cliente)
                        <option value="{{ $id }}" {{ ($richiestum->cliente ? $richiestum->cliente->id : old('cliente_id')) == $id ? 'selected' : '' }}>{{ $cliente }}</option>
                    @endforeach
                </select>
                @if($errors->has('cliente'))
                    <span class="text-danger">{{ $errors->first('cliente') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.richiestum.fields.cliente_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="contratto_id">{{ trans('cruds.richiestum.fields.contratto') }}</label>
                <select class="form-control select2 {{ $errors->has('contratto') ? 'is-invalid' : '' }}" name="contratto_id" id="contratto_id" required>
                    @foreach($contrattos as $id => $contratto)
                        <option value="{{ $id }}" {{ ($richiestum->contratto ? $richiestum->contratto->id : old('contratto_id')) == $id ? 'selected' : '' }}>{{ $contratto }}</option>
                    @endforeach
                </select>
                @if($errors->has('contratto'))
                    <span class="text-danger">{{ $errors->first('contratto') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.richiestum.fields.contratto_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="provincia_id">{{ trans('cruds.richiestum.fields.provincia') }}</label>
                <select class="form-control select2 {{ $errors->has('provincia') ? 'is-invalid' : '' }}" name="provincia_id" id="provincia_id">
                    @foreach($provincias as $id => $provincia)
                        <option value="{{ $id }}" {{ ($richiestum->provincia ? $richiestum->provincia->id : old('provincia_id')) == $id ? 'selected' : '' }}>{{ $provincia }}</option>
                    @endforeach
                </select>
                @if($errors->has('provincia'))
                    <span class="text-danger">{{ $errors->first('provincia') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.richiestum.fields.provincia_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="comune_id">{{ trans('cruds.richiestum.fields.comune') }}</label>
                <select class="form-control select2 {{ $errors->has('comune') ? 'is-invalid' : '' }}" name="comune_id" id="comune_id">
                    @foreach($comunes as $id => $comune)
                        <option value="{{ $id }}" {{ ($richiestum->comune ? $richiestum->comune->id : old('comune_id')) == $id ? 'selected' : '' }}>{{ $comune }}</option>
                    @endforeach
                </select>
                @if($errors->has('comune'))
                    <span class="text-danger">{{ $errors->first('comune') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.richiestum.fields.comune_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="garage_id">{{ trans('cruds.richiestum.fields.garage') }}</label>
                <select class="form-control select2 {{ $errors->has('garage') ? 'is-invalid' : '' }}" name="garage_id" id="garage_id">
                    @foreach($garages as $id => $garage)
                        <option value="{{ $id }}" {{ ($richiestum->garage ? $richiestum->garage->id : old('garage_id')) == $id ? 'selected' : '' }}>{{ $garage }}</option>
                    @endforeach
                </select>
                @if($errors->has('garage'))
                    <span class="text-danger">{{ $errors->first('garage') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.richiestum.fields.garage_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="prezzo">{{ trans('cruds.richiestum.fields.prezzo') }}</label>
                <input class="form-control {{ $errors->has('prezzo') ? 'is-invalid' : '' }}" type="number" name="prezzo" id="prezzo" value="{{ old('prezzo', $richiestum->prezzo) }}" step="0.01" required>
                @if($errors->has('prezzo'))
                    <span class="text-danger">{{ $errors->first('prezzo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.richiestum.fields.prezzo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tipologia_immobile_id">{{ trans('cruds.richiestum.fields.tipologia_immobile') }}</label>
                <select class="form-control select2 {{ $errors->has('tipologia_immobile') ? 'is-invalid' : '' }}" name="tipologia_immobile_id" id="tipologia_immobile_id">
                    @foreach($tipologia_immobiles as $id => $tipologia_immobile)
                        <option value="{{ $id }}" {{ ($richiestum->tipologia_immobile ? $richiestum->tipologia_immobile->id : old('tipologia_immobile_id')) == $id ? 'selected' : '' }}>{{ $tipologia_immobile }}</option>
                    @endforeach
                </select>
                @if($errors->has('tipologia_immobile'))
                    <span class="text-danger">{{ $errors->first('tipologia_immobile') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.richiestum.fields.tipologia_immobile_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tipologia_immobile_2_id">{{ trans('cruds.richiestum.fields.tipologia_immobile_2') }}</label>
                <select class="form-control select2 {{ $errors->has('tipologia_immobile_2') ? 'is-invalid' : '' }}" name="tipologia_immobile_2_id" id="tipologia_immobile_2_id">
                    @foreach($tipologia_immobile_2s as $id => $tipologia_immobile_2)
                        <option value="{{ $id }}" {{ ($richiestum->tipologia_immobile_2 ? $richiestum->tipologia_immobile_2->id : old('tipologia_immobile_2_id')) == $id ? 'selected' : '' }}>{{ $tipologia_immobile_2 }}</option>
                    @endforeach
                </select>
                @if($errors->has('tipologia_immobile_2'))
                    <span class="text-danger">{{ $errors->first('tipologia_immobile_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.richiestum.fields.tipologia_immobile_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tipologia_immobile_3_id">{{ trans('cruds.richiestum.fields.tipologia_immobile_3') }}</label>
                <select class="form-control select2 {{ $errors->has('tipologia_immobile_3') ? 'is-invalid' : '' }}" name="tipologia_immobile_3_id" id="tipologia_immobile_3_id">
                    @foreach($tipologia_immobile_3s as $id => $tipologia_immobile_3)
                        <option value="{{ $id }}" {{ ($richiestum->tipologia_immobile_3 ? $richiestum->tipologia_immobile_3->id : old('tipologia_immobile_3_id')) == $id ? 'selected' : '' }}>{{ $tipologia_immobile_3 }}</option>
                    @endforeach
                </select>
                @if($errors->has('tipologia_immobile_3'))
                    <span class="text-danger">{{ $errors->first('tipologia_immobile_3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.richiestum.fields.tipologia_immobile_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tipologia_immobile_4_id">{{ trans('cruds.richiestum.fields.tipologia_immobile_4') }}</label>
                <select class="form-control select2 {{ $errors->has('tipologia_immobile_4') ? 'is-invalid' : '' }}" name="tipologia_immobile_4_id" id="tipologia_immobile_4_id">
                    @foreach($tipologia_immobile_4s as $id => $tipologia_immobile_4)
                        <option value="{{ $id }}" {{ ($richiestum->tipologia_immobile_4 ? $richiestum->tipologia_immobile_4->id : old('tipologia_immobile_4_id')) == $id ? 'selected' : '' }}>{{ $tipologia_immobile_4 }}</option>
                    @endforeach
                </select>
                @if($errors->has('tipologia_immobile_4'))
                    <span class="text-danger">{{ $errors->first('tipologia_immobile_4') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.richiestum.fields.tipologia_immobile_4_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="comune_2_id">{{ trans('cruds.richiestum.fields.comune_2') }}</label>
                <select class="form-control select2 {{ $errors->has('comune_2') ? 'is-invalid' : '' }}" name="comune_2_id" id="comune_2_id">
                    @foreach($comune_2s as $id => $comune_2)
                        <option value="{{ $id }}" {{ ($richiestum->comune_2 ? $richiestum->comune_2->id : old('comune_2_id')) == $id ? 'selected' : '' }}>{{ $comune_2 }}</option>
                    @endforeach
                </select>
                @if($errors->has('comune_2'))
                    <span class="text-danger">{{ $errors->first('comune_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.richiestum.fields.comune_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="comune_3_id">{{ trans('cruds.richiestum.fields.comune_3') }}</label>
                <select class="form-control select2 {{ $errors->has('comune_3') ? 'is-invalid' : '' }}" name="comune_3_id" id="comune_3_id">
                    @foreach($comune_3s as $id => $comune_3)
                        <option value="{{ $id }}" {{ ($richiestum->comune_3 ? $richiestum->comune_3->id : old('comune_3_id')) == $id ? 'selected' : '' }}>{{ $comune_3 }}</option>
                    @endforeach
                </select>
                @if($errors->has('comune_3'))
                    <span class="text-danger">{{ $errors->first('comune_3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.richiestum.fields.comune_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="comune_4_id">{{ trans('cruds.richiestum.fields.comune_4') }}</label>
                <select class="form-control select2 {{ $errors->has('comune_4') ? 'is-invalid' : '' }}" name="comune_4_id" id="comune_4_id">
                    @foreach($comune_4s as $id => $comune_4)
                        <option value="{{ $id }}" {{ ($richiestum->comune_4 ? $richiestum->comune_4->id : old('comune_4_id')) == $id ? 'selected' : '' }}>{{ $comune_4 }}</option>
                    @endforeach
                </select>
                @if($errors->has('comune_4'))
                    <span class="text-danger">{{ $errors->first('comune_4') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.richiestum.fields.comune_4_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="comune_5_id">{{ trans('cruds.richiestum.fields.comune_5') }}</label>
                <select class="form-control select2 {{ $errors->has('comune_5') ? 'is-invalid' : '' }}" name="comune_5_id" id="comune_5_id">
                    @foreach($comune_5s as $id => $comune_5)
                        <option value="{{ $id }}" {{ ($richiestum->comune_5 ? $richiestum->comune_5->id : old('comune_5_id')) == $id ? 'selected' : '' }}>{{ $comune_5 }}</option>
                    @endforeach
                </select>
                @if($errors->has('comune_5'))
                    <span class="text-danger">{{ $errors->first('comune_5') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.richiestum.fields.comune_5_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="comune_6_id">{{ trans('cruds.richiestum.fields.comune_6') }}</label>
                <select class="form-control select2 {{ $errors->has('comune_6') ? 'is-invalid' : '' }}" name="comune_6_id" id="comune_6_id">
                    @foreach($comune_6s as $id => $comune_6)
                        <option value="{{ $id }}" {{ ($richiestum->comune_6 ? $richiestum->comune_6->id : old('comune_6_id')) == $id ? 'selected' : '' }}>{{ $comune_6 }}</option>
                    @endforeach
                </select>
                @if($errors->has('comune_6'))
                    <span class="text-danger">{{ $errors->first('comune_6') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.richiestum.fields.comune_6_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.richiestum.fields.priorita') }}</label>
                <select class="form-control {{ $errors->has('priorita') ? 'is-invalid' : '' }}" name="priorita" id="priorita" required>
                    <option value disabled {{ old('priorita', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Richiestum::PRIORITA_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('priorita', $richiestum->priorita) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('priorita'))
                    <span class="text-danger">{{ $errors->first('priorita') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.richiestum.fields.priorita_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.richiestum.fields.destinazione') }}</label>
                <select class="form-control {{ $errors->has('destinazione') ? 'is-invalid' : '' }}" name="destinazione" id="destinazione" required>
                    <option value disabled {{ old('destinazione', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Richiestum::DESTINAZIONE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('destinazione', $richiestum->destinazione) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('destinazione'))
                    <span class="text-danger">{{ $errors->first('destinazione') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.richiestum.fields.destinazione_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="stato_ids">{{ trans('cruds.richiestum.fields.stato_ids') }}</label>
                <input class="form-control {{ $errors->has('stato_ids') ? 'is-invalid' : '' }}" type="text" name="stato_ids" id="stato_ids" value="{{ old('stato_ids', $richiestum->stato_ids) }}">
                @if($errors->has('stato_ids'))
                    <span class="text-danger">{{ $errors->first('stato_ids') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.richiestum.fields.stato_ids_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="piano_ids">{{ trans('cruds.richiestum.fields.piano_ids') }}</label>
                <input class="form-control {{ $errors->has('piano_ids') ? 'is-invalid' : '' }}" type="text" name="piano_ids" id="piano_ids" value="{{ old('piano_ids', $richiestum->piano_ids) }}">
                @if($errors->has('piano_ids'))
                    <span class="text-danger">{{ $errors->first('piano_ids') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.richiestum.fields.piano_ids_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="piano">{{ trans('cruds.richiestum.fields.piano') }}</label>
                <input class="form-control {{ $errors->has('piano') ? 'is-invalid' : '' }}" type="text" name="piano" id="piano" value="{{ old('piano', $richiestum->piano) }}">
                @if($errors->has('piano'))
                    <span class="text-danger">{{ $errors->first('piano') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.richiestum.fields.piano_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="uso">{{ trans('cruds.richiestum.fields.uso') }}</label>
                <input class="form-control {{ $errors->has('uso') ? 'is-invalid' : '' }}" type="text" name="uso" id="uso" value="{{ old('uso', $richiestum->uso) }}">
                @if($errors->has('uso'))
                    <span class="text-danger">{{ $errors->first('uso') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.richiestum.fields.uso_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="contesto">{{ trans('cruds.richiestum.fields.contesto') }}</label>
                <input class="form-control {{ $errors->has('contesto') ? 'is-invalid' : '' }}" type="text" name="contesto" id="contesto" value="{{ old('contesto', $richiestum->contesto) }}">
                @if($errors->has('contesto'))
                    <span class="text-danger">{{ $errors->first('contesto') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.richiestum.fields.contesto_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.richiestum.fields.cucina') }}</label>
                <select class="form-control {{ $errors->has('cucina') ? 'is-invalid' : '' }}" name="cucina" id="cucina">
                    <option value disabled {{ old('cucina', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Richiestum::CUCINA_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('cucina', $richiestum->cucina) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('cucina'))
                    <span class="text-danger">{{ $errors->first('cucina') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.richiestum.fields.cucina_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="camere">{{ trans('cruds.richiestum.fields.camere') }}</label>
                <input class="form-control {{ $errors->has('camere') ? 'is-invalid' : '' }}" type="text" name="camere" id="camere" value="{{ old('camere', $richiestum->camere) }}">
                @if($errors->has('camere'))
                    <span class="text-danger">{{ $errors->first('camere') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.richiestum.fields.camere_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="servizi">{{ trans('cruds.richiestum.fields.servizi') }}</label>
                <input class="form-control {{ $errors->has('servizi') ? 'is-invalid' : '' }}" type="text" name="servizi" id="servizi" value="{{ old('servizi', $richiestum->servizi) }}">
                @if($errors->has('servizi'))
                    <span class="text-danger">{{ $errors->first('servizi') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.richiestum.fields.servizi_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mq">{{ trans('cruds.richiestum.fields.mq') }}</label>
                <input class="form-control {{ $errors->has('mq') ? 'is-invalid' : '' }}" type="text" name="mq" id="mq" value="{{ old('mq', $richiestum->mq) }}">
                @if($errors->has('mq'))
                    <span class="text-danger">{{ $errors->first('mq') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.richiestum.fields.mq_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.richiestum.fields.giardino') }}</label>
                <select class="form-control {{ $errors->has('giardino') ? 'is-invalid' : '' }}" name="giardino" id="giardino">
                    <option value disabled {{ old('giardino', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Richiestum::GIARDINO_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('giardino', $richiestum->giardino) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('giardino'))
                    <span class="text-danger">{{ $errors->first('giardino') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.richiestum.fields.giardino_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.richiestum.fields.terrazza') }}</label>
                <select class="form-control {{ $errors->has('terrazza') ? 'is-invalid' : '' }}" name="terrazza" id="terrazza">
                    <option value disabled {{ old('terrazza', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Richiestum::TERRAZZA_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('terrazza', $richiestum->terrazza) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('terrazza'))
                    <span class="text-danger">{{ $errors->first('terrazza') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.richiestum.fields.terrazza_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.richiestum.fields.stato') }}</label>
                <select class="form-control {{ $errors->has('stato') ? 'is-invalid' : '' }}" name="stato" id="stato" required>
                    <option value disabled {{ old('stato', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Richiestum::STATO_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('stato', $richiestum->stato) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('stato'))
                    <span class="text-danger">{{ $errors->first('stato') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.richiestum.fields.stato_helper') }}</span>
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