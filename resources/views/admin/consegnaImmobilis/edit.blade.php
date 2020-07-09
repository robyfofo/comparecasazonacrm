@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.consegnaImmobili.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.consegna-immobilis.update", [$consegnaImmobili->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="consegna">{{ trans('cruds.consegnaImmobili.fields.consegna') }}</label>
                <input class="form-control {{ $errors->has('consegna') ? 'is-invalid' : '' }}" type="text" name="consegna" id="consegna" value="{{ old('consegna', $consegnaImmobili->consegna) }}">
                @if($errors->has('consegna'))
                    <span class="text-danger">{{ $errors->first('consegna') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.consegnaImmobili.fields.consegna_helper') }}</span>
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