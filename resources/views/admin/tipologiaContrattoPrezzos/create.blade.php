@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.tipologiaContrattoPrezzo.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.tipologia-contratto-prezzos.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nome">{{ trans('cruds.tipologiaContrattoPrezzo.fields.nome') }}</label>
                <input class="form-control {{ $errors->has('nome') ? 'is-invalid' : '' }}" type="text" name="nome" id="nome" value="{{ old('nome', '') }}">
                @if($errors->has('nome'))
                    <span class="text-danger">{{ $errors->first('nome') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tipologiaContrattoPrezzo.fields.nome_helper') }}</span>
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