@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.contrattoImmobile.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.contratto-immobiles.update", [$contrattoImmobile->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="contratto">{{ trans('cruds.contrattoImmobile.fields.contratto') }}</label>
                <input class="form-control {{ $errors->has('contratto') ? 'is-invalid' : '' }}" type="text" name="contratto" id="contratto" value="{{ old('contratto', $contrattoImmobile->contratto) }}" required>
                @if($errors->has('contratto'))
                    <span class="text-danger">{{ $errors->first('contratto') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.contrattoImmobile.fields.contratto_helper') }}</span>
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