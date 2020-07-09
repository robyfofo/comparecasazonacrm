@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.user.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.users.update", [$user->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.user.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="surname">{{ trans('cruds.user.fields.surname') }}</label>
                <input class="form-control {{ $errors->has('surname') ? 'is-invalid' : '' }}" type="text" name="surname" id="surname" value="{{ old('surname', $user->surname) }}" required>
                @if($errors->has('surname'))
                    <span class="text-danger">{{ $errors->first('surname') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.surname_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.user.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required>
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="password">{{ trans('cruds.user.fields.password') }}</label>
                <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" id="password">
                @if($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.password_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="roles">{{ trans('cruds.user.fields.roles') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('roles') ? 'is-invalid' : '' }}" name="roles[]" id="roles" multiple required>
                    @foreach($roles as $id => $roles)
                        <option value="{{ $id }}" {{ (in_array($id, old('roles', [])) || $user->roles->contains($id)) ? 'selected' : '' }}>{{ $roles }}</option>
                    @endforeach
                </select>
                @if($errors->has('roles'))
                    <span class="text-danger">{{ $errors->first('roles') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.roles_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="agent_profile_id">{{ trans('cruds.user.fields.agent_profile') }}</label>
                <select class="form-control select2 {{ $errors->has('agent_profile') ? 'is-invalid' : '' }}" name="agent_profile_id" id="agent_profile_id">
                    @foreach($agent_profiles as $id => $agent_profile)
                        <option value="{{ $id }}" {{ ($user->agent_profile ? $user->agent_profile->id : old('agent_profile_id')) == $id ? 'selected' : '' }}>{{ $agent_profile }}</option>
                    @endforeach
                </select>
                @if($errors->has('agent_profile'))
                    <span class="text-danger">{{ $errors->first('agent_profile') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.agent_profile_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="client_profile_id">{{ trans('cruds.user.fields.client_profile') }}</label>
                <select class="form-control select2 {{ $errors->has('client_profile') ? 'is-invalid' : '' }}" name="client_profile_id" id="client_profile_id">
                    @foreach($client_profiles as $id => $client_profile)
                        <option value="{{ $id }}" {{ ($user->client_profile ? $user->client_profile->id : old('client_profile_id')) == $id ? 'selected' : '' }}>{{ $client_profile }}</option>
                    @endforeach
                </select>
                @if($errors->has('client_profile'))
                    <span class="text-danger">{{ $errors->first('client_profile') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.client_profile_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.user.fields.stato') }}</label>
                <select class="form-control {{ $errors->has('stato') ? 'is-invalid' : '' }}" name="stato" id="stato">
                    <option value disabled {{ old('stato', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\User::STATO_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('stato', $user->stato) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('stato'))
                    <span class="text-danger">{{ $errors->first('stato') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.stato_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="secretary_profile_id">{{ trans('cruds.user.fields.secretary_profile') }}</label>
                <select class="form-control select2 {{ $errors->has('secretary_profile') ? 'is-invalid' : '' }}" name="secretary_profile_id" id="secretary_profile_id">
                    @foreach($secretary_profiles as $id => $secretary_profile)
                        <option value="{{ $id }}" {{ ($user->secretary_profile ? $user->secretary_profile->id : old('secretary_profile_id')) == $id ? 'selected' : '' }}>{{ $secretary_profile }}</option>
                    @endforeach
                </select>
                @if($errors->has('secretary_profile'))
                    <span class="text-danger">{{ $errors->first('secretary_profile') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.secretary_profile_helper') }}</span>
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