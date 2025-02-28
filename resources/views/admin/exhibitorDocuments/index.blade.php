@extends('layouts.admin')
@section('content')
@can('exhibitor_document_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.exhibitor-documents.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.exhibitorDocument.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.exhibitorDocument.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-ExhibitorDocument">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
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
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($exhibitorDocuments as $key => $exhibitorDocument)
                        <tr data-entry-id="{{ $exhibitorDocument->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $exhibitorDocument->exhibitor->name ?? '' }}
                            </td>
                            <td>
                                {{ $exhibitorDocument->title ?? '' }}
                            </td>
                            <td>
                                @if($exhibitorDocument->document)
                                    <a href="{{ $exhibitorDocument->document->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $exhibitorDocument->created_at ?? '' }}
                            </td>
                            <td>
                                @can('exhibitor_document_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.exhibitor-documents.show', $exhibitorDocument->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('exhibitor_document_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.exhibitor-documents.edit', $exhibitorDocument->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('exhibitor_document_delete')
                                    <form action="{{ route('admin.exhibitor-documents.destroy', $exhibitorDocument->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
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
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('exhibitor_document_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.exhibitor-documents.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 2, 'asc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-ExhibitorDocument:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection