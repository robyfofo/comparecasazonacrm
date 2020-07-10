@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.fattura.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.fatturas.update", [$fattura->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="cliente_nome">{{ trans('cruds.fattura.fields.cliente_nome') }}</label>
                <input class="form-control {{ $errors->has('cliente_nome') ? 'is-invalid' : '' }}" type="text" name="cliente_nome" id="cliente_nome" value="{{ old('cliente_nome', $fattura->cliente_nome) }}" required>
                @if($errors->has('cliente_nome'))
                    <span class="text-danger">{{ $errors->first('cliente_nome') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.fattura.fields.cliente_nome_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cliente_cognome">{{ trans('cruds.fattura.fields.cliente_cognome') }}</label>
                <input class="form-control {{ $errors->has('cliente_cognome') ? 'is-invalid' : '' }}" type="text" name="cliente_cognome" id="cliente_cognome" value="{{ old('cliente_cognome', $fattura->cliente_cognome) }}">
                @if($errors->has('cliente_cognome'))
                    <span class="text-danger">{{ $errors->first('cliente_cognome') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.fattura.fields.cliente_cognome_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cliente_ragione_sociale">{{ trans('cruds.fattura.fields.cliente_ragione_sociale') }}</label>
                <input class="form-control {{ $errors->has('cliente_ragione_sociale') ? 'is-invalid' : '' }}" type="text" name="cliente_ragione_sociale" id="cliente_ragione_sociale" value="{{ old('cliente_ragione_sociale', $fattura->cliente_ragione_sociale) }}">
                @if($errors->has('cliente_ragione_sociale'))
                    <span class="text-danger">{{ $errors->first('cliente_ragione_sociale') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.fattura.fields.cliente_ragione_sociale_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cliente_codice_fiscale">{{ trans('cruds.fattura.fields.cliente_codice_fiscale') }}</label>
                <input class="form-control {{ $errors->has('cliente_codice_fiscale') ? 'is-invalid' : '' }}" type="text" name="cliente_codice_fiscale" id="cliente_codice_fiscale" value="{{ old('cliente_codice_fiscale', $fattura->cliente_codice_fiscale) }}">
                @if($errors->has('cliente_codice_fiscale'))
                    <span class="text-danger">{{ $errors->first('cliente_codice_fiscale') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.fattura.fields.cliente_codice_fiscale_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cliente_partita_iva">{{ trans('cruds.fattura.fields.cliente_partita_iva') }}</label>
                <input class="form-control {{ $errors->has('cliente_partita_iva') ? 'is-invalid' : '' }}" type="text" name="cliente_partita_iva" id="cliente_partita_iva" value="{{ old('cliente_partita_iva', $fattura->cliente_partita_iva) }}">
                @if($errors->has('cliente_partita_iva'))
                    <span class="text-danger">{{ $errors->first('cliente_partita_iva') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.fattura.fields.cliente_partita_iva_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="cliente_indirizzo">{{ trans('cruds.fattura.fields.cliente_indirizzo') }}</label>
                <input class="form-control {{ $errors->has('cliente_indirizzo') ? 'is-invalid' : '' }}" type="text" name="cliente_indirizzo" id="cliente_indirizzo" value="{{ old('cliente_indirizzo', $fattura->cliente_indirizzo) }}" required>
                @if($errors->has('cliente_indirizzo'))
                    <span class="text-danger">{{ $errors->first('cliente_indirizzo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.fattura.fields.cliente_indirizzo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="filiale_agenzia_nome">{{ trans('cruds.fattura.fields.filiale_agenzia_nome') }}</label>
                <input class="form-control {{ $errors->has('filiale_agenzia_nome') ? 'is-invalid' : '' }}" type="text" name="filiale_agenzia_nome" id="filiale_agenzia_nome" value="{{ old('filiale_agenzia_nome', $fattura->filiale_agenzia_nome) }}">
                @if($errors->has('filiale_agenzia_nome'))
                    <span class="text-danger">{{ $errors->first('filiale_agenzia_nome') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.fattura.fields.filiale_agenzia_nome_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="fattura_numero">{{ trans('cruds.fattura.fields.fattura_numero') }}</label>
                <input class="form-control {{ $errors->has('fattura_numero') ? 'is-invalid' : '' }}" type="text" name="fattura_numero" id="fattura_numero" value="{{ old('fattura_numero', $fattura->fattura_numero) }}" required>
                @if($errors->has('fattura_numero'))
                    <span class="text-danger">{{ $errors->first('fattura_numero') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.fattura.fields.fattura_numero_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="fattura_anno">{{ trans('cruds.fattura.fields.fattura_anno') }}</label>
                <input class="form-control {{ $errors->has('fattura_anno') ? 'is-invalid' : '' }}" type="number" name="fattura_anno" id="fattura_anno" value="{{ old('fattura_anno', $fattura->fattura_anno) }}" step="1" required>
                @if($errors->has('fattura_anno'))
                    <span class="text-danger">{{ $errors->first('fattura_anno') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.fattura.fields.fattura_anno_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="data_emissione">{{ trans('cruds.fattura.fields.data_emissione') }}</label>
                <input class="form-control date {{ $errors->has('data_emissione') ? 'is-invalid' : '' }}" type="text" name="data_emissione" id="data_emissione" value="{{ old('data_emissione', $fattura->data_emissione) }}" required>
                @if($errors->has('data_emissione'))
                    <span class="text-danger">{{ $errors->first('data_emissione') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.fattura.fields.data_emissione_helper') }}</span>
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