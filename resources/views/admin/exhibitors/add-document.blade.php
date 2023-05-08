@extends('layouts.admin')
@section('content')
    <a href="{{ route('exhibitor-account-edit', $exhibitor->slug) }}" class="btn btn-default bg-dark mb-3 text-white"><i
            class="fa fa-arrow-left"></i> Go Back</a>
    <div class="card">
        <div class="card-header">
            Add Document
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.exhibitor-documents.store') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="exhibitor_id" value="{{ $exhibitor->id }}">
                <div class="form-group">
                    <label class="required" for="title">{{ trans('cruds.exhibitorDocument.fields.title') }}</label>
                    <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text"
                        name="title" id="title" value="{{ old('title', '') }}" required>
                    @if ($errors->has('title'))
                        <div class="invalid-feedback">
                            {{ $errors->first('title') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.exhibitorDocument.fields.title_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="document">{{ trans('cruds.exhibitorDocument.fields.document') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('document') ? 'is-invalid' : '' }}"
                        id="document-dropzone">
                    </div>
                    @if ($errors->has('document'))
                        <div class="invalid-feedback">
                            {{ $errors->first('document') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.exhibitorDocument.fields.document_helper') }}</span>
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
        Dropzone.options.documentDropzone = {
            url: '{{ route('admin.exhibitor-documents.storeMedia') }}',
            maxFilesize: 200, // MB
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            acceptedFiles: '.pdf',
            success: function(file, response) {
                $('form').find('input[name="document"]').remove()
                $('form').append('<input type="hidden" name="document" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="document"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                @if (isset($exhibitorDocument) && $exhibitorDocument->document)
                    var file = {!! json_encode($exhibitorDocument->document) !!}
                    this.options.addedfile.call(this, file)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="document" value="' + file.file_name + '">')
                    this.options.maxFiles = this.options.maxFiles - 1
                @endif
            },
            error: function(file, response) {
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
