<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\ConsegnaImmobili;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreConsegnaImmobiliRequest;
use App\Http\Requests\UpdateConsegnaImmobiliRequest;
use App\Http\Resources\Admin\ConsegnaImmobiliResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ConsegnaImmobiliApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('consegna_immobili_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ConsegnaImmobiliResource(ConsegnaImmobili::all());
    }

    public function store(StoreConsegnaImmobiliRequest $request)
    {
        $consegnaImmobili = ConsegnaImmobili::create($request->all());

        return (new ConsegnaImmobiliResource($consegnaImmobili))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ConsegnaImmobili $consegnaImmobili)
    {
        abort_if(Gate::denies('consegna_immobili_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ConsegnaImmobiliResource($consegnaImmobili);
    }

    public function update(UpdateConsegnaImmobiliRequest $request, ConsegnaImmobili $consegnaImmobili)
    {
        $consegnaImmobili->update($request->all());

        return (new ConsegnaImmobiliResource($consegnaImmobili))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ConsegnaImmobili $consegnaImmobili)
    {
        abort_if(Gate::denies('consegna_immobili_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $consegnaImmobili->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
