<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StorePraticaRequest;
use App\Http\Requests\UpdatePraticaRequest;
use App\Http\Resources\Admin\PraticaResource;
use App\Pratica;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PraticaApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('pratica_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PraticaResource(Pratica::with(['cliente', 'agente', 'filiale', 'tipologia_immobile', 'immobile', 'contratto', 'consegna', 'contratto_tipo', 'tipo_mandato', 'mandato_agente', 'scadenza_incarico_alert', 'scadenza_affitto_alert'])->get());
    }

    public function store(StorePraticaRequest $request)
    {
        $pratica = Pratica::create($request->all());

        if ($request->input('documenti', false)) {
            $pratica->addMedia(storage_path('tmp/uploads/' . $request->input('documenti')))->toMediaCollection('documenti');
        }

        return (new PraticaResource($pratica))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Pratica $pratica)
    {
        abort_if(Gate::denies('pratica_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PraticaResource($pratica->load(['cliente', 'agente', 'filiale', 'tipologia_immobile', 'immobile', 'contratto', 'consegna', 'contratto_tipo', 'tipo_mandato', 'mandato_agente', 'scadenza_incarico_alert', 'scadenza_affitto_alert']));
    }

    public function update(UpdatePraticaRequest $request, Pratica $pratica)
    {
        $pratica->update($request->all());

        if ($request->input('documenti', false)) {
            if (!$pratica->documenti || $request->input('documenti') !== $pratica->documenti->file_name) {
                $pratica->addMedia(storage_path('tmp/uploads/' . $request->input('documenti')))->toMediaCollection('documenti');
            }
        } elseif ($pratica->documenti) {
            $pratica->documenti->delete();
        }

        return (new PraticaResource($pratica))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Pratica $pratica)
    {
        abort_if(Gate::denies('pratica_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pratica->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
