<?php

namespace App\Http\Controllers\Admin;

use App\AgentClient;
use App\AgentProfile;
use App\ClientiTipologium;
use App\Comuni;
use App\Filiali;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyAgentClientRequest;
use App\Http\Requests\StoreAgentClientRequest;
use App\Http\Requests\UpdateAgentClientRequest;
use App\Province;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class AgentClientController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('agent_client_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agentClients = AgentClient::all();

        return view('admin.agentClients.index', compact('agentClients'));
    }

    public function create()
    {
        abort_if(Gate::denies('agent_client_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agentes = AgentProfile::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $filiales = Filiali::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tipos = ClientiTipologium::all()->pluck('tipologia', 'id')->prepend(trans('global.pleaseSelect'), '');

        $comunes = Comuni::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $provincias = Province::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $comune_2s = Comuni::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $prov_2s = Province::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.agentClients.create', compact('agentes', 'filiales', 'tipos', 'comunes', 'provincias', 'comune_2s', 'prov_2s'));
    }

    public function store(StoreAgentClientRequest $request)
    {
        $agentClient = AgentClient::create($request->all());

        foreach ($request->input('files', []) as $file) {
            $agentClient->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('files');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $agentClient->id]);
        }

        return redirect()->route('admin.agent-clients.index');
    }

    public function edit(AgentClient $agentClient)
    {
        abort_if(Gate::denies('agent_client_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agentes = AgentProfile::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $filiales = Filiali::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tipos = ClientiTipologium::all()->pluck('tipologia', 'id')->prepend(trans('global.pleaseSelect'), '');

        $comunes = Comuni::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $provincias = Province::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $comune_2s = Comuni::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $prov_2s = Province::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $agentClient->load('agente', 'filiale', 'tipo', 'comune', 'provincia', 'comune_2', 'prov_2');

        return view('admin.agentClients.edit', compact('agentes', 'filiales', 'tipos', 'comunes', 'provincias', 'comune_2s', 'prov_2s', 'agentClient'));
    }

    public function update(UpdateAgentClientRequest $request, AgentClient $agentClient)
    {
        $agentClient->update($request->all());

        if (count($agentClient->files) > 0) {
            foreach ($agentClient->files as $media) {
                if (!in_array($media->file_name, $request->input('files', []))) {
                    $media->delete();
                }
            }
        }

        $media = $agentClient->files->pluck('file_name')->toArray();

        foreach ($request->input('files', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $agentClient->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('files');
            }
        }

        return redirect()->route('admin.agent-clients.index');
    }

    public function show(AgentClient $agentClient)
    {
        abort_if(Gate::denies('agent_client_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agentClient->load('agente', 'filiale', 'tipo', 'comune', 'provincia', 'comune_2', 'prov_2');

        return view('admin.agentClients.show', compact('agentClient'));
    }

    public function destroy(AgentClient $agentClient)
    {
        abort_if(Gate::denies('agent_client_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agentClient->delete();

        return back();
    }

    public function massDestroy(MassDestroyAgentClientRequest $request)
    {
        AgentClient::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('agent_client_create') && Gate::denies('agent_client_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new AgentClient();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
