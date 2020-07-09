@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.appuntamentoTipologie.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.appuntamento-tipologies.update", [$appuntamentoTipologie->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="nome">{{ trans('cruds.appuntamentoTipologie.fields.nome') }}</label>
                <input class="form-control {{ $errors->has('nome') ? 'is-invalid' : '' }}" type="text" name="nome" id="nome" value="{{ old('nome', $appuntamentoTipologie->nome) }}" required>
                @if($errors->has('nome'))
                    <span class="text-danger">{{ $errors->first('nome') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.appuntamentoTipologie.fields.nome_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="pos">{{ trans('cruds.appuntamentoTipologie.fields.pos') }}</label>
                <input class="form-control {{ $errors->has('pos') ? 'is-invalid' : '' }}" type="number" name="pos" id="pos" value="{{ old('pos', $appuntamentoTipologie->pos) }}" step="1" required>
                @if($errors->has('pos'))
                    <span class="text-danger">{{ $errors->first('pos') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.appuntamentoTipologie.fields.pos_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bgcolor">{{ trans('cruds.appuntamentoTipologie.fields.bgcolor') }}</label>
                <input class="form-control {{ $errors->has('bgcolor') ? 'is-invalid' : '' }}" type="text" name="bgcolor" id="bgcolor" value="{{ old('bgcolor', $appuntamentoTipologie->bgcolor) }}">
                @if($errors->has('bgcolor'))
                    <span class="text-danger">{{ $errors->first('bgcolor') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.appuntamentoTipologie.fields.bgcolor_helper') }}</span>
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