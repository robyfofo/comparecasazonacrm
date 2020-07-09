<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\AppuntamentoStati;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAppuntamentoStatiRequest;
use App\Http\Requests\UpdateAppuntamentoStatiRequest;
use App\Http\Resources\Admin\AppuntamentoStatiResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AppuntamentoStatiApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('appuntamento_stati_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AppuntamentoStatiResource(AppuntamentoStati::all());
    }

    public function store(StoreAppuntamentoStatiRequest $request)
    {
        $appuntamentoStati = AppuntamentoStati::create($request->all());

        return (new AppuntamentoStatiResource($appuntamentoStati))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(AppuntamentoStati $appuntamentoStati)
    {
        abort_if(Gate::denies('appuntamento_stati_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AppuntamentoStatiResource($appuntamentoStati);
    }

    public function update(UpdateAppuntamentoStatiRequest $request, AppuntamentoStati $appuntamentoStati)
    {
        $appuntamentoStati->update($request->all());

        return (new AppuntamentoStatiResource($appuntamentoStati))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(AppuntamentoStati $appuntamentoStati)
    {
        abort_if(Gate::denies('appuntamento_stati_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $appuntamentoStati->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
