@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.exhibitor.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.exhibitors.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.exhibitor.fields.id') }}
                        </th>
                        <td>
                            {{ $exhibitor->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.exhibitor.fields.name') }}
                        </th>
                        <td>
                            {{ $exhibitor->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.exhibitor.fields.country') }}
                        </th>
                        <td>
                            {{ $exhibitor->country->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.exhibitor.fields.status') }}
                        </th>
                        <td>
                            {{ $exhibitor->status }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.exhibitor.fields.description') }}
                        </th>
                        <td>
                            {!! $exhibitor->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.exhibitor.fields.banner') }}
                        </th>
                        <td>
                            @if($exhibitor->banner)
                                <a href="{{ $exhibitor->banner->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.exhibitor.fields.logo') }}
                        </th>
                        <td>
                            @if($exhibitor->logo)
                                <a href="{{ $exhibitor->logo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $exhibitor->logo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.exhibitor.fields.website_url') }}
                        </th>
                        <td>
                            {{ $exhibitor->website_url }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.exhibitor.fields.twitter_url') }}
                        </th>
                        <td>
                            {{ $exhibitor->twitter_url }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.exhibitor.fields.linkedin_url') }}
                        </th>
                        <td>
                            {{ $exhibitor->linkedin_url }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.exhibitor.fields.admins') }}
                        </th>
                        <td>
                            @foreach($exhibitor->admins as $key => $admins)
                                <span class="label label-info">{{ $admins->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.exhibitors.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection