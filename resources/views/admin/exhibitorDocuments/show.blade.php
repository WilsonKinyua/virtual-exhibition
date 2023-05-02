@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.exhibitorDocument.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.exhibitor-documents.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.exhibitorDocument.fields.id') }}
                        </th>
                        <td>
                            {{ $exhibitorDocument->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.exhibitorDocument.fields.exhibitor') }}
                        </th>
                        <td>
                            {{ $exhibitorDocument->exhibitor->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.exhibitorDocument.fields.title') }}
                        </th>
                        <td>
                            {{ $exhibitorDocument->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.exhibitorDocument.fields.document') }}
                        </th>
                        <td>
                            @if($exhibitorDocument->document)
                                <a href="{{ $exhibitorDocument->document->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.exhibitor-documents.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection