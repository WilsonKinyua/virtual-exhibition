@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.exhibitorVideo.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.exhibitor-videos.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="exhibitor_id">{{ trans('cruds.exhibitorVideo.fields.exhibitor') }}</label>
                <select class="form-control select2 {{ $errors->has('exhibitor') ? 'is-invalid' : '' }}" name="exhibitor_id" id="exhibitor_id" required>
                    @foreach($exhibitors as $id => $entry)
                        <option value="{{ $id }}" {{ old('exhibitor_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('exhibitor'))
                    <div class="invalid-feedback">
                        {{ $errors->first('exhibitor') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.exhibitorVideo.fields.exhibitor_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.exhibitorVideo.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.exhibitorVideo.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="video_url">{{ trans('cruds.exhibitorVideo.fields.video_url') }}</label>
                <textarea class="form-control {{ $errors->has('video_url') ? 'is-invalid' : '' }}" name="video_url" id="video_url" required>{{ old('video_url') }}</textarea>
                @if($errors->has('video_url'))
                    <div class="invalid-feedback">
                        {{ $errors->first('video_url') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.exhibitorVideo.fields.video_url_helper') }}</span>
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