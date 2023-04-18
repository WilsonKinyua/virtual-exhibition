@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.chatRoom.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.chat-rooms.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.chatRoom.fields.id') }}
                        </th>
                        <td>
                            {{ $chatRoom->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.chatRoom.fields.name') }}
                        </th>
                        <td>
                            {{ $chatRoom->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.chatRoom.fields.exhibitor') }}
                        </th>
                        <td>
                            {{ $chatRoom->exhibitor->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.chatRoom.fields.status') }}
                        </th>
                        <td>
                            {{ $chatRoom->status }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.chatRoom.fields.created_by') }}
                        </th>
                        <td>
                            {{ $chatRoom->created_by->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.chat-rooms.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection