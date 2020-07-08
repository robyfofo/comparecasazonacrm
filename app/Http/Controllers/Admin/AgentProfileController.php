<?php

namespace App\Http\Controllers\Admin;

use App\AgentProfile;
use App\Comuni;
use App\Filiali;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAgentProfileRequest;
use App\Http\Requests\StoreAgentProfileRequest;
use App\Http\Requests\UpdateAgentProfileRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AgentProfileController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('agent_profile_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agentProfiles = AgentProfile::all();

        return view('admin.agentProfiles.index', compact('agentProfiles'));
    }

    public function create()
    {
        abort_if(Gate::denies('agent_profile_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $comunes = Comuni::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $filiales = Filiali::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.agentProfiles.create', compact('comunes', 'filiales'));
    }

    public function store(StoreAgentProfileRequest $request)
    {
        $agentProfile = AgentProfile::create($request->all());

        return redirect()->route('admin.agent-profiles.index');
    }

    public function edit(AgentProfile $agentProfile)
    {
        abort_if(Gate::denies('agent_profile_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $comunes = Comuni::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $filiales = Filiali::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $agentProfile->load('comune', 'filiale');

        return view('admin.agentProfiles.edit', compact('comunes', 'filiales', 'agentProfile'));
    }

    public function update(UpdateAgentProfileRequest $request, AgentProfile $agentProfile)
    {
        $agentProfile->update($request->all());

        return redirect()->route('admin.agent-profiles.index');
    }

    public function show(AgentProfile $agentProfile)
    {
        abort_if(Gate::denies('agent_profile_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agentProfile->load('comune', 'filiale');

        return view('admin.agentProfiles.show', compact('agentProfile'));
    }

    public function destroy(AgentProfile $agentProfile)
    {
        abort_if(Gate::denies('agent_profile_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agentProfile->delete();

        return back();
    }

    public function massDestroy(MassDestroyAgentProfileRequest $request)
    {
        AgentProfile::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
