@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.province.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.provinces.update", [$province->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="nome">{{ trans('cruds.province.fields.nome') }}</label>
                <input class="form-control {{ $errors->has('nome') ? 'is-invalid' : '' }}" type="text" name="nome" id="nome" value="{{ old('nome', $province->nome) }}">
                @if($errors->has('nome'))
                    <span class="text-danger">{{ $errors->first('nome') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.province.fields.nome_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="codice">{{ trans('cruds.province.fields.codice') }}</label>
                <input class="form-control {{ $errors->has('codice') ? 'is-invalid' : '' }}" type="text" name="codice" id="codice" value="{{ old('codice', $province->codice) }}">
                @if($errors->has('codice'))
                    <span class="text-danger">{{ $errors->first('codice') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.province.fields.codice_helper') }}</span>
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