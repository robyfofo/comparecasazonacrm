<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\CalTagAppuntamentoAgenti;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreCalTagAppuntamentoAgentiRequest;
use App\Http\Requests\UpdateCalTagAppuntamentoAgentiRequest;
use App\Http\Resources\Admin\CalTagAppuntamentoAgentiResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CalTagAppuntamentoAgentiApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('cal_tag_appuntamento_agenti_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CalTagAppuntamentoAgentiResource(CalTagAppuntamentoAgenti::with(['appuntamento', 'agente'])->get());

    }

    public function store(StoreCalTagAppuntamentoAgentiRequest $request)
    {
        $calTagAppuntamentoAgenti = CalTagAppuntamentoAgenti::create($request->all());

        return (new CalTagAppuntamentoAgentiResource($calTagAppuntamentoAgenti))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);

    }

    public function show(CalTagAppuntamentoAgenti $calTagAppuntamentoAgenti)
    {
        abort_if(Gate::denies('cal_tag_appuntamento_agenti_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CalTagAppuntamentoAgentiResource($calTagAppuntamentoAgenti->load(['appuntamento', 'agente']));

    }

    public function update(UpdateCalTagAppuntamentoAgentiRequest $request, CalTagAppuntamentoAgenti $calTagAppuntamentoAgenti)
    {
        $calTagAppuntamentoAgenti->update($request->all());

        return (new CalTagAppuntamentoAgentiResource($calTagAppuntamentoAgenti))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);

    }

    public function destroy(CalTagAppuntamentoAgenti $calTagAppuntamentoAgenti)
    {
        abort_if(Gate::denies('cal_tag_appuntamento_agenti_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $calTagAppuntamentoAgenti->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }
}
