<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Filiali;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFilialiRequest;
use App\Http\Requests\UpdateFilialiRequest;
use App\Http\Resources\Admin\FilialiResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FilialiApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('filiali_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FilialiResource(Filiali::with(['agenzia', 'comune'])->get());
    }

    public function store(StoreFilialiRequest $request)
    {
        $filiali = Filiali::create($request->all());

        return (new FilialiResource($filiali))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Filiali $filiali)
    {
        abort_if(Gate::denies('filiali_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FilialiResource($filiali->load(['agenzia', 'comune']));
    }

    public function update(UpdateFilialiRequest $request, Filiali $filiali)
    {
        $filiali->update($request->all());

        return (new FilialiResource($filiali))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Filiali $filiali)
    {
        abort_if(Gate::denies('filiali_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $filiali->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
