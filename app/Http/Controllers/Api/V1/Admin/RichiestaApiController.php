<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRichiestumRequest;
use App\Http\Requests\UpdateRichiestumRequest;
use App\Http\Resources\Admin\RichiestumResource;
use App\Richiestum;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RichiestaApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('richiestum_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RichiestumResource(Richiestum::with(['agente', 'agenzia', 'cliente', 'contratto', 'provincia', 'comune', 'garage', 'tipologia_immobile', 'tipologia_immobile_2', 'tipologia_immobile_3', 'tipologia_immobile_4', 'comune_2', 'comune_3', 'comune_4', 'comune_5', 'comune_6'])->get());
    }

    public function store(StoreRichiestumRequest $request)
    {
        $richiestum = Richiestum::create($request->all());

        return (new RichiestumResource($richiestum))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Richiestum $richiestum)
    {
        abort_if(Gate::denies('richiestum_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RichiestumResource($richiestum->load(['agente', 'agenzia', 'cliente', 'contratto', 'provincia', 'comune', 'garage', 'tipologia_immobile', 'tipologia_immobile_2', 'tipologia_immobile_3', 'tipologia_immobile_4', 'comune_2', 'comune_3', 'comune_4', 'comune_5', 'comune_6']));
    }

    public function update(UpdateRichiestumRequest $request, Richiestum $richiestum)
    {
        $richiestum->update($request->all());

        return (new RichiestumResource($richiestum))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Richiestum $richiestum)
    {
        abort_if(Gate::denies('richiestum_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $richiestum->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
