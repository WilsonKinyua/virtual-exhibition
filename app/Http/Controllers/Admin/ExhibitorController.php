<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyExhibitorRequest;
use App\Http\Requests\StoreExhibitorRequest;
use App\Http\Requests\UpdateExhibitorRequest;
use App\Models\Country;
use App\Models\Exhibitor;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ExhibitorController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('exhibitor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $exhibitors = Exhibitor::with(['country', 'media'])->get();

        return view('admin.exhibitors.index', compact('exhibitors'));
    }

    public function create()
    {
        abort_if(Gate::denies('exhibitor_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $countries = Country::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.exhibitors.create', compact('countries'));
    }

    public function store(StoreExhibitorRequest $request)
    {
        $exhibitor = Exhibitor::create($request->all());

        if ($request->input('banner', false)) {
            $exhibitor->addMedia(storage_path('tmp/uploads/' . basename($request->input('banner'))))->toMediaCollection('banner');
        }

        if ($request->input('logo', false)) {
            $exhibitor->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $exhibitor->id]);
        }

        return redirect()->route('admin.exhibitors.index');
    }

    public function edit(Exhibitor $exhibitor)
    {
        abort_if(Gate::denies('exhibitor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $countries = Country::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $exhibitor->load('country');

        return view('admin.exhibitors.edit', compact('countries', 'exhibitor'));
    }

    public function update(UpdateExhibitorRequest $request, Exhibitor $exhibitor)
    {
        $exhibitor->update($request->all());

        if ($request->input('banner', false)) {
            if (! $exhibitor->banner || $request->input('banner') !== $exhibitor->banner->file_name) {
                if ($exhibitor->banner) {
                    $exhibitor->banner->delete();
                }
                $exhibitor->addMedia(storage_path('tmp/uploads/' . basename($request->input('banner'))))->toMediaCollection('banner');
            }
        } elseif ($exhibitor->banner) {
            $exhibitor->banner->delete();
        }

        if ($request->input('logo', false)) {
            if (! $exhibitor->logo || $request->input('logo') !== $exhibitor->logo->file_name) {
                if ($exhibitor->logo) {
                    $exhibitor->logo->delete();
                }
                $exhibitor->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
            }
        } elseif ($exhibitor->logo) {
            $exhibitor->logo->delete();
        }

        return redirect()->route('admin.exhibitors.index');
    }

    public function show(Exhibitor $exhibitor)
    {
        abort_if(Gate::denies('exhibitor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $exhibitor->load('country');

        return view('admin.exhibitors.show', compact('exhibitor'));
    }

    public function destroy(Exhibitor $exhibitor)
    {
        abort_if(Gate::denies('exhibitor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $exhibitor->delete();

        return back();
    }

    public function massDestroy(MassDestroyExhibitorRequest $request)
    {
        $exhibitors = Exhibitor::find(request('ids'));

        foreach ($exhibitors as $exhibitor) {
            $exhibitor->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('exhibitor_create') && Gate::denies('exhibitor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Exhibitor();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
