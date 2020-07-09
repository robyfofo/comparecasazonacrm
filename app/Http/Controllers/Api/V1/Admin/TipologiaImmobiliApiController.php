<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTipologiaImmobiliRequest;
use App\Http\Requests\UpdateTipologiaImmobiliRequest;
use App\Http\Resources\Admin\TipologiaImmobiliResource;
use App\TipologiaImmobili;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TipologiaImmobiliApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('tipologia_immobili_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TipologiaImmobiliResource(TipologiaImmobili::all());
    }

    public function store(StoreTipologiaImmobiliRequest $request)
    {
        $tipologiaImmobili = TipologiaImmobili::create($request->all());

        return (new TipologiaImmobiliResource($tipologiaImmobili))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(TipologiaImmobili $tipologiaImmobili)
    {
        abort_if(Gate::denies('tipologia_immobili_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TipologiaImmobiliResource($tipologiaImmobili);
    }

    public function update(UpdateTipologiaImmobiliRequest $request, TipologiaImmobili $tipologiaImmobili)
    {
        $tipologiaImmobili->update($request->all());

        return (new TipologiaImmobiliResource($tipologiaImmobili))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(TipologiaImmobili $tipologiaImmobili)
    {
        abort_if(Gate::denies('tipologia_immobili_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tipologiaImmobili->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
