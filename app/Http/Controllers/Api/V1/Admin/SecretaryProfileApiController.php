<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSecretaryProfileRequest;
use App\Http\Requests\UpdateSecretaryProfileRequest;
use App\Http\Resources\Admin\SecretaryProfileResource;
use App\SecretaryProfile;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SecretaryProfileApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('secretary_profile_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SecretaryProfileResource(SecretaryProfile::with(['comune', 'filiale'])->get());
    }

    public function store(StoreSecretaryProfileRequest $request)
    {
        $secretaryProfile = SecretaryProfile::create($request->all());

        return (new SecretaryProfileResource($secretaryProfile))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(SecretaryProfile $secretaryProfile)
    {
        abort_if(Gate::denies('secretary_profile_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SecretaryProfileResource($secretaryProfile->load(['comune', 'filiale']));
    }

    public function update(UpdateSecretaryProfileRequest $request, SecretaryProfile $secretaryProfile)
    {
        $secretaryProfile->update($request->all());

        return (new SecretaryProfileResource($secretaryProfile))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(SecretaryProfile $secretaryProfile)
    {
        abort_if(Gate::denies('secretary_profile_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $secretaryProfile->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
