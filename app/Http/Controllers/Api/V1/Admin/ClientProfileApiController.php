<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\ClientProfile;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreClientProfileRequest;
use App\Http\Requests\UpdateClientProfileRequest;
use App\Http\Resources\Admin\ClientProfileResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClientProfileApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('client_profile_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ClientProfileResource(ClientProfile::with(['agente', 'filiale', 'tipo', 'comune', 'provincia', 'comune_2', 'prov_2'])->get());
    }

    public function store(StoreClientProfileRequest $request)
    {
        $clientProfile = ClientProfile::create($request->all());

        if ($request->input('files', false)) {
            $clientProfile->addMedia(storage_path('tmp/uploads/' . $request->input('files')))->toMediaCollection('files');
        }

        return (new ClientProfileResource($clientProfile))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ClientProfile $clientProfile)
    {
        abort_if(Gate::denies('client_profile_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ClientProfileResource($clientProfile->load(['agente', 'filiale', 'tipo', 'comune', 'provincia', 'comune_2', 'prov_2']));
    }

    public function update(UpdateClientProfileRequest $request, ClientProfile $clientProfile)
    {
        $clientProfile->update($request->all());

        if ($request->input('files', false)) {
            if (!$clientProfile->files || $request->input('files') !== $clientProfile->files->file_name) {
                $clientProfile->addMedia(storage_path('tmp/uploads/' . $request->input('files')))->toMediaCollection('files');
            }
        } elseif ($clientProfile->files) {
            $clientProfile->files->delete();
        }

        return (new ClientProfileResource($clientProfile))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ClientProfile $clientProfile)
    {
        abort_if(Gate::denies('client_profile_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clientProfile->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
