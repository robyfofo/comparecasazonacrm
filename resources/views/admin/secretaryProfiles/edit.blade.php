@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.secretaryProfile.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.secretary-profiles.update", [$secretaryProfile->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="nome">{{ trans('cruds.secretaryProfile.fields.nome') }}</label>
                <input class="form-control {{ $errors->has('nome') ? 'is-invalid' : '' }}" type="text" name="nome" id="nome" value="{{ old('nome', $secretaryProfile->nome) }}" required>
                @if($errors->has('nome'))
                    <span class="text-danger">{{ $errors->first('nome') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.secretaryProfile.fields.nome_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="indirizzo">{{ trans('cruds.secretaryProfile.fields.indirizzo') }}</label>
                <input class="form-control {{ $errors->has('indirizzo') ? 'is-invalid' : '' }}" type="text" name="indirizzo" id="indirizzo" value="{{ old('indirizzo', $secretaryProfile->indirizzo) }}">
                @if($errors->has('indirizzo'))
                    <span class="text-danger">{{ $errors->first('indirizzo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.secretaryProfile.fields.indirizzo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cap">{{ trans('cruds.secretaryProfile.fields.cap') }}</label>
                <input class="form-control {{ $errors->has('cap') ? 'is-invalid' : '' }}" type="number" name="cap" id="cap" value="{{ old('cap', $secretaryProfile->cap) }}" step="1">
                @if($errors->has('cap'))
                    <span class="text-danger">{{ $errors->first('cap') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.secretaryProfile.fields.cap_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="telefono">{{ trans('cruds.secretaryProfile.fields.telefono') }}</label>
                <input class="form-control {{ $errors->has('telefono') ? 'is-invalid' : '' }}" type="text" name="telefono" id="telefono" value="{{ old('telefono', $secretaryProfile->telefono) }}">
                @if($errors->has('telefono'))
                    <span class="text-danger">{{ $errors->first('telefono') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.secretaryProfile.fields.telefono_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cellulare">{{ trans('cruds.secretaryProfile.fields.cellulare') }}</label>
                <input class="form-control {{ $errors->has('cellulare') ? 'is-invalid' : '' }}" type="text" name="cellulare" id="cellulare" value="{{ old('cellulare', $secretaryProfile->cellulare) }}">
                @if($errors->has('cellulare'))
                    <span class="text-danger">{{ $errors->first('cellulare') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.secretaryProfile.fields.cellulare_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fax">{{ trans('cruds.secretaryProfile.fields.fax') }}</label>
                <input class="form-control {{ $errors->has('fax') ? 'is-invalid' : '' }}" type="text" name="fax" id="fax" value="{{ old('fax', $secretaryProfile->fax) }}">
                @if($errors->has('fax'))
                    <span class="text-danger">{{ $errors->first('fax') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.secretaryProfile.fields.fax_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="lunedi_inizio">{{ trans('cruds.secretaryProfile.fields.lunedi_inizio') }}</label>
                <input class="form-control timepicker {{ $errors->has('lunedi_inizio') ? 'is-invalid' : '' }}" type="text" name="lunedi_inizio" id="lunedi_inizio" value="{{ old('lunedi_inizio', $secretaryProfile->lunedi_inizio) }}">
                @if($errors->has('lunedi_inizio'))
                    <span class="text-danger">{{ $errors->first('lunedi_inizio') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.secretaryProfile.fields.lunedi_inizio_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="lunedi_fine">{{ trans('cruds.secretaryProfile.fields.lunedi_fine') }}</label>
                <input class="form-control timepicker {{ $errors->has('lunedi_fine') ? 'is-invalid' : '' }}" type="text" name="lunedi_fine" id="lunedi_fine" value="{{ old('lunedi_fine', $secretaryProfile->lunedi_fine) }}">
                @if($errors->has('lunedi_fine'))
                    <span class="text-danger">{{ $errors->first('lunedi_fine') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.secretaryProfile.fields.lunedi_fine_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="martedi_inizio">{{ trans('cruds.secretaryProfile.fields.martedi_inizio') }}</label>
                <input class="form-control timepicker {{ $errors->has('martedi_inizio') ? 'is-invalid' : '' }}" type="text" name="martedi_inizio" id="martedi_inizio" value="{{ old('martedi_inizio', $secretaryProfile->martedi_inizio) }}">
                @if($errors->has('martedi_inizio'))
                    <span class="text-danger">{{ $errors->first('martedi_inizio') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.secretaryProfile.fields.martedi_inizio_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="martedi_fine">{{ trans('cruds.secretaryProfile.fields.martedi_fine') }}</label>
                <input class="form-control timepicker {{ $errors->has('martedi_fine') ? 'is-invalid' : '' }}" type="text" name="martedi_fine" id="martedi_fine" value="{{ old('martedi_fine', $secretaryProfile->martedi_fine) }}">
                @if($errors->has('martedi_fine'))
                    <span class="text-danger">{{ $errors->first('martedi_fine') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.secretaryProfile.fields.martedi_fine_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mercoledi_inizio">{{ trans('cruds.secretaryProfile.fields.mercoledi_inizio') }}</label>
                <input class="form-control timepicker {{ $errors->has('mercoledi_inizio') ? 'is-invalid' : '' }}" type="text" name="mercoledi_inizio" id="mercoledi_inizio" value="{{ old('mercoledi_inizio', $secretaryProfile->mercoledi_inizio) }}">
                @if($errors->has('mercoledi_inizio'))
                    <span class="text-danger">{{ $errors->first('mercoledi_inizio') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.secretaryProfile.fields.mercoledi_inizio_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mercoledi_fine">{{ trans('cruds.secretaryProfile.fields.mercoledi_fine') }}</label>
                <input class="form-control timepicker {{ $errors->has('mercoledi_fine') ? 'is-invalid' : '' }}" type="text" name="mercoledi_fine" id="mercoledi_fine" value="{{ old('mercoledi_fine', $secretaryProfile->mercoledi_fine) }}">
                @if($errors->has('mercoledi_fine'))
                    <span class="text-danger">{{ $errors->first('mercoledi_fine') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.secretaryProfile.fields.mercoledi_fine_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="giovedi_inizio">{{ trans('cruds.secretaryProfile.fields.giovedi_inizio') }}</label>
                <input class="form-control timepicker {{ $errors->has('giovedi_inizio') ? 'is-invalid' : '' }}" type="text" name="giovedi_inizio" id="giovedi_inizio" value="{{ old('giovedi_inizio', $secretaryProfile->giovedi_inizio) }}">
                @if($errors->has('giovedi_inizio'))
                    <span class="text-danger">{{ $errors->first('giovedi_inizio') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.secretaryProfile.fields.giovedi_inizio_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="giovedi_fine">{{ trans('cruds.secretaryProfile.fields.giovedi_fine') }}</label>
                <input class="form-control timepicker {{ $errors->has('giovedi_fine') ? 'is-invalid' : '' }}" type="text" name="giovedi_fine" id="giovedi_fine" value="{{ old('giovedi_fine', $secretaryProfile->giovedi_fine) }}">
                @if($errors->has('giovedi_fine'))
                    <span class="text-danger">{{ $errors->first('giovedi_fine') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.secretaryProfile.fields.giovedi_fine_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="venerdi_inizio">{{ trans('cruds.secretaryProfile.fields.venerdi_inizio') }}</label>
                <input class="form-control timepicker {{ $errors->has('venerdi_inizio') ? 'is-invalid' : '' }}" type="text" name="venerdi_inizio" id="venerdi_inizio" value="{{ old('venerdi_inizio', $secretaryProfile->venerdi_inizio) }}">
                @if($errors->has('venerdi_inizio'))
                    <span class="text-danger">{{ $errors->first('venerdi_inizio') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.secretaryProfile.fields.venerdi_inizio_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="venerdi_fine">{{ trans('cruds.secretaryProfile.fields.venerdi_fine') }}</label>
                <input class="form-control timepicker {{ $errors->has('venerdi_fine') ? 'is-invalid' : '' }}" type="text" name="venerdi_fine" id="venerdi_fine" value="{{ old('venerdi_fine', $secretaryProfile->venerdi_fine) }}">
                @if($errors->has('venerdi_fine'))
                    <span class="text-danger">{{ $errors->first('venerdi_fine') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.secretaryProfile.fields.venerdi_fine_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sabato_inizio">{{ trans('cruds.secretaryProfile.fields.sabato_inizio') }}</label>
                <input class="form-control timepicker {{ $errors->has('sabato_inizio') ? 'is-invalid' : '' }}" type="text" name="sabato_inizio" id="sabato_inizio" value="{{ old('sabato_inizio', $secretaryProfile->sabato_inizio) }}">
                @if($errors->has('sabato_inizio'))
                    <span class="text-danger">{{ $errors->first('sabato_inizio') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.secretaryProfile.fields.sabato_inizio_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sabato_fine">{{ trans('cruds.secretaryProfile.fields.sabato_fine') }}</label>
                <input class="form-control timepicker {{ $errors->has('sabato_fine') ? 'is-invalid' : '' }}" type="text" name="sabato_fine" id="sabato_fine" value="{{ old('sabato_fine', $secretaryProfile->sabato_fine) }}">
                @if($errors->has('sabato_fine'))
                    <span class="text-danger">{{ $errors->first('sabato_fine') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.secretaryProfile.fields.sabato_fine_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="domenica_inizio">{{ trans('cruds.secretaryProfile.fields.domenica_inizio') }}</label>
                <input class="form-control timepicker {{ $errors->has('domenica_inizio') ? 'is-invalid' : '' }}" type="text" name="domenica_inizio" id="domenica_inizio" value="{{ old('domenica_inizio', $secretaryProfile->domenica_inizio) }}">
                @if($errors->has('domenica_inizio'))
                    <span class="text-danger">{{ $errors->first('domenica_inizio') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.secretaryProfile.fields.domenica_inizio_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="domenica_fine">{{ trans('cruds.secretaryProfile.fields.domenica_fine') }}</label>
                <input class="form-control timepicker {{ $errors->has('domenica_fine') ? 'is-invalid' : '' }}" type="text" name="domenica_fine" id="domenica_fine" value="{{ old('domenica_fine', $secretaryProfile->domenica_fine) }}">
                @if($errors->has('domenica_fine'))
                    <span class="text-danger">{{ $errors->first('domenica_fine') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.secretaryProfile.fields.domenica_fine_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="comune_id">{{ trans('cruds.secretaryProfile.fields.comune') }}</label>
                <select class="form-control select2 {{ $errors->has('comune') ? 'is-invalid' : '' }}" name="comune_id" id="comune_id">
                    @foreach($comunes as $id => $comune)
                        <option value="{{ $id }}" {{ ($secretaryProfile->comune ? $secretaryProfile->comune->id : old('comune_id')) == $id ? 'selected' : '' }}>{{ $comune }}</option>
                    @endforeach
                </select>
                @if($errors->has('comune'))
                    <span class="text-danger">{{ $errors->first('comune') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.secretaryProfile.fields.comune_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="filiale_id">{{ trans('cruds.secretaryProfile.fields.filiale') }}</label>
                <select class="form-control select2 {{ $errors->has('filiale') ? 'is-invalid' : '' }}" name="filiale_id" id="filiale_id">
                    @foreach($filiales as $id => $filiale)
                        <option value="{{ $id }}" {{ ($secretaryProfile->filiale ? $secretaryProfile->filiale->id : old('filiale_id')) == $id ? 'selected' : '' }}>{{ $filiale }}</option>
                    @endforeach
                </select>
                @if($errors->has('filiale'))
                    <span class="text-danger">{{ $errors->first('filiale') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.secretaryProfile.fields.filiale_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email_istituzionale">{{ trans('cruds.secretaryProfile.fields.email_istituzionale') }}</label>
                <input class="form-control {{ $errors->has('email_istituzionale') ? 'is-invalid' : '' }}" type="email" name="email_istituzionale" id="email_istituzionale" value="{{ old('email_istituzionale', $secretaryProfile->email_istituzionale) }}">
                @if($errors->has('email_istituzionale'))
                    <span class="text-danger">{{ $errors->first('email_istituzionale') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.secretaryProfile.fields.email_istituzionale_helper') }}</span>
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