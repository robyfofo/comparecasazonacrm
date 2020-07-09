<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\ClientiChiamate;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreClientiChiamateRequest;
use App\Http\Requests\UpdateClientiChiamateRequest;
use App\Http\Resources\Admin\ClientiChiamateResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClientiChiamateApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('clienti_chiamate_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ClientiChiamateResource(ClientiChiamate::with(['filiale', 'agente', 'cliente', 'pratica', 'richiesta', 'alert'])->get());
    }

    public function store(StoreClientiChiamateRequest $request)
    {
        $clientiChiamate = ClientiChiamate::create($request->all());

        return (new ClientiChiamateResource($clientiChiamate))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ClientiChiamate $clientiChiamate)
    {
        abort_if(Gate::denies('clienti_chiamate_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ClientiChiamateResource($clientiChiamate->load(['filiale', 'agente', 'cliente', 'pratica', 'richiesta', 'alert']));
    }

    public function update(UpdateClientiChiamateRequest $request, ClientiChiamate $clientiChiamate)
    {
        $clientiChiamate->update($request->all());

        return (new ClientiChiamateResource($clientiChiamate))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ClientiChiamate $clientiChiamate)
    {
        abort_if(Gate::denies('clienti_chiamate_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clientiChiamate->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
