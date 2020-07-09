@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.adminSetting.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.admin-settings.update", [$adminSetting->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="alert_pratica_scadenza_incarico">{{ trans('cruds.adminSetting.fields.alert_pratica_scadenza_incarico') }}</label>
                <input class="form-control {{ $errors->has('alert_pratica_scadenza_incarico') ? 'is-invalid' : '' }}" type="number" name="alert_pratica_scadenza_incarico" id="alert_pratica_scadenza_incarico" value="{{ old('alert_pratica_scadenza_incarico', $adminSetting->alert_pratica_scadenza_incarico) }}" step="1">
                @if($errors->has('alert_pratica_scadenza_incarico'))
                    <span class="text-danger">{{ $errors->first('alert_pratica_scadenza_incarico') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.adminSetting.fields.alert_pratica_scadenza_incarico_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.adminSetting.fields.alert_pratica_scadenza_incarico_on') }}</label>
                @foreach(App\AdminSetting::ALERT_PRATICA_SCADENZA_INCARICO_ON_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('alert_pratica_scadenza_incarico_on') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="alert_pratica_scadenza_incarico_on_{{ $key }}" name="alert_pratica_scadenza_incarico_on" value="{{ $key }}" {{ old('alert_pratica_scadenza_incarico_on', $adminSetting->alert_pratica_scadenza_incarico_on) === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="alert_pratica_scadenza_incarico_on_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('alert_pratica_scadenza_incarico_on'))
                    <span class="text-danger">{{ $errors->first('alert_pratica_scadenza_incarico_on') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.adminSetting.fields.alert_pratica_scadenza_incarico_on_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="alert_appuntamento">{{ trans('cruds.adminSetting.fields.alert_appuntamento') }}</label>
                <input class="form-control {{ $errors->has('alert_appuntamento') ? 'is-invalid' : '' }}" type="number" name="alert_appuntamento" id="alert_appuntamento" value="{{ old('alert_appuntamento', $adminSetting->alert_appuntamento) }}" step="1">
                @if($errors->has('alert_appuntamento'))
                    <span class="text-danger">{{ $errors->first('alert_appuntamento') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.adminSetting.fields.alert_appuntamento_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.adminSetting.fields.alert_appuntamento_on') }}</label>
                @foreach(App\AdminSetting::ALERT_APPUNTAMENTO_ON_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('alert_appuntamento_on') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="alert_appuntamento_on_{{ $key }}" name="alert_appuntamento_on" value="{{ $key }}" {{ old('alert_appuntamento_on', $adminSetting->alert_appuntamento_on) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="alert_appuntamento_on_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('alert_appuntamento_on'))
                    <span class="text-danger">{{ $errors->first('alert_appuntamento_on') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.adminSetting.fields.alert_appuntamento_on_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="agenzia_id">{{ trans('cruds.adminSetting.fields.agenzia') }}</label>
                <select class="form-control select2 {{ $errors->has('agenzia') ? 'is-invalid' : '' }}" name="agenzia_id" id="agenzia_id" required>
                    @foreach($agenzias as $id => $agenzia)
                        <option value="{{ $id }}" {{ ($adminSetting->agenzia ? $adminSetting->agenzia->id : old('agenzia_id')) == $id ? 'selected' : '' }}>{{ $agenzia }}</option>
                    @endforeach
                </select>
                @if($errors->has('agenzia'))
                    <span class="text-danger">{{ $errors->first('agenzia') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.adminSetting.fields.agenzia_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="filiale_id">{{ trans('cruds.adminSetting.fields.filiale') }}</label>
                <select class="form-control select2 {{ $errors->has('filiale') ? 'is-invalid' : '' }}" name="filiale_id" id="filiale_id">
                    @foreach($filiales as $id => $filiale)
                        <option value="{{ $id }}" {{ ($adminSetting->filiale ? $adminSetting->filiale->id : old('filiale_id')) == $id ? 'selected' : '' }}>{{ $filiale }}</option>
                    @endforeach
                </select>
                @if($errors->has('filiale'))
                    <span class="text-danger">{{ $errors->first('filiale') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.adminSetting.fields.filiale_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="alert_pratica_scadenza_affitto">{{ trans('cruds.adminSetting.fields.alert_pratica_scadenza_affitto') }}</label>
                <input class="form-control {{ $errors->has('alert_pratica_scadenza_affitto') ? 'is-invalid' : '' }}" type="number" name="alert_pratica_scadenza_affitto" id="alert_pratica_scadenza_affitto" value="{{ old('alert_pratica_scadenza_affitto', $adminSetting->alert_pratica_scadenza_affitto) }}" step="1">
                @if($errors->has('alert_pratica_scadenza_affitto'))
                    <span class="text-danger">{{ $errors->first('alert_pratica_scadenza_affitto') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.adminSetting.fields.alert_pratica_scadenza_affitto_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.adminSetting.fields.alert_pratica_scadenza_affitto_on') }}</label>
                @foreach(App\AdminSetting::ALERT_PRATICA_SCADENZA_AFFITTO_ON_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('alert_pratica_scadenza_affitto_on') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="alert_pratica_scadenza_affitto_on_{{ $key }}" name="alert_pratica_scadenza_affitto_on" value="{{ $key }}" {{ old('alert_pratica_scadenza_affitto_on', $adminSetting->alert_pratica_scadenza_affitto_on) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="alert_pratica_scadenza_affitto_on_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('alert_pratica_scadenza_affitto_on'))
                    <span class="text-danger">{{ $errors->first('alert_pratica_scadenza_affitto_on') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.adminSetting.fields.alert_pratica_scadenza_affitto_on_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="obiettivo_venduto">{{ trans('cruds.adminSetting.fields.obiettivo_venduto') }}</label>
                <input class="form-control {{ $errors->has('obiettivo_venduto') ? 'is-invalid' : '' }}" type="number" name="obiettivo_venduto" id="obiettivo_venduto" value="{{ old('obiettivo_venduto', $adminSetting->obiettivo_venduto) }}" step="1">
                @if($errors->has('obiettivo_venduto'))
                    <span class="text-danger">{{ $errors->first('obiettivo_venduto') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.adminSetting.fields.obiettivo_venduto_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="obiettivo_profitto">{{ trans('cruds.adminSetting.fields.obiettivo_profitto') }}</label>
                <input class="form-control {{ $errors->has('obiettivo_profitto') ? 'is-invalid' : '' }}" type="number" name="obiettivo_profitto" id="obiettivo_profitto" value="{{ old('obiettivo_profitto', $adminSetting->obiettivo_profitto) }}" step="0.01">
                @if($errors->has('obiettivo_profitto'))
                    <span class="text-danger">{{ $errors->first('obiettivo_profitto') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.adminSetting.fields.obiettivo_profitto_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.adminSetting.fields.alert_richiamata_cliente_on') }}</label>
                @foreach(App\AdminSetting::ALERT_RICHIAMATA_CLIENTE_ON_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('alert_richiamata_cliente_on') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="alert_richiamata_cliente_on_{{ $key }}" name="alert_richiamata_cliente_on" value="{{ $key }}" {{ old('alert_richiamata_cliente_on', $adminSetting->alert_richiamata_cliente_on) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="alert_richiamata_cliente_on_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('alert_richiamata_cliente_on'))
                    <span class="text-danger">{{ $errors->first('alert_richiamata_cliente_on') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.adminSetting.fields.alert_richiamata_cliente_on_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="alert_richiamata_cliente">{{ trans('cruds.adminSetting.fields.alert_richiamata_cliente') }}</label>
                <input class="form-control {{ $errors->has('alert_richiamata_cliente') ? 'is-invalid' : '' }}" type="number" name="alert_richiamata_cliente" id="alert_richiamata_cliente" value="{{ old('alert_richiamata_cliente', $adminSetting->alert_richiamata_cliente) }}" step="1">
                @if($errors->has('alert_richiamata_cliente'))
                    <span class="text-danger">{{ $errors->first('alert_richiamata_cliente') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.adminSetting.fields.alert_richiamata_cliente_helper') }}</span>
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