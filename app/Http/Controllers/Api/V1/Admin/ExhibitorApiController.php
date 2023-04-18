<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreExhibitorRequest;
use App\Http\Requests\UpdateExhibitorRequest;
use App\Http\Resources\Admin\ExhibitorResource;
use App\Models\Exhibitor;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ExhibitorApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('exhibitor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ExhibitorResource(Exhibitor::with(['company', 'country'])->get());
    }

    public function store(StoreExhibitorRequest $request)
    {
        $exhibitor = Exhibitor::create($request->all());

        return (new ExhibitorResource($exhibitor))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Exhibitor $exhibitor)
    {
        abort_if(Gate::denies('exhibitor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ExhibitorResource($exhibitor->load(['company', 'country']));
    }

    public function update(UpdateExhibitorRequest $request, Exhibitor $exhibitor)
    {
        $exhibitor->update($request->all());

        return (new ExhibitorResource($exhibitor))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Exhibitor $exhibitor)
    {
        abort_if(Gate::denies('exhibitor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $exhibitor->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
