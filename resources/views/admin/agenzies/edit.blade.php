@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.agenzie.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.agenzies.update", [$agenzie->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
                            <label class="required" for="nome">{{ trans('cruds.agenzie.fields.nome') }}</label>
                            <input class="form-control" type="text" name="nome" id="nome" value="{{ old('nome', $agenzie->nome) }}" required>
                            @if($errors->has('nome'))
                                <span class="help-block" role="alert">{{ $errors->first('nome') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.agenzie.fields.nome_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('foto_logo') ? 'has-error' : '' }}">
                            <label for="foto_logo">{{ trans('cruds.agenzie.fields.foto_logo') }}</label>
                            <div class="needsclick dropzone" id="foto_logo-dropzone">
                            </div>
                            @if($errors->has('foto_logo'))
                                <span class="help-block" role="alert">{{ $errors->first('foto_logo') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.agenzie.fields.foto_logo_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('admin') ? 'has-error' : '' }}">
                            <label class="required" for="admin_id">{{ trans('cruds.agenzie.fields.admin') }}</label>
                            <select class="form-control select2" name="admin_id" id="admin_id" required>
                                @foreach($admins as $id => $admin)
                                    <option value="{{ $id }}" {{ ($agenzie->admin ? $agenzie->admin->id : old('admin_id')) == $id ? 'selected' : '' }}>{{ $admin }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('admin'))
                                <span class="help-block" role="alert">{{ $errors->first('admin') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.agenzie.fields.admin_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    Dropzone.options.fotoLogoDropzone = {
    url: '{{ route('admin.agenzies.storeMedia') }}',
    maxFilesize: 3, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 3,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="foto_logo"]').remove()
      $('form').append('<input type="hidden" name="foto_logo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="foto_logo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($agenzie) && $agenzie->foto_logo)
      var file = {!! json_encode($agenzie->foto_logo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, '{{ $agenzie->foto_logo->getUrl('thumb') }}')
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="foto_logo" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
@endsection