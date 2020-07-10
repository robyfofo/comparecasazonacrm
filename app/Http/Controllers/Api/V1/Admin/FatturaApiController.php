<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Fattura;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFatturaRequest;
use App\Http\Requests\UpdateFatturaRequest;
use App\Http\Resources\Admin\FatturaResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FatturaApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('fattura_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FatturaResource(Fattura::all());
    }

    public function store(StoreFatturaRequest $request)
    {
        $fattura = Fattura::create($request->all());

        return (new FatturaResource($fattura))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Fattura $fattura)
    {
        abort_if(Gate::denies('fattura_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FatturaResource($fattura);
    }

    public function update(UpdateFatturaRequest $request, Fattura $fattura)
    {
        $fattura->update($request->all());

        return (new FatturaResource($fattura))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Fattura $fattura)
    {
        abort_if(Gate::denies('fattura_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fattura->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
