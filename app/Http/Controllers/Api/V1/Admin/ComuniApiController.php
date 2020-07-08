<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Comuni;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreComuniRequest;
use App\Http\Requests\UpdateComuniRequest;
use App\Http\Resources\Admin\ComuniResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ComuniApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('comuni_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ComuniResource(Comuni::with(['prov'])->get());
    }

    public function store(StoreComuniRequest $request)
    {
        $comuni = Comuni::create($request->all());

        return (new ComuniResource($comuni))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Comuni $comuni)
    {
        abort_if(Gate::denies('comuni_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ComuniResource($comuni->load(['prov']));
    }

    public function update(UpdateComuniRequest $request, Comuni $comuni)
    {
        $comuni->update($request->all());

        return (new ComuniResource($comuni))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Comuni $comuni)
    {
        abort_if(Gate::denies('comuni_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $comuni->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
