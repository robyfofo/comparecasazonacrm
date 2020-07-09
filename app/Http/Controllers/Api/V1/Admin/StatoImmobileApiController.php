<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStatoImmobileRequest;
use App\Http\Requests\UpdateStatoImmobileRequest;
use App\Http\Resources\Admin\StatoImmobileResource;
use App\StatoImmobile;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StatoImmobileApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('stato_immobile_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StatoImmobileResource(StatoImmobile::all());
    }

    public function store(StoreStatoImmobileRequest $request)
    {
        $statoImmobile = StatoImmobile::create($request->all());

        return (new StatoImmobileResource($statoImmobile))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(StatoImmobile $statoImmobile)
    {
        abort_if(Gate::denies('stato_immobile_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StatoImmobileResource($statoImmobile);
    }

    public function update(UpdateStatoImmobileRequest $request, StatoImmobile $statoImmobile)
    {
        $statoImmobile->update($request->all());

        return (new StatoImmobileResource($statoImmobile))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(StatoImmobile $statoImmobile)
    {
        abort_if(Gate::denies('stato_immobile_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $statoImmobile->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
