<?php

namespace App\Http\Controllers\Admin;

use App\AgentProfile;
use App\Appuntamenti;
use App\CalTagAppuntamentoAgenti;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCalTagAppuntamentoAgentiRequest;
use App\Http\Requests\StoreCalTagAppuntamentoAgentiRequest;
use App\Http\Requests\UpdateCalTagAppuntamentoAgentiRequest;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class CalTagAppuntamentoAgentiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('cal_tag_appuntamento_agenti_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $calTagAppuntamentoAgentis = CalTagAppuntamentoAgenti::all();

        return view('admin.calTagAppuntamentoAgentis.index', compact('calTagAppuntamentoAgentis'));
    }

    public function create()
    {
        abort_if(Gate::denies('cal_tag_appuntamento_agenti_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $appuntamentos = Appuntamenti::all()->pluck('data_ora', 'id')->prepend(trans('global.pleaseSelect'), '');

        $agentes = AgentProfile::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.calTagAppuntamentoAgentis.create', compact('appuntamentos', 'agentes'));
    }

    public function store(StoreCalTagAppuntamentoAgentiRequest $request)
    {
        $calTagAppuntamentoAgenti = CalTagAppuntamentoAgenti::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $calTagAppuntamentoAgenti->id]);
        }

        return redirect()->route('admin.cal-tag-appuntamento-agentis.index');

    }

    public function edit(CalTagAppuntamentoAgenti $calTagAppuntamentoAgenti)
    {
        abort_if(Gate::denies('cal_tag_appuntamento_agenti_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $appuntamentos = Appuntamenti::all()->pluck('data_ora', 'id')->prepend(trans('global.pleaseSelect'), '');

        $agentes = AgentProfile::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $calTagAppuntamentoAgenti->load('appuntamento', 'agente');

        return view('admin.calTagAppuntamentoAgentis.edit', compact('appuntamentos', 'agentes', 'calTagAppuntamentoAgenti'));
    }

    public function update(UpdateCalTagAppuntamentoAgentiRequest $request, CalTagAppuntamentoAgenti $calTagAppuntamentoAgenti)
    {
        $calTagAppuntamentoAgenti->update($request->all());

        return redirect()->route('admin.cal-tag-appuntamento-agentis.index');

    }

    public function show(CalTagAppuntamentoAgenti $calTagAppuntamentoAgenti)
    {
        abort_if(Gate::denies('cal_tag_appuntamento_agenti_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $calTagAppuntamentoAgenti->load('appuntamento', 'agente');

        return view('admin.calTagAppuntamentoAgentis.show', compact('calTagAppuntamentoAgenti'));
    }

    public function destroy(CalTagAppuntamentoAgenti $calTagAppuntamentoAgenti)
    {
        abort_if(Gate::denies('cal_tag_appuntamento_agenti_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $calTagAppuntamentoAgenti->delete();

        return back();

    }

    public function massDestroy(MassDestroyCalTagAppuntamentoAgentiRequest $request)
    {
        CalTagAppuntamentoAgenti::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('cal_tag_appuntamento_agenti_create') && Gate::denies('cal_tag_appuntamento_agenti_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new CalTagAppuntamentoAgenti();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media', 'public');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);

    }

}
