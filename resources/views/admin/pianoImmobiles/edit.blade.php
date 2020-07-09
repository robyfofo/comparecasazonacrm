@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.pianoImmobile.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.piano-immobiles.update", [$pianoImmobile->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="piano">{{ trans('cruds.pianoImmobile.fields.piano') }}</label>
                <input class="form-control {{ $errors->has('piano') ? 'is-invalid' : '' }}" type="text" name="piano" id="piano" value="{{ old('piano', $pianoImmobile->piano) }}" required>
                @if($errors->has('piano'))
                    <span class="text-danger">{{ $errors->first('piano') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pianoImmobile.fields.piano_helper') }}</span>
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