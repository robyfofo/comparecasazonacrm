<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\ClientiTipologium;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClientiTipologiumRequest;
use App\Http\Requests\UpdateClientiTipologiumRequest;
use App\Http\Resources\Admin\ClientiTipologiumResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClientiTipologiaApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('clienti_tipologium_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ClientiTipologiumResource(ClientiTipologium::all());
    }

    public function store(StoreClientiTipologiumRequest $request)
    {
        $clientiTipologium = ClientiTipologium::create($request->all());

        return (new ClientiTipologiumResource($clientiTipologium))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ClientiTipologium $clientiTipologium)
    {
        abort_if(Gate::denies('clienti_tipologium_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ClientiTipologiumResource($clientiTipologium);
    }

    public function update(UpdateClientiTipologiumRequest $request, ClientiTipologium $clientiTipologium)
    {
        $clientiTipologium->update($request->all());

        return (new ClientiTipologiumResource($clientiTipologium))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ClientiTipologium $clientiTipologium)
    {
        abort_if(Gate::denies('clienti_tipologium_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clientiTipologium->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
