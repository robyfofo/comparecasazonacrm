<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\ContrattoImmobile;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContrattoImmobileRequest;
use App\Http\Requests\UpdateContrattoImmobileRequest;
use App\Http\Resources\Admin\ContrattoImmobileResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ContrattoImmobileApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('contratto_immobile_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ContrattoImmobileResource(ContrattoImmobile::all());
    }

    public function store(StoreContrattoImmobileRequest $request)
    {
        $contrattoImmobile = ContrattoImmobile::create($request->all());

        return (new ContrattoImmobileResource($contrattoImmobile))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ContrattoImmobile $contrattoImmobile)
    {
        abort_if(Gate::denies('contratto_immobile_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ContrattoImmobileResource($contrattoImmobile);
    }

    public function update(UpdateContrattoImmobileRequest $request, ContrattoImmobile $contrattoImmobile)
    {
        $contrattoImmobile->update($request->all());

        return (new ContrattoImmobileResource($contrattoImmobile))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ContrattoImmobile $contrattoImmobile)
    {
        abort_if(Gate::denies('contratto_immobile_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contrattoImmobile->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
