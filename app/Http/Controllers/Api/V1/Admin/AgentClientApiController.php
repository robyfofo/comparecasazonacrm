<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\AgentClient;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreAgentClientRequest;
use App\Http\Requests\UpdateAgentClientRequest;
use App\Http\Resources\Admin\AgentClientResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AgentClientApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('agent_client_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AgentClientResource(AgentClient::with(['agente', 'filiale', 'tipo', 'comune', 'provincia', 'comune_2', 'prov_2'])->get());
    }

    public function store(StoreAgentClientRequest $request)
    {
        $agentClient = AgentClient::create($request->all());

        if ($request->input('files', false)) {
            $agentClient->addMedia(storage_path('tmp/uploads/' . $request->input('files')))->toMediaCollection('files');
        }

        return (new AgentClientResource($agentClient))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(AgentClient $agentClient)
    {
        abort_if(Gate::denies('agent_client_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AgentClientResource($agentClient->load(['agente', 'filiale', 'tipo', 'comune', 'provincia', 'comune_2', 'prov_2']));
    }

    public function update(UpdateAgentClientRequest $request, AgentClient $agentClient)
    {
        $agentClient->update($request->all());

        if ($request->input('files', false)) {
            if (!$agentClient->files || $request->input('files') !== $agentClient->files->file_name) {
                $agentClient->addMedia(storage_path('tmp/uploads/' . $request->input('files')))->toMediaCollection('files');
            }
        } elseif ($agentClient->files) {
            $agentClient->files->delete();
        }

        return (new AgentClientResource($agentClient))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(AgentClient $agentClient)
    {
        abort_if(Gate::denies('agent_client_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agentClient->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
