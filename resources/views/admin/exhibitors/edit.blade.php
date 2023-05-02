@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.exhibitor.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.exhibitors.update", [$exhibitor->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.exhibitor.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $exhibitor->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.exhibitor.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="country_id">{{ trans('cruds.exhibitor.fields.country') }}</label>
                <select class="form-control select2 {{ $errors->has('country') ? 'is-invalid' : '' }}" name="country_id" id="country_id">
                    @foreach($countries as $id => $entry)
                        <option value="{{ $id }}" {{ (old('country_id') ? old('country_id') : $exhibitor->country->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('country'))
                    <div class="invalid-feedback">
                        {{ $errors->first('country') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.exhibitor.fields.country_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="status">{{ trans('cruds.exhibitor.fields.status') }}</label>
                <input class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" type="number" name="status" id="status" value="{{ old('status', $exhibitor->status) }}" step="1">
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.exhibitor.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.exhibitor.fields.description') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{!! old('description', $exhibitor->description) !!}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.exhibitor.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="banner">{{ trans('cruds.exhibitor.fields.banner') }}</label>
                <textarea class="form-control {{ $errors->has('banner') ? 'is-invalid' : '' }}" name="banner" id="banner">{{ old('banner', $exhibitor->banner) }}</textarea>
                @if($errors->has('banner'))
                    <div class="invalid-feedback">
                        {{ $errors->first('banner') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.exhibitor.fields.banner_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="logo">{{ trans('cruds.exhibitor.fields.logo') }}</label>
                <textarea class="form-control {{ $errors->has('logo') ? 'is-invalid' : '' }}" name="logo" id="logo">{{ old('logo', $exhibitor->logo) }}</textarea>
                @if($errors->has('logo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('logo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.exhibitor.fields.logo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="website_url">{{ trans('cruds.exhibitor.fields.website_url') }}</label>
                <textarea class="form-control {{ $errors->has('website_url') ? 'is-invalid' : '' }}" name="website_url" id="website_url">{{ old('website_url', $exhibitor->website_url) }}</textarea>
                @if($errors->has('website_url'))
                    <div class="invalid-feedback">
                        {{ $errors->first('website_url') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.exhibitor.fields.website_url_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="twitter_url">{{ trans('cruds.exhibitor.fields.twitter_url') }}</label>
                <textarea class="form-control {{ $errors->has('twitter_url') ? 'is-invalid' : '' }}" name="twitter_url" id="twitter_url">{{ old('twitter_url', $exhibitor->twitter_url) }}</textarea>
                @if($errors->has('twitter_url'))
                    <div class="invalid-feedback">
                        {{ $errors->first('twitter_url') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.exhibitor.fields.twitter_url_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="linkedin_url">{{ trans('cruds.exhibitor.fields.linkedin_url') }}</label>
                <textarea class="form-control {{ $errors->has('linkedin_url') ? 'is-invalid' : '' }}" name="linkedin_url" id="linkedin_url">{{ old('linkedin_url', $exhibitor->linkedin_url) }}</textarea>
                @if($errors->has('linkedin_url'))
                    <div class="invalid-feedback">
                        {{ $errors->first('linkedin_url') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.exhibitor.fields.linkedin_url_helper') }}</span>
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
                xhr.open('POST', '{{ route('admin.exhibitors.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $exhibitor->id ?? 0 }}');
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