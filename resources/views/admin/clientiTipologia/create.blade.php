@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.clientiTipologium.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.clienti-tipologia.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="tipologia">{{ trans('cruds.clientiTipologium.fields.tipologia') }}</label>
                <input class="form-control {{ $errors->has('tipologia') ? 'is-invalid' : '' }}" type="text" name="tipologia" id="tipologia" value="{{ old('tipologia', '') }}" required>
                @if($errors->has('tipologia'))
                    <span class="text-danger">{{ $errors->first('tipologia') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.clientiTipologium.fields.tipologia_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('stato') ? 'is-invalid' : '' }}">
                    <input class="form-check-input" type="checkbox" name="stato" id="stato" value="1" required {{ old('stato', 0) == 1 || old('stato') === null ? 'checked' : '' }}>
                    <label class="required form-check-label" for="stato">{{ trans('cruds.clientiTipologium.fields.stato') }}</label>
                </div>
                @if($errors->has('stato'))
                    <span class="text-danger">{{ $errors->first('stato') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.clientiTipologium.fields.stato_helper') }}</span>
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