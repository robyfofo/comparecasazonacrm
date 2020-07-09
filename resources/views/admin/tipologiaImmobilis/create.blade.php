@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.tipologiaImmobili.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.tipologia-immobilis.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="insieme">{{ trans('cruds.tipologiaImmobili.fields.insieme') }}</label>
                <input class="form-control {{ $errors->has('insieme') ? 'is-invalid' : '' }}" type="text" name="insieme" id="insieme" value="{{ old('insieme', '') }}">
                @if($errors->has('insieme'))
                    <span class="text-danger">{{ $errors->first('insieme') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tipologiaImmobili.fields.insieme_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nome">{{ trans('cruds.tipologiaImmobili.fields.nome') }}</label>
                <input class="form-control {{ $errors->has('nome') ? 'is-invalid' : '' }}" type="text" name="nome" id="nome" value="{{ old('nome', '') }}" required>
                @if($errors->has('nome'))
                    <span class="text-danger">{{ $errors->first('nome') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tipologiaImmobili.fields.nome_helper') }}</span>
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