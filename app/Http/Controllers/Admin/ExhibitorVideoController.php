<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyExhibitorVideoRequest;
use App\Http\Requests\StoreExhibitorVideoRequest;
use App\Http\Requests\UpdateExhibitorVideoRequest;
use App\Models\Exhibitor;
use App\Models\ExhibitorVideo;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ExhibitorVideoController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('exhibitor_video_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $exhibitorVideos = ExhibitorVideo::with(['exhibitor', 'media'])->get();

        return view('admin.exhibitorVideos.index', compact('exhibitorVideos'));
    }

    public function create()
    {
        abort_if(Gate::denies('exhibitor_video_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $exhibitors = Exhibitor::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.exhibitorVideos.create', compact('exhibitors'));
    }

    public function store(StoreExhibitorVideoRequest $request)
    {
        $exhibitorVideo = ExhibitorVideo::create($request->all());

        if ($request->input('video', false)) {
            $exhibitorVideo->addMedia(storage_path('tmp/uploads/' . basename($request->input('video'))))->toMediaCollection('video');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $exhibitorVideo->id]);
        }

        return redirect()->back()->with('message', 'Video Created Successfully');
    }

    public function edit(ExhibitorVideo $exhibitorVideo)
    {
        abort_if(Gate::denies('exhibitor_video_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $exhibitors = Exhibitor::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $exhibitorVideo->load('exhibitor');

        return view('admin.exhibitorVideos.edit', compact('exhibitorVideo', 'exhibitors'));
    }

    public function update(UpdateExhibitorVideoRequest $request, ExhibitorVideo $exhibitorVideo)
    {
        $exhibitorVideo->update($request->all());

        if ($request->input('video', false)) {
            if (!$exhibitorVideo->video || $request->input('video') !== $exhibitorVideo->video->file_name) {
                if ($exhibitorVideo->video) {
                    $exhibitorVideo->video->delete();
                }
                $exhibitorVideo->addMedia(storage_path('tmp/uploads/' . basename($request->input('video'))))->toMediaCollection('video');
            }
        } elseif ($exhibitorVideo->video) {
            $exhibitorVideo->video->delete();
        }

        return redirect()->route('admin.exhibitor-videos.index');
    }

    public function show(ExhibitorVideo $exhibitorVideo)
    {
        abort_if(Gate::denies('exhibitor_video_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $exhibitorVideo->load('exhibitor');

        return view('admin.exhibitorVideos.show', compact('exhibitorVideo'));
    }

    public function destroy(ExhibitorVideo $exhibitorVideo)
    {
        abort_if(Gate::denies('exhibitor_video_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $exhibitorVideo->delete();

        return back();
    }

    public function massDestroy(MassDestroyExhibitorVideoRequest $request)
    {
        $exhibitorVideos = ExhibitorVideo::find(request('ids'));

        foreach ($exhibitorVideos as $exhibitorVideo) {
            $exhibitorVideo->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('exhibitor_video_create') && Gate::denies('exhibitor_video_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new ExhibitorVideo();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
