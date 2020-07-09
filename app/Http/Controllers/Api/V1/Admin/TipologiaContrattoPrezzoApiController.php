<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTipologiaContrattoPrezzoRequest;
use App\Http\Requests\UpdateTipologiaContrattoPrezzoRequest;
use App\Http\Resources\Admin\TipologiaContrattoPrezzoResource;
use App\TipologiaContrattoPrezzo;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TipologiaContrattoPrezzoApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('tipologia_contratto_prezzo_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TipologiaContrattoPrezzoResource(TipologiaContrattoPrezzo::all());
    }

    public function store(StoreTipologiaContrattoPrezzoRequest $request)
    {
        $tipologiaContrattoPrezzo = TipologiaContrattoPrezzo::create($request->all());

        return (new TipologiaContrattoPrezzoResource($tipologiaContrattoPrezzo))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(TipologiaContrattoPrezzo $tipologiaContrattoPrezzo)
    {
        abort_if(Gate::denies('tipologia_contratto_prezzo_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TipologiaContrattoPrezzoResource($tipologiaContrattoPrezzo);
    }

    public function update(UpdateTipologiaContrattoPrezzoRequest $request, TipologiaContrattoPrezzo $tipologiaContrattoPrezzo)
    {
        $tipologiaContrattoPrezzo->update($request->all());

        return (new TipologiaContrattoPrezzoResource($tipologiaContrattoPrezzo))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(TipologiaContrattoPrezzo $tipologiaContrattoPrezzo)
    {
        abort_if(Gate::denies('tipologia_contratto_prezzo_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tipologiaContrattoPrezzo->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
