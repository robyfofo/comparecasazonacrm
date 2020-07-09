@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.userAlert.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.user-alerts.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="alert_text">{{ trans('cruds.userAlert.fields.alert_text') }}</label>
                <input class="form-control {{ $errors->has('alert_text') ? 'is-invalid' : '' }}" type="text" name="alert_text" id="alert_text" value="{{ old('alert_text', '') }}" required>
                @if($errors->has('alert_text'))
                    <span class="text-danger">{{ $errors->first('alert_text') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.userAlert.fields.alert_text_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="alert_link">{{ trans('cruds.userAlert.fields.alert_link') }}</label>
                <input class="form-control {{ $errors->has('alert_link') ? 'is-invalid' : '' }}" type="text" name="alert_link" id="alert_link" value="{{ old('alert_link', '') }}">
                @if($errors->has('alert_link'))
                    <span class="text-danger">{{ $errors->first('alert_link') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.userAlert.fields.alert_link_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="users">{{ trans('cruds.userAlert.fields.user') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('users') ? 'is-invalid' : '' }}" name="users[]" id="users" multiple>
                    @foreach($users as $id => $user)
                        <option value="{{ $id }}" {{ in_array($id, old('users', [])) ? 'selected' : '' }}>{{ $user }}</option>
                    @endforeach
                </select>
                @if($errors->has('users'))
                    <span class="text-danger">{{ $errors->first('users') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.userAlert.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.userAlert.fields.tipo') }}</label>
                @foreach(App\UserAlert::TIPO_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('tipo') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="tipo_{{ $key }}" name="tipo" value="{{ $key }}" {{ old('tipo', '') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="tipo_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('tipo'))
                    <span class="text-danger">{{ $errors->first('tipo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.userAlert.fields.tipo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="scadenza_evento">{{ trans('cruds.userAlert.fields.scadenza_evento') }}</label>
                <input class="form-control datetime {{ $errors->has('scadenza_evento') ? 'is-invalid' : '' }}" type="text" name="scadenza_evento" id="scadenza_evento" value="{{ old('scadenza_evento') }}">
                @if($errors->has('scadenza_evento'))
                    <span class="text-danger">{{ $errors->first('scadenza_evento') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.userAlert.fields.scadenza_evento_helper') }}</span>
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