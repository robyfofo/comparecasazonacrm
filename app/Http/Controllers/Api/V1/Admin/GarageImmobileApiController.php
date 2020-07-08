<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\GarageImmobile;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGarageImmobileRequest;
use App\Http\Requests\UpdateGarageImmobileRequest;
use App\Http\Resources\Admin\GarageImmobileResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GarageImmobileApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('garage_immobile_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GarageImmobileResource(GarageImmobile::all());

    }

    public function store(StoreGarageImmobileRequest $request)
    {
        $garageImmobile = GarageImmobile::create($request->all());

        return (new GarageImmobileResource($garageImmobile))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);

    }

    public function show(GarageImmobile $garageImmobile)
    {
        abort_if(Gate::denies('garage_immobile_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GarageImmobileResource($garageImmobile);

    }

    public function update(UpdateGarageImmobileRequest $request, GarageImmobile $garageImmobile)
    {
        $garageImmobile->update($request->all());

        return (new GarageImmobileResource($garageImmobile))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);

    }

    public function destroy(GarageImmobile $garageImmobile)
    {
        abort_if(Gate::denies('garage_immobile_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $garageImmobile->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }
}
