@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.garageImmobile.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.garage-immobiles.update", [$garageImmobile->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="garage">{{ trans('cruds.garageImmobile.fields.garage') }}</label>
                <input class="form-control {{ $errors->has('garage') ? 'is-invalid' : '' }}" type="text" name="garage" id="garage" value="{{ old('garage', $garageImmobile->garage) }}" required>
                @if($errors->has('garage'))
                    <span class="text-danger">{{ $errors->first('garage') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.garageImmobile.fields.garage_helper') }}</span>
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