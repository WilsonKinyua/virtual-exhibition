@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.chatRoom.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.chat-rooms.update", [$chatRoom->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.chatRoom.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $chatRoom->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.chatRoom.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="exhibitor_id">{{ trans('cruds.chatRoom.fields.exhibitor') }}</label>
                <select class="form-control select2 {{ $errors->has('exhibitor') ? 'is-invalid' : '' }}" name="exhibitor_id" id="exhibitor_id" required>
                    @foreach($exhibitors as $id => $entry)
                        <option value="{{ $id }}" {{ (old('exhibitor_id') ? old('exhibitor_id') : $chatRoom->exhibitor->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('exhibitor'))
                    <div class="invalid-feedback">
                        {{ $errors->first('exhibitor') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.chatRoom.fields.exhibitor_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="created_by_id">{{ trans('cruds.chatRoom.fields.created_by') }}</label>
                <select class="form-control select2 {{ $errors->has('created_by') ? 'is-invalid' : '' }}" name="created_by_id" id="created_by_id" required>
                    @foreach($created_bies as $id => $entry)
                        <option value="{{ $id }}" {{ (old('created_by_id') ? old('created_by_id') : $chatRoom->created_by->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('created_by'))
                    <div class="invalid-feedback">
                        {{ $errors->first('created_by') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.chatRoom.fields.created_by_helper') }}</span>
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