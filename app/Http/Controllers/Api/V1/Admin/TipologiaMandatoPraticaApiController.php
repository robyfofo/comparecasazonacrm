<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTipologiaMandatoPraticaRequest;
use App\Http\Requests\UpdateTipologiaMandatoPraticaRequest;
use App\Http\Resources\Admin\TipologiaMandatoPraticaResource;
use App\TipologiaMandatoPratica;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TipologiaMandatoPraticaApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('tipologia_mandato_pratica_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TipologiaMandatoPraticaResource(TipologiaMandatoPratica::all());
    }

    public function store(StoreTipologiaMandatoPraticaRequest $request)
    {
        $tipologiaMandatoPratica = TipologiaMandatoPratica::create($request->all());

        return (new TipologiaMandatoPraticaResource($tipologiaMandatoPratica))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(TipologiaMandatoPratica $tipologiaMandatoPratica)
    {
        abort_if(Gate::denies('tipologia_mandato_pratica_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TipologiaMandatoPraticaResource($tipologiaMandatoPratica);
    }

    public function update(UpdateTipologiaMandatoPraticaRequest $request, TipologiaMandatoPratica $tipologiaMandatoPratica)
    {
        $tipologiaMandatoPratica->update($request->all());

        return (new TipologiaMandatoPraticaResource($tipologiaMandatoPratica))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(TipologiaMandatoPratica $tipologiaMandatoPratica)
    {
        abort_if(Gate::denies('tipologia_mandato_pratica_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tipologiaMandatoPratica->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
