@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} Profile Details
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.exhibitors.update', [$exhibitor->slug]) }}"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="required"
                                        for="name">{{ trans('cruds.exhibitor.fields.name') }}</label>
                                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                        type="text" name="name" id="name"
                                        value="{{ old('name', $exhibitor->name) }}" required>
                                    @if ($errors->has('name'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('name') }}
                                        </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.exhibitor.fields.name_helper') }}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="website_url">{{ trans('cruds.exhibitor.fields.website_url') }}</label>
                                    <input type="url"
                                        class="form-control {{ $errors->has('website_url') ? 'is-invalid' : '' }}"
                                        name="website_url" id="website_url"
                                        value="{{ old('website_url', $exhibitor->website_url) }}" />
                                    @if ($errors->has('website_url'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('website_url') }}
                                        </div>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.exhibitor.fields.website_url_helper') }}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="twitter_url">{{ trans('cruds.exhibitor.fields.twitter_url') }}</label>
                                    <input type="url"
                                        class="form-control {{ $errors->has('twitter_url') ? 'is-invalid' : '' }}"
                                        name="twitter_url" id="twitter_url"
                                        value="{{ old('twitter_url', $exhibitor->twitter_url) }}" />
                                    @if ($errors->has('twitter_url'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('twitter_url') }}
                                        </div>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.exhibitor.fields.twitter_url_helper') }}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="linkedin_url">{{ trans('cruds.exhibitor.fields.linkedin_url') }}</label>
                                    <input type="url"
                                        class="form-control {{ $errors->has('linkedin_url') ? 'is-invalid' : '' }}"
                                        value="{{ old('linkedin_url', $exhibitor->linkedin_url) }}" name="linkedin_url"
                                        id="linkedin_url" />
                                    @if ($errors->has('linkedin_url'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('linkedin_url') }}
                                        </div>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.exhibitor.fields.linkedin_url_helper') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description"
                                class="required">{{ trans('cruds.exhibitor.fields.description') }}</label>
                            <textarea class="form-control ckeditor {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description"
                                id="description">{!! old('description', $exhibitor->description) !!}</textarea>
                            @if ($errors->has('description'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('description') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.exhibitor.fields.description_helper') }}</span>
                        </div>

                        <div class="form-group">
                            <label class="required" for="logo">{{ trans('cruds.exhibitor.fields.logo') }}</label>
                            <div class="needsclick dropzone {{ $errors->has('logo') ? 'is-invalid' : '' }}"
                                id="logo-dropzone">
                            </div>
                            @if ($errors->has('logo'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('logo') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.exhibitor.fields.logo_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-info btn-lg" type="submit">
                                Update Profile
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-4">
                    <div class="card text-white bg-primary">
                        <div class="card-body pb-0">
                            <div class="text-value">{{ $chatRooms->count() }}</div>
                            <div>Chat Rooms</div>
                            <br />
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-warning">
                        <div class="card-body pb-0">
                            <div class="text-value">{{ $exhibitorVideos->count() }}</div>
                            <div>Videos</div>
                            <br />
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-info">
                        <div class="card-body pb-0">
                            <div class="text-value">{{ $exhibitorDocuments->count() }}</div>
                            <div>Documents</div>
                            <br />
                        </div>
                    </div>
                </div>
            </div>
            @can('chat_room_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <button class="btn btn-success float-right" data-toggle="modal" data-target="#exampleModal">
                            {{ trans('global.add') }} {{ trans('cruds.chatRoom.title_singular') }}
                        </button>
                    </div>
                </div>
                @include('modals.create-chat-room')
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.chatRoom.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-ChatRoom">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.chatRoom.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.chatRoom.fields.exhibitor') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.chatRoom.fields.status') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.chatRoom.fields.created_by') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.chatRoom.fields.created_at') }}
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($chatRooms as $key => $chatRoom)
                                    <tr data-entry-id="{{ $chatRoom->id }}">
                                        <td>
                                            {{ $chatRoom->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $chatRoom->exhibitor->name ?? '' }}
                                        </td>
                                        <td>
                                            @if ($chatRoom->status == 1)
                                                <span class="badge badge-success">Active</span>
                                            @else
                                                <span class="badge badge-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $chatRoom->created_by->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $chatRoom->created_at->diffForHumans() ?? '' }}
                                        </td>
                                        <td>
                                            @if ($chatRoom->status == 1)
                                                @can('chat_room_edit')
                                                    <a class="btn btn-xs btn-danger"
                                                        href="{{ route('chat-room.status', $exhibitor->slug) }}">
                                                        Disable
                                                    </a>
                                                @endcan
                                            @else
                                                -
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="6">No Chat Rooms Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @can('exhibitor_video_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success float-right" href="{{ route('exhibitor-video-create',$exhibitor->slug) }}">
                            {{ trans('global.add') }} Video
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    Videos
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-ExhibitorVideo">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.exhibitorVideo.fields.exhibitor') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.exhibitorVideo.fields.title') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.exhibitorVideo.fields.video') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.exhibitorVideo.fields.created_at') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($exhibitorVideos as $key => $exhibitorVideo)
                                    <tr data-entry-id="{{ $exhibitorVideo->id }}">
                                        <td>
                                            {{ $exhibitorVideo->exhibitor->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $exhibitorVideo->title ?? '' }}
                                        </td>
                                        <td>
                                            @if ($exhibitorVideo->video)
                                                <a href="{{ $exhibitorVideo->video->getUrl() }}" target="_blank">
                                                    {{ trans('global.view_file') }}
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $exhibitorVideo->created_at ?? '' }}
                                        </td>
                                        <td>

                                            @can('exhibitor_video_edit')
                                                <a class="btn btn-xs btn-info"
                                                    href="{{ route('admin.exhibitor-videos.edit', $exhibitorVideo->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('exhibitor_video_delete')
                                                <form
                                                    action="{{ route('admin.exhibitor-videos.destroy', $exhibitorVideo->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                                    style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger"
                                                        value="{{ trans('global.delete') }}">
                                                </form>
                                            @endcan

                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            @can('exhibitor_document_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success float-right" href="{{ route('admin.exhibitor-documents.create') }}">
                            {{ trans('global.add') }} Document
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    Documents
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table
                            class=" table table-bordered table-striped table-hover datatable datatable-ExhibitorDocument">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.exhibitorDocument.fields.exhibitor') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.exhibitorDocument.fields.title') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.exhibitorDocument.fields.document') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.exhibitorDocument.fields.created_at') }}
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($exhibitorDocuments as $key => $exhibitorDocument)
                                    <tr data-entry-id="{{ $exhibitorDocument->id }}">
                                        <td>
                                            {{ $exhibitorDocument->exhibitor->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $exhibitorDocument->title ?? '' }}
                                        </td>
                                        <td>
                                            @if ($exhibitorDocument->document)
                                                <a href="{{ $exhibitorDocument->document->getUrl() }}" target="_blank">
                                                    {{ trans('global.view_file') }}
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $exhibitorDocument->created_at ?? '' }}
                                        </td>
                                        <td>
                                            @can('exhibitor_document_edit')
                                                <a class="btn btn-xs btn-info"
                                                    href="{{ route('admin.exhibitor-documents.edit', $exhibitorDocument->id) }}">
                                                    Edit
                                                </a>
                                            @endcan
                                            @can('exhibitor_document_delete')
                                                <form
                                                    action="{{ route('admin.exhibitor-documents.destroy', $exhibitorDocument->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                                    style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger"
                                                        value="{{ trans('global.delete') }}">
                                                </form>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            function SimpleUploadAdapter(editor) {
                editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
                    return {
                        upload: function() {
                            return loader.file
                                .then(function(file) {
                                    return new Promise(function(resolve, reject) {
                                        // Init request
                                        var xhr = new XMLHttpRequest();
                                        xhr.open('POST',
                                            '{{ route('admin.exhibitors.storeCKEditorImages') }}',
                                            true);
                                        xhr.setRequestHeader('x-csrf-token', window._token);
                                        xhr.setRequestHeader('Accept', 'application/json');
                                        xhr.responseType = 'json';

                                        // Init listeners
                                        var genericErrorText =
                                            `Couldn't upload file: ${ file.name }.`;
                                        xhr.addEventListener('error', function() {
                                            reject(genericErrorText)
                                        });
                                        xhr.addEventListener('abort', function() {
                                            reject()
                                        });
                                        xhr.addEventListener('load', function() {
                                            var response = xhr.response;

                                            if (!response || xhr.status !== 201) {
                                                return reject(response && response
                                                    .message ?
                                                    `${genericErrorText}\n${xhr.status} ${response.message}` :
                                                    `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`
                                                );
                                            }

                                            $('form').append(
                                                '<input type="hidden" name="ck-media[]" value="' +
                                                response.id + '">');

                                            resolve({
                                                default: response.url
                                            });
                                        });

                                        if (xhr.upload) {
                                            xhr.upload.addEventListener('progress', function(
                                                e) {
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

    <script>
        Dropzone.options.bannerDropzone = {
            url: '{{ route('admin.exhibitors.storeMedia') }}',
            maxFilesize: 200, // MB
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 200
            },
            success: function(file, response) {
                $('form').find('input[name="banner"]').remove()
                $('form').append('<input type="hidden" name="banner" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="banner"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                @if (isset($exhibitor) && $exhibitor->banner)
                    var file = {!! json_encode($exhibitor->banner) !!}
                    this.options.addedfile.call(this, file)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="banner" value="' + file.file_name + '">')
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
    <script>
        Dropzone.options.logoDropzone = {
            url: '{{ route('admin.exhibitors.storeMedia') }}',
            maxFilesize: 200, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif',
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 200,
                width: 4096,
                height: 4096
            },
            success: function(file, response) {
                $('form').find('input[name="logo"]').remove()
                $('form').append('<input type="hidden" name="logo" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="logo"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                @if (isset($exhibitor) && $exhibitor->logo)
                    var file = {!! json_encode($exhibitor->logo) !!}
                    this.options.addedfile.call(this, file)
                    this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="logo" value="' + file.file_name + '">')
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
