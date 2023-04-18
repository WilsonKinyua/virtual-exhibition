<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyExhibitorVideoRequest;
use App\Http\Requests\StoreExhibitorVideoRequest;
use App\Http\Requests\UpdateExhibitorVideoRequest;
use App\Models\Exhibitor;
use App\Models\ExhibitorVideo;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ExhibitorVideoController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('exhibitor_video_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $exhibitorVideos = ExhibitorVideo::with(['exhibitor'])->get();

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

        return redirect()->route('admin.exhibitor-videos.index');
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
}
