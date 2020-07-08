<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\AgentProfile;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAgentProfileRequest;
use App\Http\Requests\UpdateAgentProfileRequest;
use App\Http\Resources\Admin\AgentProfileResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AgentProfileApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('agent_profile_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AgentProfileResource(AgentProfile::with(['comune', 'filiale'])->get());
    }

    public function store(StoreAgentProfileRequest $request)
    {
        $agentProfile = AgentProfile::create($request->all());

        return (new AgentProfileResource($agentProfile))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(AgentProfile $agentProfile)
    {
        abort_if(Gate::denies('agent_profile_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AgentProfileResource($agentProfile->load(['comune', 'filiale']));
    }

    public function update(UpdateAgentProfileRequest $request, AgentProfile $agentProfile)
    {
        $agentProfile->update($request->all());

        return (new AgentProfileResource($agentProfile))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(AgentProfile $agentProfile)
    {
        abort_if(Gate::denies('agent_profile_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agentProfile->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
