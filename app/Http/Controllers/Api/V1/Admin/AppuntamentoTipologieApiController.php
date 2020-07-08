<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\AppuntamentoTipologie;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAppuntamentoTipologieRequest;
use App\Http\Requests\UpdateAppuntamentoTipologieRequest;
use App\Http\Resources\Admin\AppuntamentoTipologieResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AppuntamentoTipologieApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('appuntamento_tipologie_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AppuntamentoTipologieResource(AppuntamentoTipologie::all());
    }

    public function store(StoreAppuntamentoTipologieRequest $request)
    {
        $appuntamentoTipologie = AppuntamentoTipologie::create($request->all());

        return (new AppuntamentoTipologieResource($appuntamentoTipologie))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(AppuntamentoTipologie $appuntamentoTipologie)
    {
        abort_if(Gate::denies('appuntamento_tipologie_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AppuntamentoTipologieResource($appuntamentoTipologie);
    }

    public function update(UpdateAppuntamentoTipologieRequest $request, AppuntamentoTipologie $appuntamentoTipologie)
    {
        $appuntamentoTipologie->update($request->all());

        return (new AppuntamentoTipologieResource($appuntamentoTipologie))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(AppuntamentoTipologie $appuntamentoTipologie)
    {
        abort_if(Gate::denies('appuntamento_tipologie_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $appuntamentoTipologie->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
