<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreImmobileRequest;
use App\Http\Requests\UpdateImmobileRequest;
use App\Http\Resources\Admin\ImmobileResource;
use App\Immobile;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ImmobileApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('immobile_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ImmobileResource(Immobile::with(['cliente', 'agente', 'filiale', 'tipologia_immobile', 'provincia', 'comune', 'garage'])->get());
    }

    public function store(StoreImmobileRequest $request)
    {
        $immobile = Immobile::create($request->all());

        if ($request->input('foto', false)) {
            $immobile->addMedia(storage_path('tmp/uploads/' . $request->input('foto')))->toMediaCollection('foto');
        }

        if ($request->input('planimetrie', false)) {
            $immobile->addMedia(storage_path('tmp/uploads/' . $request->input('planimetrie')))->toMediaCollection('planimetrie');
        }

        return (new ImmobileResource($immobile))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Immobile $immobile)
    {
        abort_if(Gate::denies('immobile_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ImmobileResource($immobile->load(['cliente', 'agente', 'filiale', 'tipologia_immobile', 'provincia', 'comune', 'garage']));
    }

    public function update(UpdateImmobileRequest $request, Immobile $immobile)
    {
        $immobile->update($request->all());

        if ($request->input('foto', false)) {
            if (!$immobile->foto || $request->input('foto') !== $immobile->foto->file_name) {
                $immobile->addMedia(storage_path('tmp/uploads/' . $request->input('foto')))->toMediaCollection('foto');
            }
        } elseif ($immobile->foto) {
            $immobile->foto->delete();
        }

        if ($request->input('planimetrie', false)) {
            if (!$immobile->planimetrie || $request->input('planimetrie') !== $immobile->planimetrie->file_name) {
                $immobile->addMedia(storage_path('tmp/uploads/' . $request->input('planimetrie')))->toMediaCollection('planimetrie');
            }
        } elseif ($immobile->planimetrie) {
            $immobile->planimetrie->delete();
        }

        return (new ImmobileResource($immobile))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Immobile $immobile)
    {
        abort_if(Gate::denies('immobile_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $immobile->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
