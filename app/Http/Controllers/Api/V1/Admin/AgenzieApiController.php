<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Agenzie;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreAgenzieRequest;
use App\Http\Requests\UpdateAgenzieRequest;
use App\Http\Resources\Admin\AgenzieResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AgenzieApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('agenzie_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AgenzieResource(Agenzie::with(['admin'])->get());
    }

    public function store(StoreAgenzieRequest $request)
    {
        $agenzie = Agenzie::create($request->all());

        if ($request->input('foto_logo', false)) {
            $agenzie->addMedia(storage_path('tmp/uploads/' . $request->input('foto_logo')))->toMediaCollection('foto_logo');
        }

        return (new AgenzieResource($agenzie))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Agenzie $agenzie)
    {
        abort_if(Gate::denies('agenzie_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AgenzieResource($agenzie->load(['admin']));
    }

    public function update(UpdateAgenzieRequest $request, Agenzie $agenzie)
    {
        $agenzie->update($request->all());

        if ($request->input('foto_logo', false)) {
            if (!$agenzie->foto_logo || $request->input('foto_logo') !== $agenzie->foto_logo->file_name) {
                $agenzie->addMedia(storage_path('tmp/uploads/' . $request->input('foto_logo')))->toMediaCollection('foto_logo');
            }
        } elseif ($agenzie->foto_logo) {
            $agenzie->foto_logo->delete();
        }

        return (new AgenzieResource($agenzie))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Agenzie $agenzie)
    {
        abort_if(Gate::denies('agenzie_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agenzie->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
