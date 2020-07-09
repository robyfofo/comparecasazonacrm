@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.filiali.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.filialis.update", [$filiali->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="agenzia_id">{{ trans('cruds.filiali.fields.agenzia') }}</label>
                <select class="form-control select2 {{ $errors->has('agenzia') ? 'is-invalid' : '' }}" name="agenzia_id" id="agenzia_id" required>
                    @foreach($agenzias as $id => $agenzia)
                        <option value="{{ $id }}" {{ ($filiali->agenzia ? $filiali->agenzia->id : old('agenzia_id')) == $id ? 'selected' : '' }}>{{ $agenzia }}</option>
                    @endforeach
                </select>
                @if($errors->has('agenzia'))
                    <span class="text-danger">{{ $errors->first('agenzia') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.filiali.fields.agenzia_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nome">{{ trans('cruds.filiali.fields.nome') }}</label>
                <input class="form-control {{ $errors->has('nome') ? 'is-invalid' : '' }}" type="text" name="nome" id="nome" value="{{ old('nome', $filiali->nome) }}" required>
                @if($errors->has('nome'))
                    <span class="text-danger">{{ $errors->first('nome') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.filiali.fields.nome_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="comune_id">{{ trans('cruds.filiali.fields.comune') }}</label>
                <select class="form-control select2 {{ $errors->has('comune') ? 'is-invalid' : '' }}" name="comune_id" id="comune_id" required>
                    @foreach($comunes as $id => $comune)
                        <option value="{{ $id }}" {{ ($filiali->comune ? $filiali->comune->id : old('comune_id')) == $id ? 'selected' : '' }}>{{ $comune }}</option>
                    @endforeach
                </select>
                @if($errors->has('comune'))
                    <span class="text-danger">{{ $errors->first('comune') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.filiali.fields.comune_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="indirizzo">{{ trans('cruds.filiali.fields.indirizzo') }}</label>
                <input class="form-control {{ $errors->has('indirizzo') ? 'is-invalid' : '' }}" type="text" name="indirizzo" id="indirizzo" value="{{ old('indirizzo', $filiali->indirizzo) }}">
                @if($errors->has('indirizzo'))
                    <span class="text-danger">{{ $errors->first('indirizzo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.filiali.fields.indirizzo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cap">{{ trans('cruds.filiali.fields.cap') }}</label>
                <input class="form-control {{ $errors->has('cap') ? 'is-invalid' : '' }}" type="number" name="cap" id="cap" value="{{ old('cap', $filiali->cap) }}" step="1">
                @if($errors->has('cap'))
                    <span class="text-danger">{{ $errors->first('cap') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.filiali.fields.cap_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email">{{ trans('cruds.filiali.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', $filiali->email) }}">
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.filiali.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="telefono">{{ trans('cruds.filiali.fields.telefono') }}</label>
                <input class="form-control {{ $errors->has('telefono') ? 'is-invalid' : '' }}" type="text" name="telefono" id="telefono" value="{{ old('telefono', $filiali->telefono) }}">
                @if($errors->has('telefono'))
                    <span class="text-danger">{{ $errors->first('telefono') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.filiali.fields.telefono_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fax">{{ trans('cruds.filiali.fields.fax') }}</label>
                <input class="form-control {{ $errors->has('fax') ? 'is-invalid' : '' }}" type="text" name="fax" id="fax" value="{{ old('fax', $filiali->fax) }}">
                @if($errors->has('fax'))
                    <span class="text-danger">{{ $errors->first('fax') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.filiali.fields.fax_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email_pec">{{ trans('cruds.filiali.fields.email_pec') }}</label>
                <input class="form-control {{ $errors->has('email_pec') ? 'is-invalid' : '' }}" type="email" name="email_pec" id="email_pec" value="{{ old('email_pec', $filiali->email_pec) }}">
                @if($errors->has('email_pec'))
                    <span class="text-danger">{{ $errors->first('email_pec') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.filiali.fields.email_pec_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cellulare">{{ trans('cruds.filiali.fields.cellulare') }}</label>
                <input class="form-control {{ $errors->has('cellulare') ? 'is-invalid' : '' }}" type="text" name="cellulare" id="cellulare" value="{{ old('cellulare', $filiali->cellulare) }}">
                @if($errors->has('cellulare'))
                    <span class="text-danger">{{ $errors->first('cellulare') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.filiali.fields.cellulare_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="web">{{ trans('cruds.filiali.fields.web') }}</label>
                <input class="form-control {{ $errors->has('web') ? 'is-invalid' : '' }}" type="text" name="web" id="web" value="{{ old('web', $filiali->web) }}">
                @if($errors->has('web'))
                    <span class="text-danger">{{ $errors->first('web') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.filiali.fields.web_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="codice_fiscale">{{ trans('cruds.filiali.fields.codice_fiscale') }}</label>
                <input class="form-control {{ $errors->has('codice_fiscale') ? 'is-invalid' : '' }}" type="text" name="codice_fiscale" id="codice_fiscale" value="{{ old('codice_fiscale', $filiali->codice_fiscale) }}">
                @if($errors->has('codice_fiscale'))
                    <span class="text-danger">{{ $errors->first('codice_fiscale') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.filiali.fields.codice_fiscale_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="partita_iva">{{ trans('cruds.filiali.fields.partita_iva') }}</label>
                <input class="form-control {{ $errors->has('partita_iva') ? 'is-invalid' : '' }}" type="text" name="partita_iva" id="partita_iva" value="{{ old('partita_iva', $filiali->partita_iva) }}">
                @if($errors->has('partita_iva'))
                    <span class="text-danger">{{ $errors->first('partita_iva') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.filiali.fields.partita_iva_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ccia_numero_rea">{{ trans('cruds.filiali.fields.ccia_numero_rea') }}</label>
                <input class="form-control {{ $errors->has('ccia_numero_rea') ? 'is-invalid' : '' }}" type="text" name="ccia_numero_rea" id="ccia_numero_rea" value="{{ old('ccia_numero_rea', $filiali->ccia_numero_rea) }}">
                @if($errors->has('ccia_numero_rea'))
                    <span class="text-danger">{{ $errors->first('ccia_numero_rea') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.filiali.fields.ccia_numero_rea_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="capitale_sociale">{{ trans('cruds.filiali.fields.capitale_sociale') }}</label>
                <input class="form-control {{ $errors->has('capitale_sociale') ? 'is-invalid' : '' }}" type="number" name="capitale_sociale" id="capitale_sociale" value="{{ old('capitale_sociale', $filiali->capitale_sociale) }}" step="0.01">
                @if($errors->has('capitale_sociale'))
                    <span class="text-danger">{{ $errors->first('capitale_sociale') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.filiali.fields.capitale_sociale_helper') }}</span>
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