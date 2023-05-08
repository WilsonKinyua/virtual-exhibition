<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyExhibitorDocumentRequest;
use App\Http\Requests\StoreExhibitorDocumentRequest;
use App\Http\Requests\UpdateExhibitorDocumentRequest;
use App\Models\Exhibitor;
use App\Models\ExhibitorDocument;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ExhibitorDocumentController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('exhibitor_document_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $exhibitorDocuments = ExhibitorDocument::with(['exhibitor', 'media'])->get();

        return view('admin.exhibitorDocuments.index', compact('exhibitorDocuments'));
    }

    public function create()
    {
        abort_if(Gate::denies('exhibitor_document_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $exhibitors = Exhibitor::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.exhibitorDocuments.create', compact('exhibitors'));
    }

    public function store(StoreExhibitorDocumentRequest $request)
    {
        $exhibitorDocument = ExhibitorDocument::create($request->all());

        if ($request->input('document', false)) {
            $exhibitorDocument->addMedia(storage_path('tmp/uploads/' . basename($request->input('document'))))->toMediaCollection('document');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $exhibitorDocument->id]);
        }

        return redirect()->back()->with('message', 'Document added successfully');
    }

    public function edit(ExhibitorDocument $exhibitorDocument)
    {
        abort_if(Gate::denies('exhibitor_document_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $exhibitors = Exhibitor::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $exhibitorDocument->load('exhibitor');

        return view('admin.exhibitorDocuments.edit', compact('exhibitorDocument', 'exhibitors'));
    }

    public function update(UpdateExhibitorDocumentRequest $request, ExhibitorDocument $exhibitorDocument)
    {
        $exhibitorDocument->update($request->all());

        if ($request->input('document', false)) {
            if (!$exhibitorDocument->document || $request->input('document') !== $exhibitorDocument->document->file_name) {
                if ($exhibitorDocument->document) {
                    $exhibitorDocument->document->delete();
                }
                $exhibitorDocument->addMedia(storage_path('tmp/uploads/' . basename($request->input('document'))))->toMediaCollection('document');
            }
        } elseif ($exhibitorDocument->document) {
            $exhibitorDocument->document->delete();
        }

        return redirect()->route('admin.exhibitor-documents.index');
    }

    public function show(ExhibitorDocument $exhibitorDocument)
    {
        abort_if(Gate::denies('exhibitor_document_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $exhibitorDocument->load('exhibitor');

        return view('admin.exhibitorDocuments.show', compact('exhibitorDocument'));
    }

    public function destroy(ExhibitorDocument $exhibitorDocument)
    {
        abort_if(Gate::denies('exhibitor_document_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $exhibitorDocument->delete();

        return back();
    }

    public function massDestroy(MassDestroyExhibitorDocumentRequest $request)
    {
        $exhibitorDocuments = ExhibitorDocument::find(request('ids'));

        foreach ($exhibitorDocuments as $exhibitorDocument) {
            $exhibitorDocument->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('exhibitor_document_create') && Gate::denies('exhibitor_document_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new ExhibitorDocument();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
