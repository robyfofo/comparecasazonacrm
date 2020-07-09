@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.comuni.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.comunis.update", [$comuni->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="nome">{{ trans('cruds.comuni.fields.nome') }}</label>
                <input class="form-control {{ $errors->has('nome') ? 'is-invalid' : '' }}" type="text" name="nome" id="nome" value="{{ old('nome', $comuni->nome) }}">
                @if($errors->has('nome'))
                    <span class="text-danger">{{ $errors->first('nome') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.comuni.fields.nome_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cap">{{ trans('cruds.comuni.fields.cap') }}</label>
                <input class="form-control {{ $errors->has('cap') ? 'is-invalid' : '' }}" type="text" name="cap" id="cap" value="{{ old('cap', $comuni->cap) }}">
                @if($errors->has('cap'))
                    <span class="text-danger">{{ $errors->first('cap') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.comuni.fields.cap_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="prefisso">{{ trans('cruds.comuni.fields.prefisso') }}</label>
                <input class="form-control {{ $errors->has('prefisso') ? 'is-invalid' : '' }}" type="text" name="prefisso" id="prefisso" value="{{ old('prefisso', $comuni->prefisso) }}">
                @if($errors->has('prefisso'))
                    <span class="text-danger">{{ $errors->first('prefisso') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.comuni.fields.prefisso_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="provincia">{{ trans('cruds.comuni.fields.provincia') }}</label>
                <input class="form-control {{ $errors->has('provincia') ? 'is-invalid' : '' }}" type="text" name="provincia" id="provincia" value="{{ old('provincia', $comuni->provincia) }}">
                @if($errors->has('provincia'))
                    <span class="text-danger">{{ $errors->first('provincia') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.comuni.fields.provincia_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="prov_id">{{ trans('cruds.comuni.fields.prov') }}</label>
                <select class="form-control select2 {{ $errors->has('prov') ? 'is-invalid' : '' }}" name="prov_id" id="prov_id">
                    @foreach($provs as $id => $prov)
                        <option value="{{ $id }}" {{ ($comuni->prov ? $comuni->prov->id : old('prov_id')) == $id ? 'selected' : '' }}>{{ $prov }}</option>
                    @endforeach
                </select>
                @if($errors->has('prov'))
                    <span class="text-danger">{{ $errors->first('prov') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.comuni.fields.prov_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('stato') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="stato" value="0">
                    <input class="form-check-input" type="checkbox" name="stato" id="stato" value="1" {{ $comuni->stato || old('stato', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="stato">{{ trans('cruds.comuni.fields.stato') }}</label>
                </div>
                @if($errors->has('stato'))
                    <span class="text-danger">{{ $errors->first('stato') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.comuni.fields.stato_helper') }}</span>
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