@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.chat.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.chats.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.chat.fields.id') }}
                        </th>
                        <td>
                            {{ $chat->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.chat.fields.chat_room') }}
                        </th>
                        <td>
                            {{ $chat->chat_room->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.chat.fields.sender') }}
                        </th>
                        <td>
                            {{ $chat->sender->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.chat.fields.message') }}
                        </th>
                        <td>
                            {!! $chat->message !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.chat.fields.message_type') }}
                        </th>
                        <td>
                            {{ $chat->message_type }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.chat.fields.status') }}
                        </th>
                        <td>
                            {{ $chat->status }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.chat.fields.attachment') }}
                        </th>
                        <td>
                            {{ $chat->attachment }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.chats.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection