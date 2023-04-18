@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.chat.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.chats.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="chat_room_id">{{ trans('cruds.chat.fields.chat_room') }}</label>
                <select class="form-control select2 {{ $errors->has('chat_room') ? 'is-invalid' : '' }}" name="chat_room_id" id="chat_room_id" required>
                    @foreach($chat_rooms as $id => $entry)
                        <option value="{{ $id }}" {{ old('chat_room_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('chat_room'))
                    <div class="invalid-feedback">
                        {{ $errors->first('chat_room') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.chat.fields.chat_room_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="sender_id">{{ trans('cruds.chat.fields.sender') }}</label>
                <select class="form-control select2 {{ $errors->has('sender') ? 'is-invalid' : '' }}" name="sender_id" id="sender_id" required>
                    @foreach($senders as $id => $entry)
                        <option value="{{ $id }}" {{ old('sender_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('sender'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sender') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.chat.fields.sender_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="message">{{ trans('cruds.chat.fields.message') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('message') ? 'is-invalid' : '' }}" name="message" id="message">{!! old('message') !!}</textarea>
                @if($errors->has('message'))
                    <div class="invalid-feedback">
                        {{ $errors->first('message') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.chat.fields.message_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="message_type">{{ trans('cruds.chat.fields.message_type') }}</label>
                <input class="form-control {{ $errors->has('message_type') ? 'is-invalid' : '' }}" type="text" name="message_type" id="message_type" value="{{ old('message_type', 'text') }}" required>
                @if($errors->has('message_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('message_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.chat.fields.message_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="status">{{ trans('cruds.chat.fields.status') }}</label>
                <input class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" type="text" name="status" id="status" value="{{ old('status', 'sent') }}">
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.chat.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="attachment">{{ trans('cruds.chat.fields.attachment') }}</label>
                <textarea class="form-control {{ $errors->has('attachment') ? 'is-invalid' : '' }}" name="attachment" id="attachment">{{ old('attachment') }}</textarea>
                @if($errors->has('attachment'))
                    <div class="invalid-feedback">
                        {{ $errors->first('attachment') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.chat.fields.attachment_helper') }}</span>
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
                xhr.open('POST', '{{ route('admin.chats.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $chat->id ?? 0 }}');
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