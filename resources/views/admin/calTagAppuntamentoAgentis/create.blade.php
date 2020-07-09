@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.calTagAppuntamentoAgenti.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.cal-tag-appuntamento-agentis.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="label">{{ trans('cruds.calTagAppuntamentoAgenti.fields.label') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('label') ? 'is-invalid' : '' }}" name="label" id="label">{!! old('label') !!}</textarea>
                @if($errors->has('label'))
                    <span class="text-danger">{{ $errors->first('label') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.calTagAppuntamentoAgenti.fields.label_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="appuntamento_id">{{ trans('cruds.calTagAppuntamentoAgenti.fields.appuntamento') }}</label>
                <select class="form-control select2 {{ $errors->has('appuntamento') ? 'is-invalid' : '' }}" name="appuntamento_id" id="appuntamento_id" required>
                    @foreach($appuntamentos as $id => $appuntamento)
                        <option value="{{ $id }}" {{ old('appuntamento_id') == $id ? 'selected' : '' }}>{{ $appuntamento }}</option>
                    @endforeach
                </select>
                @if($errors->has('appuntamento'))
                    <span class="text-danger">{{ $errors->first('appuntamento') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.calTagAppuntamentoAgenti.fields.appuntamento_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="agente_id">{{ trans('cruds.calTagAppuntamentoAgenti.fields.agente') }}</label>
                <select class="form-control select2 {{ $errors->has('agente') ? 'is-invalid' : '' }}" name="agente_id" id="agente_id" required>
                    @foreach($agentes as $id => $agente)
                        <option value="{{ $id }}" {{ old('agente_id') == $id ? 'selected' : '' }}>{{ $agente }}</option>
                    @endforeach
                </select>
                @if($errors->has('agente'))
                    <span class="text-danger">{{ $errors->first('agente') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.calTagAppuntamentoAgenti.fields.agente_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="data_ora">{{ trans('cruds.calTagAppuntamentoAgenti.fields.data_ora') }}</label>
                <input class="form-control datetime {{ $errors->has('data_ora') ? 'is-invalid' : '' }}" type="text" name="data_ora" id="data_ora" value="{{ old('data_ora') }}" required>
                @if($errors->has('data_ora'))
                    <span class="text-danger">{{ $errors->first('data_ora') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.calTagAppuntamentoAgenti.fields.data_ora_helper') }}</span>
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

@section('scripts')
<script>
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '/admin/cal-tag-appuntamento-agentis/ckmedia', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', {{ $calTagAppuntamentoAgenti->id ?? 0 }});
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

@endsection