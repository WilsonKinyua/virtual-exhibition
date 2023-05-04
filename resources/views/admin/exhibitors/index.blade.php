@extends('layouts.admin')
@section('content')
    @can('exhibitor_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.exhibitors.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.exhibitor.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.exhibitor.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-Exhibitor">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.exhibitor.fields.name') }}
                            </th>
                            <th>
                                {{ trans('cruds.exhibitor.fields.country') }}
                            </th>
                            <th>
                                {{ trans('cruds.exhibitor.fields.status') }}
                            </th>
                            <th>
                                {{ trans('cruds.exhibitor.fields.banner') }}
                            </th>
                            <th>
                                {{ trans('cruds.exhibitor.fields.logo') }}
                            </th>
                            <th>
                                {{ trans('cruds.exhibitor.fields.website_url') }}
                            </th>
                            <th>
                                {{ trans('cruds.exhibitor.fields.twitter_url') }}
                            </th>
                            <th>
                                {{ trans('cruds.exhibitor.fields.linkedin_url') }}
                            </th>
                            <th>
                                {{ trans('cruds.exhibitor.fields.created_at') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($exhibitors as $key => $exhibitor)
                            <tr data-entry-id="{{ $exhibitor->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $exhibitor->name ?? '' }}
                                </td>
                                <td>
                                    {{ $exhibitor->country->name ?? '' }}
                                </td>
                                <td>
                                    @if ($exhibitor->status === 1)
                                        <span class="badge badge-info">Active</span>
                                    @else
                                        <span class="badge badge-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($exhibitor->banner)
                                        <a href="{{ $exhibitor->banner->getUrl() }}" target="_blank">
                                            {{ trans('global.view_file') }}
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    @if ($exhibitor->logo)
                                        <a href="{{ $exhibitor->logo->getUrl() }}" target="_blank"
                                            style="display: inline-block">
                                            <img src="{{ $exhibitor->logo->getUrl('thumb') }}">
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ $exhibitor->website_url ?? '' }}" target="_blank" rel="noopener noreferrer">View</a>
                                </td>
                                <td>
                                    <a href="{{ $exhibitor->twitter_url ?? '' }}" target="_blank" rel="noopener noreferrer">View</a>
                                </td>
                                <td>
                                    <a href="{{ $exhibitor->linkedin_url ?? '' }}" target="_blank" rel="noopener noreferrer">View</a>
                                </td>
                                <td>
                                    {{ $exhibitor->created_at->diffForHumans() ?? '' }}
                                </td>
                                <td>
                                    @can('exhibitor_show')
                                        <a class="btn btn-xs btn-primary"
                                            href="{{ route('admin.exhibitors.show', $exhibitor->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('exhibitor_edit')
                                        <a class="btn btn-xs btn-info"
                                            href="{{ route('admin.exhibitors.edit', $exhibitor->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('exhibitor_delete')
                                        <form action="{{ route('admin.exhibitors.destroy', $exhibitor->id) }}" method="POST"
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
@endsection
@section('scripts')
    @parent
    <script>
        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            @can('exhibitor_delete')
                let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
                let deleteButton = {
                    text: deleteButtonTrans,
                    url: "{{ route('admin.exhibitors.massDestroy') }}",
                    className: 'btn-danger',
                    action: function(e, dt, node, config) {
                        var ids = $.map(dt.rows({
                            selected: true
                        }).nodes(), function(entry) {
                            return $(entry).data('entry-id')
                        });

                        if (ids.length === 0) {
                            alert('{{ trans('global.datatables.zero_selected') }}')

                            return
                        }

                        if (confirm('{{ trans('global.areYouSure') }}')) {
                            $.ajax({
                                    headers: {
                                        'x-csrf-token': _token
                                    },
                                    method: 'POST',
                                    url: config.url,
                                    data: {
                                        ids: ids,
                                        _method: 'DELETE'
                                    }
                                })
                                .done(function() {
                                    location.reload()
                                })
                        }
                    }
                }
                dtButtons.push(deleteButton)
            @endcan

            $.extend(true, $.fn.dataTable.defaults, {
                orderCellsTop: true,
                order: [
                    [1, 'asc']
                ],
                pageLength: 100,
            });
            let table = $('.datatable-Exhibitor:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })
    </script>
@endsection
