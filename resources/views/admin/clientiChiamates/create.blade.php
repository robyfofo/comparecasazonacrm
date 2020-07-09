@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.clientiChiamate.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.clienti-chiamates.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="data_ora">{{ trans('cruds.clientiChiamate.fields.data_ora') }}</label>
                <input class="form-control datetime {{ $errors->has('data_ora') ? 'is-invalid' : '' }}" type="text" name="data_ora" id="data_ora" value="{{ old('data_ora') }}" required>
                @if($errors->has('data_ora'))
                    <span class="text-danger">{{ $errors->first('data_ora') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.clientiChiamate.fields.data_ora_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="filiale_id">{{ trans('cruds.clientiChiamate.fields.filiale') }}</label>
                <select class="form-control select2 {{ $errors->has('filiale') ? 'is-invalid' : '' }}" name="filiale_id" id="filiale_id">
                    @foreach($filiales as $id => $filiale)
                        <option value="{{ $id }}" {{ old('filiale_id') == $id ? 'selected' : '' }}>{{ $filiale }}</option>
                    @endforeach
                </select>
                @if($errors->has('filiale'))
                    <span class="text-danger">{{ $errors->first('filiale') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.clientiChiamate.fields.filiale_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="agente_id">{{ trans('cruds.clientiChiamate.fields.agente') }}</label>
                <select class="form-control select2 {{ $errors->has('agente') ? 'is-invalid' : '' }}" name="agente_id" id="agente_id" required>
                    @foreach($agentes as $id => $agente)
                        <option value="{{ $id }}" {{ old('agente_id') == $id ? 'selected' : '' }}>{{ $agente }}</option>
                    @endforeach
                </select>
                @if($errors->has('agente'))
                    <span class="text-danger">{{ $errors->first('agente') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.clientiChiamate.fields.agente_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cliente_id">{{ trans('cruds.clientiChiamate.fields.cliente') }}</label>
                <select class="form-control select2 {{ $errors->has('cliente') ? 'is-invalid' : '' }}" name="cliente_id" id="cliente_id">
                    @foreach($clientes as $id => $cliente)
                        <option value="{{ $id }}" {{ old('cliente_id') == $id ? 'selected' : '' }}>{{ $cliente }}</option>
                    @endforeach
                </select>
                @if($errors->has('cliente'))
                    <span class="text-danger">{{ $errors->first('cliente') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.clientiChiamate.fields.cliente_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pratica_id">{{ trans('cruds.clientiChiamate.fields.pratica') }}</label>
                <select class="form-control select2 {{ $errors->has('pratica') ? 'is-invalid' : '' }}" name="pratica_id" id="pratica_id">
                    @foreach($praticas as $id => $pratica)
                        <option value="{{ $id }}" {{ old('pratica_id') == $id ? 'selected' : '' }}>{{ $pratica }}</option>
                    @endforeach
                </select>
                @if($errors->has('pratica'))
                    <span class="text-danger">{{ $errors->first('pratica') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.clientiChiamate.fields.pratica_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="richiesta_id">{{ trans('cruds.clientiChiamate.fields.richiesta') }}</label>
                <select class="form-control select2 {{ $errors->has('richiesta') ? 'is-invalid' : '' }}" name="richiesta_id" id="richiesta_id">
                    @foreach($richiestas as $id => $richiesta)
                        <option value="{{ $id }}" {{ old('richiesta_id') == $id ? 'selected' : '' }}>{{ $richiesta }}</option>
                    @endforeach
                </select>
                @if($errors->has('richiesta'))
                    <span class="text-danger">{{ $errors->first('richiesta') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.clientiChiamate.fields.richiesta_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="testo">{{ trans('cruds.clientiChiamate.fields.testo') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('testo') ? 'is-invalid' : '' }}" name="testo" id="testo">{!! old('testo') !!}</textarea>
                @if($errors->has('testo'))
                    <span class="text-danger">{{ $errors->first('testo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.clientiChiamate.fields.testo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="stato">{{ trans('cruds.clientiChiamate.fields.stato') }}</label>
                <input class="form-control {{ $errors->has('stato') ? 'is-invalid' : '' }}" type="number" name="stato" id="stato" value="{{ old('stato', '0') }}" step="1">
                @if($errors->has('stato'))
                    <span class="text-danger">{{ $errors->first('stato') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.clientiChiamate.fields.stato_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.clientiChiamate.fields.direzione') }}</label>
                <select class="form-control {{ $errors->has('direzione') ? 'is-invalid' : '' }}" name="direzione" id="direzione" required>
                    <option value disabled {{ old('direzione', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\ClientiChiamate::DIREZIONE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('direzione', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('direzione'))
                    <span class="text-danger">{{ $errors->first('direzione') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.clientiChiamate.fields.direzione_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nome">{{ trans('cruds.clientiChiamate.fields.nome') }}</label>
                <input class="form-control {{ $errors->has('nome') ? 'is-invalid' : '' }}" type="text" name="nome" id="nome" value="{{ old('nome', '') }}">
                @if($errors->has('nome'))
                    <span class="text-danger">{{ $errors->first('nome') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.clientiChiamate.fields.nome_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cognome">{{ trans('cruds.clientiChiamate.fields.cognome') }}</label>
                <input class="form-control {{ $errors->has('cognome') ? 'is-invalid' : '' }}" type="text" name="cognome" id="cognome" value="{{ old('cognome', '') }}">
                @if($errors->has('cognome'))
                    <span class="text-danger">{{ $errors->first('cognome') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.clientiChiamate.fields.cognome_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="telefono">{{ trans('cruds.clientiChiamate.fields.telefono') }}</label>
                <input class="form-control {{ $errors->has('telefono') ? 'is-invalid' : '' }}" type="text" name="telefono" id="telefono" value="{{ old('telefono', '') }}">
                @if($errors->has('telefono'))
                    <span class="text-danger">{{ $errors->first('telefono') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.clientiChiamate.fields.telefono_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cellulare">{{ trans('cruds.clientiChiamate.fields.cellulare') }}</label>
                <input class="form-control {{ $errors->has('cellulare') ? 'is-invalid' : '' }}" type="text" name="cellulare" id="cellulare" value="{{ old('cellulare', '') }}">
                @if($errors->has('cellulare'))
                    <span class="text-danger">{{ $errors->first('cellulare') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.clientiChiamate.fields.cellulare_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email">{{ trans('cruds.clientiChiamate.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ old('email', '') }}">
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.clientiChiamate.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="alert_id">{{ trans('cruds.clientiChiamate.fields.alert') }}</label>
                <select class="form-control select2 {{ $errors->has('alert') ? 'is-invalid' : '' }}" name="alert_id" id="alert_id">
                    @foreach($alerts as $id => $alert)
                        <option value="{{ $id }}" {{ old('alert_id') == $id ? 'selected' : '' }}>{{ $alert }}</option>
                    @endforeach
                </select>
                @if($errors->has('alert'))
                    <span class="text-danger">{{ $errors->first('alert') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.clientiChiamate.fields.alert_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="data_risposta">{{ trans('cruds.clientiChiamate.fields.data_risposta') }}</label>
                <input class="form-control date {{ $errors->has('data_risposta') ? 'is-invalid' : '' }}" type="text" name="data_risposta" id="data_risposta" value="{{ old('data_risposta') }}">
                @if($errors->has('data_risposta'))
                    <span class="text-danger">{{ $errors->first('data_risposta') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.clientiChiamate.fields.data_risposta_helper') }}</span>
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
                xhr.open('POST', '/admin/clienti-chiamates/ckmedia', true);
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
                data.append('crud_id', {{ $clientiChiamate->id ?? 0 }});
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