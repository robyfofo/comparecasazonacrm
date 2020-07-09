@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.agentProfile.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.agent-profiles.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="nome">{{ trans('cruds.agentProfile.fields.nome') }}</label>
                <input class="form-control {{ $errors->has('nome') ? 'is-invalid' : '' }}" type="text" name="nome" id="nome" value="{{ old('nome', '') }}" required>
                @if($errors->has('nome'))
                    <span class="text-danger">{{ $errors->first('nome') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.agentProfile.fields.nome_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="indirizzo">{{ trans('cruds.agentProfile.fields.indirizzo') }}</label>
                <input class="form-control {{ $errors->has('indirizzo') ? 'is-invalid' : '' }}" type="text" name="indirizzo" id="indirizzo" value="{{ old('indirizzo', '') }}">
                @if($errors->has('indirizzo'))
                    <span class="text-danger">{{ $errors->first('indirizzo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.agentProfile.fields.indirizzo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cap">{{ trans('cruds.agentProfile.fields.cap') }}</label>
                <input class="form-control {{ $errors->has('cap') ? 'is-invalid' : '' }}" type="number" name="cap" id="cap" value="{{ old('cap', '0') }}" step="1">
                @if($errors->has('cap'))
                    <span class="text-danger">{{ $errors->first('cap') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.agentProfile.fields.cap_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="telefono">{{ trans('cruds.agentProfile.fields.telefono') }}</label>
                <input class="form-control {{ $errors->has('telefono') ? 'is-invalid' : '' }}" type="text" name="telefono" id="telefono" value="{{ old('telefono', '') }}">
                @if($errors->has('telefono'))
                    <span class="text-danger">{{ $errors->first('telefono') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.agentProfile.fields.telefono_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cellulare">{{ trans('cruds.agentProfile.fields.cellulare') }}</label>
                <input class="form-control {{ $errors->has('cellulare') ? 'is-invalid' : '' }}" type="text" name="cellulare" id="cellulare" value="{{ old('cellulare', '') }}">
                @if($errors->has('cellulare'))
                    <span class="text-danger">{{ $errors->first('cellulare') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.agentProfile.fields.cellulare_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fax">{{ trans('cruds.agentProfile.fields.fax') }}</label>
                <input class="form-control {{ $errors->has('fax') ? 'is-invalid' : '' }}" type="text" name="fax" id="fax" value="{{ old('fax', '') }}">
                @if($errors->has('fax'))
                    <span class="text-danger">{{ $errors->first('fax') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.agentProfile.fields.fax_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="lunedi_inizio">{{ trans('cruds.agentProfile.fields.lunedi_inizio') }}</label>
                <input class="form-control timepicker {{ $errors->has('lunedi_inizio') ? 'is-invalid' : '' }}" type="text" name="lunedi_inizio" id="lunedi_inizio" value="{{ old('lunedi_inizio') }}">
                @if($errors->has('lunedi_inizio'))
                    <span class="text-danger">{{ $errors->first('lunedi_inizio') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.agentProfile.fields.lunedi_inizio_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="lunedi_fine">{{ trans('cruds.agentProfile.fields.lunedi_fine') }}</label>
                <input class="form-control timepicker {{ $errors->has('lunedi_fine') ? 'is-invalid' : '' }}" type="text" name="lunedi_fine" id="lunedi_fine" value="{{ old('lunedi_fine') }}">
                @if($errors->has('lunedi_fine'))
                    <span class="text-danger">{{ $errors->first('lunedi_fine') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.agentProfile.fields.lunedi_fine_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="martedi_inizio">{{ trans('cruds.agentProfile.fields.martedi_inizio') }}</label>
                <input class="form-control timepicker {{ $errors->has('martedi_inizio') ? 'is-invalid' : '' }}" type="text" name="martedi_inizio" id="martedi_inizio" value="{{ old('martedi_inizio') }}">
                @if($errors->has('martedi_inizio'))
                    <span class="text-danger">{{ $errors->first('martedi_inizio') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.agentProfile.fields.martedi_inizio_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="martedi_fine">{{ trans('cruds.agentProfile.fields.martedi_fine') }}</label>
                <input class="form-control timepicker {{ $errors->has('martedi_fine') ? 'is-invalid' : '' }}" type="text" name="martedi_fine" id="martedi_fine" value="{{ old('martedi_fine') }}">
                @if($errors->has('martedi_fine'))
                    <span class="text-danger">{{ $errors->first('martedi_fine') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.agentProfile.fields.martedi_fine_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mercoledi_inizio">{{ trans('cruds.agentProfile.fields.mercoledi_inizio') }}</label>
                <input class="form-control timepicker {{ $errors->has('mercoledi_inizio') ? 'is-invalid' : '' }}" type="text" name="mercoledi_inizio" id="mercoledi_inizio" value="{{ old('mercoledi_inizio') }}">
                @if($errors->has('mercoledi_inizio'))
                    <span class="text-danger">{{ $errors->first('mercoledi_inizio') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.agentProfile.fields.mercoledi_inizio_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mercoledi_fine">{{ trans('cruds.agentProfile.fields.mercoledi_fine') }}</label>
                <input class="form-control timepicker {{ $errors->has('mercoledi_fine') ? 'is-invalid' : '' }}" type="text" name="mercoledi_fine" id="mercoledi_fine" value="{{ old('mercoledi_fine') }}">
                @if($errors->has('mercoledi_fine'))
                    <span class="text-danger">{{ $errors->first('mercoledi_fine') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.agentProfile.fields.mercoledi_fine_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="giovedi_inizio">{{ trans('cruds.agentProfile.fields.giovedi_inizio') }}</label>
                <input class="form-control timepicker {{ $errors->has('giovedi_inizio') ? 'is-invalid' : '' }}" type="text" name="giovedi_inizio" id="giovedi_inizio" value="{{ old('giovedi_inizio') }}">
                @if($errors->has('giovedi_inizio'))
                    <span class="text-danger">{{ $errors->first('giovedi_inizio') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.agentProfile.fields.giovedi_inizio_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="giovedi_fine">{{ trans('cruds.agentProfile.fields.giovedi_fine') }}</label>
                <input class="form-control timepicker {{ $errors->has('giovedi_fine') ? 'is-invalid' : '' }}" type="text" name="giovedi_fine" id="giovedi_fine" value="{{ old('giovedi_fine') }}">
                @if($errors->has('giovedi_fine'))
                    <span class="text-danger">{{ $errors->first('giovedi_fine') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.agentProfile.fields.giovedi_fine_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="venerdi_inizio">{{ trans('cruds.agentProfile.fields.venerdi_inizio') }}</label>
                <input class="form-control timepicker {{ $errors->has('venerdi_inizio') ? 'is-invalid' : '' }}" type="text" name="venerdi_inizio" id="venerdi_inizio" value="{{ old('venerdi_inizio') }}">
                @if($errors->has('venerdi_inizio'))
                    <span class="text-danger">{{ $errors->first('venerdi_inizio') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.agentProfile.fields.venerdi_inizio_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="venerdi_fine">{{ trans('cruds.agentProfile.fields.venerdi_fine') }}</label>
                <input class="form-control timepicker {{ $errors->has('venerdi_fine') ? 'is-invalid' : '' }}" type="text" name="venerdi_fine" id="venerdi_fine" value="{{ old('venerdi_fine') }}">
                @if($errors->has('venerdi_fine'))
                    <span class="text-danger">{{ $errors->first('venerdi_fine') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.agentProfile.fields.venerdi_fine_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sabato_inizio">{{ trans('cruds.agentProfile.fields.sabato_inizio') }}</label>
                <input class="form-control timepicker {{ $errors->has('sabato_inizio') ? 'is-invalid' : '' }}" type="text" name="sabato_inizio" id="sabato_inizio" value="{{ old('sabato_inizio') }}">
                @if($errors->has('sabato_inizio'))
                    <span class="text-danger">{{ $errors->first('sabato_inizio') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.agentProfile.fields.sabato_inizio_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sabato_fine">{{ trans('cruds.agentProfile.fields.sabato_fine') }}</label>
                <input class="form-control timepicker {{ $errors->has('sabato_fine') ? 'is-invalid' : '' }}" type="text" name="sabato_fine" id="sabato_fine" value="{{ old('sabato_fine') }}">
                @if($errors->has('sabato_fine'))
                    <span class="text-danger">{{ $errors->first('sabato_fine') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.agentProfile.fields.sabato_fine_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="domenica_inizio">{{ trans('cruds.agentProfile.fields.domenica_inizio') }}</label>
                <input class="form-control timepicker {{ $errors->has('domenica_inizio') ? 'is-invalid' : '' }}" type="text" name="domenica_inizio" id="domenica_inizio" value="{{ old('domenica_inizio') }}">
                @if($errors->has('domenica_inizio'))
                    <span class="text-danger">{{ $errors->first('domenica_inizio') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.agentProfile.fields.domenica_inizio_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="domenica_fine">{{ trans('cruds.agentProfile.fields.domenica_fine') }}</label>
                <input class="form-control timepicker {{ $errors->has('domenica_fine') ? 'is-invalid' : '' }}" type="text" name="domenica_fine" id="domenica_fine" value="{{ old('domenica_fine') }}">
                @if($errors->has('domenica_fine'))
                    <span class="text-danger">{{ $errors->first('domenica_fine') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.agentProfile.fields.domenica_fine_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="comune_id">{{ trans('cruds.agentProfile.fields.comune') }}</label>
                <select class="form-control select2 {{ $errors->has('comune') ? 'is-invalid' : '' }}" name="comune_id" id="comune_id">
                    @foreach($comunes as $id => $comune)
                        <option value="{{ $id }}" {{ old('comune_id') == $id ? 'selected' : '' }}>{{ $comune }}</option>
                    @endforeach
                </select>
                @if($errors->has('comune'))
                    <span class="text-danger">{{ $errors->first('comune') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.agentProfile.fields.comune_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="filiale_id">{{ trans('cruds.agentProfile.fields.filiale') }}</label>
                <select class="form-control select2 {{ $errors->has('filiale') ? 'is-invalid' : '' }}" name="filiale_id" id="filiale_id">
                    @foreach($filiales as $id => $filiale)
                        <option value="{{ $id }}" {{ old('filiale_id') == $id ? 'selected' : '' }}>{{ $filiale }}</option>
                    @endforeach
                </select>
                @if($errors->has('filiale'))
                    <span class="text-danger">{{ $errors->first('filiale') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.agentProfile.fields.filiale_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email_istituzionale">{{ trans('cruds.agentProfile.fields.email_istituzionale') }}</label>
                <input class="form-control {{ $errors->has('email_istituzionale') ? 'is-invalid' : '' }}" type="email" name="email_istituzionale" id="email_istituzionale" value="{{ old('email_istituzionale') }}">
                @if($errors->has('email_istituzionale'))
                    <span class="text-danger">{{ $errors->first('email_istituzionale') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.agentProfile.fields.email_istituzionale_helper') }}</span>
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