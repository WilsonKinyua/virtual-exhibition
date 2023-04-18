<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyExhibitorDocumentRequest;
use App\Http\Requests\StoreExhibitorDocumentRequest;
use App\Http\Requests\UpdateExhibitorDocumentRequest;
use App\Models\Exhibitor;
use App\Models\ExhibitorDocument;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ExhibitorDocumentController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('exhibitor_document_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $exhibitorDocuments = ExhibitorDocument::with(['exhibitor'])->get();

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

        return redirect()->route('admin.exhibitor-documents.index');
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
}
