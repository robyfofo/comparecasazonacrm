@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.appuntamenti.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.appuntamentis.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="tipologia_id">{{ trans('cruds.appuntamenti.fields.tipologia') }}</label>
                <select class="form-control select2 {{ $errors->has('tipologia') ? 'is-invalid' : '' }}" name="tipologia_id" id="tipologia_id" required>
                    @foreach($tipologias as $id => $tipologia)
                        <option value="{{ $id }}" {{ old('tipologia_id') == $id ? 'selected' : '' }}>{{ $tipologia }}</option>
                    @endforeach
                </select>
                @if($errors->has('tipologia'))
                    <span class="text-danger">{{ $errors->first('tipologia') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.appuntamenti.fields.tipologia_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="statoapp_id">{{ trans('cruds.appuntamenti.fields.statoapp') }}</label>
                <select class="form-control select2 {{ $errors->has('statoapp') ? 'is-invalid' : '' }}" name="statoapp_id" id="statoapp_id" required>
                    @foreach($statoapps as $id => $statoapp)
                        <option value="{{ $id }}" {{ old('statoapp_id') == $id ? 'selected' : '' }}>{{ $statoapp }}</option>
                    @endforeach
                </select>
                @if($errors->has('statoapp'))
                    <span class="text-danger">{{ $errors->first('statoapp') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.appuntamenti.fields.statoapp_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="filiale_id">{{ trans('cruds.appuntamenti.fields.filiale') }}</label>
                <select class="form-control select2 {{ $errors->has('filiale') ? 'is-invalid' : '' }}" name="filiale_id" id="filiale_id" required>
                    @foreach($filiales as $id => $filiale)
                        <option value="{{ $id }}" {{ old('filiale_id') == $id ? 'selected' : '' }}>{{ $filiale }}</option>
                    @endforeach
                </select>
                @if($errors->has('filiale'))
                    <span class="text-danger">{{ $errors->first('filiale') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.appuntamenti.fields.filiale_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="data_ora">{{ trans('cruds.appuntamenti.fields.data_ora') }}</label>
                <input class="form-control datetime {{ $errors->has('data_ora') ? 'is-invalid' : '' }}" type="text" name="data_ora" id="data_ora" value="{{ old('data_ora') }}" required>
                @if($errors->has('data_ora'))
                    <span class="text-danger">{{ $errors->first('data_ora') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.appuntamenti.fields.data_ora_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="luogo">{{ trans('cruds.appuntamenti.fields.luogo') }}</label>
                <input class="form-control {{ $errors->has('luogo') ? 'is-invalid' : '' }}" type="text" name="luogo" id="luogo" value="{{ old('luogo', '') }}" required>
                @if($errors->has('luogo'))
                    <span class="text-danger">{{ $errors->first('luogo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.appuntamenti.fields.luogo_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="pratica_id">{{ trans('cruds.appuntamenti.fields.pratica') }}</label>
                <select class="form-control select2 {{ $errors->has('pratica') ? 'is-invalid' : '' }}" name="pratica_id" id="pratica_id" required>
                    @foreach($praticas as $id => $pratica)
                        <option value="{{ $id }}" {{ old('pratica_id') == $id ? 'selected' : '' }}>{{ $pratica }}</option>
                    @endforeach
                </select>
                @if($errors->has('pratica'))
                    <span class="text-danger">{{ $errors->first('pratica') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.appuntamenti.fields.pratica_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="richiesta_id">{{ trans('cruds.appuntamenti.fields.richiesta') }}</label>
                <select class="form-control select2 {{ $errors->has('richiesta') ? 'is-invalid' : '' }}" name="richiesta_id" id="richiesta_id">
                    @foreach($richiestas as $id => $richiesta)
                        <option value="{{ $id }}" {{ old('richiesta_id') == $id ? 'selected' : '' }}>{{ $richiesta }}</option>
                    @endforeach
                </select>
                @if($errors->has('richiesta'))
                    <span class="text-danger">{{ $errors->first('richiesta') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.appuntamenti.fields.richiesta_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="cliente_id">{{ trans('cruds.appuntamenti.fields.cliente') }}</label>
                <select class="form-control select2 {{ $errors->has('cliente') ? 'is-invalid' : '' }}" name="cliente_id" id="cliente_id" required>
                    @foreach($clientes as $id => $cliente)
                        <option value="{{ $id }}" {{ old('cliente_id') == $id ? 'selected' : '' }}>{{ $cliente }}</option>
                    @endforeach
                </select>
                @if($errors->has('cliente'))
                    <span class="text-danger">{{ $errors->first('cliente') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.appuntamenti.fields.cliente_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="agentes">{{ trans('cruds.appuntamenti.fields.agente') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('agentes') ? 'is-invalid' : '' }}" name="agentes[]" id="agentes" multiple required>
                    @foreach($agentes as $id => $agente)
                        <option value="{{ $id }}" {{ in_array($id, old('agentes', [])) ? 'selected' : '' }}>{{ $agente }}</option>
                    @endforeach
                </select>
                @if($errors->has('agentes'))
                    <span class="text-danger">{{ $errors->first('agentes') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.appuntamenti.fields.agente_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="note">{{ trans('cruds.appuntamenti.fields.note') }}</label>
                <textarea class="form-control {{ $errors->has('note') ? 'is-invalid' : '' }}" name="note" id="note">{{ old('note') }}</textarea>
                @if($errors->has('note'))
                    <span class="text-danger">{{ $errors->first('note') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.appuntamenti.fields.note_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="durata">{{ trans('cruds.appuntamenti.fields.durata') }}</label>
                <input class="form-control {{ $errors->has('durata') ? 'is-invalid' : '' }}" type="number" name="durata" id="durata" value="{{ old('durata', '') }}" step="1" required>
                @if($errors->has('durata'))
                    <span class="text-danger">{{ $errors->first('durata') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.appuntamenti.fields.durata_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="alert_id">{{ trans('cruds.appuntamenti.fields.alert') }}</label>
                <select class="form-control select2 {{ $errors->has('alert') ? 'is-invalid' : '' }}" name="alert_id" id="alert_id">
                    @foreach($alerts as $id => $alert)
                        <option value="{{ $id }}" {{ old('alert_id') == $id ? 'selected' : '' }}>{{ $alert }}</option>
                    @endforeach
                </select>
                @if($errors->has('alert'))
                    <span class="text-danger">{{ $errors->first('alert') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.appuntamenti.fields.alert_helper') }}</span>
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