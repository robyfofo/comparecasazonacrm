<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Appuntamenti;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAppuntamentiRequest;
use App\Http\Requests\UpdateAppuntamentiRequest;
use App\Http\Resources\Admin\AppuntamentiResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AppuntamentiApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('appuntamenti_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AppuntamentiResource(Appuntamenti::with(['tipologia', 'statoapp', 'filiale', 'pratica', 'richiesta', 'cliente', 'agentes', 'alert'])->get());
    }

    public function store(StoreAppuntamentiRequest $request)
    {
        $appuntamenti = Appuntamenti::create($request->all());
        $appuntamenti->agentes()->sync($request->input('agentes', []));

        return (new AppuntamentiResource($appuntamenti))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Appuntamenti $appuntamenti)
    {
        abort_if(Gate::denies('appuntamenti_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AppuntamentiResource($appuntamenti->load(['tipologia', 'statoapp', 'filiale', 'pratica', 'richiesta', 'cliente', 'agentes', 'alert']));
    }

    public function update(UpdateAppuntamentiRequest $request, Appuntamenti $appuntamenti)
    {
        $appuntamenti->update($request->all());
        $appuntamenti->agentes()->sync($request->input('agentes', []));

        return (new AppuntamentiResource($appuntamenti))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Appuntamenti $appuntamenti)
    {
        abort_if(Gate::denies('appuntamenti_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $appuntamenti->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
