<?php

namespace App\Http\Controllers\Admin;

use App\AgentClient;
use App\AgentProfile;
use App\ConsegnaImmobili;
use App\ContrattoImmobile;
use App\Filiali;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPraticaRequest;
use App\Http\Requests\StorePraticaRequest;
use App\Http\Requests\UpdatePraticaRequest;
use App\Immobile;
use App\Pratica;
use App\TipologiaContrattoPrezzo;
use App\TipologiaImmobili;
use App\TipologiaMandatoPratica;
use App\UserAlert;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class PraticaController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('pratica_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $praticas = Pratica::all();

        return view('admin.praticas.index', compact('praticas'));
    }

    public function create()
    {
        abort_if(Gate::denies('pratica_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clientes = AgentClient::all()->pluck('ruolo', 'id')->prepend(trans('global.pleaseSelect'), '');

        $agentes = AgentProfile::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $filiales = Filiali::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tipologia_immobiles = TipologiaImmobili::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $immobiles = Immobile::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $contrattos = ContrattoImmobile::all()->pluck('contratto', 'id')->prepend(trans('global.pleaseSelect'), '');

        $consegnas = ConsegnaImmobili::all()->pluck('consegna', 'id')->prepend(trans('global.pleaseSelect'), '');

        $contratto_tipos = TipologiaContrattoPrezzo::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tipo_mandatos = TipologiaMandatoPratica::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $mandato_agentes = AgentProfile::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $scadenza_incarico_alerts = UserAlert::all()->pluck('alert_text', 'id')->prepend(trans('global.pleaseSelect'), '');

        $scadenza_affitto_alerts = UserAlert::all()->pluck('alert_text', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.praticas.create', compact('clientes', 'agentes', 'filiales', 'tipologia_immobiles', 'immobiles', 'contrattos', 'consegnas', 'contratto_tipos', 'tipo_mandatos', 'mandato_agentes', 'scadenza_incarico_alerts', 'scadenza_affitto_alerts'));
    }

    public function store(StorePraticaRequest $request)
    {
        $pratica = Pratica::create($request->all());

        foreach ($request->input('documenti', []) as $file) {
            $pratica->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('documenti');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $pratica->id]);
        }

        return redirect()->route('admin.praticas.index');
    }

    public function edit(Pratica $pratica)
    {
        abort_if(Gate::denies('pratica_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clientes = AgentClient::all()->pluck('ruolo', 'id')->prepend(trans('global.pleaseSelect'), '');

        $agentes = AgentProfile::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $filiales = Filiali::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tipologia_immobiles = TipologiaImmobili::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $immobiles = Immobile::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $contrattos = ContrattoImmobile::all()->pluck('contratto', 'id')->prepend(trans('global.pleaseSelect'), '');

        $consegnas = ConsegnaImmobili::all()->pluck('consegna', 'id')->prepend(trans('global.pleaseSelect'), '');

        $contratto_tipos = TipologiaContrattoPrezzo::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tipo_mandatos = TipologiaMandatoPratica::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $mandato_agentes = AgentProfile::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pratica->load('cliente', 'agente', 'filiale', 'tipologia_immobile', 'immobile', 'contratto', 'consegna', 'contratto_tipo', 'tipo_mandato', 'mandato_agente', 'scadenza_incarico_alert', 'scadenza_affitto_alert');

        return view('admin.praticas.edit', compact('clientes', 'agentes', 'filiales', 'tipologia_immobiles', 'immobiles', 'contrattos', 'consegnas', 'contratto_tipos', 'tipo_mandatos', 'mandato_agentes', 'pratica'));
    }

    public function update(UpdatePraticaRequest $request, Pratica $pratica)
    {
        $pratica->update($request->all());

        if (count($pratica->documenti) > 0) {
            foreach ($pratica->documenti as $media) {
                if (!in_array($media->file_name, $request->input('documenti', []))) {
                    $media->delete();
                }
            }
        }

        $media = $pratica->documenti->pluck('file_name')->toArray();

        foreach ($request->input('documenti', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $pratica->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('documenti');
            }
        }

        return redirect()->route('admin.praticas.index');
    }

    public function show(Pratica $pratica)
    {
        abort_if(Gate::denies('pratica_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pratica->load('cliente', 'agente', 'filiale', 'tipologia_immobile', 'immobile', 'contratto', 'consegna', 'contratto_tipo', 'tipo_mandato', 'mandato_agente', 'scadenza_incarico_alert', 'scadenza_affitto_alert');

        return view('admin.praticas.show', compact('pratica'));
    }

    public function destroy(Pratica $pratica)
    {
        abort_if(Gate::denies('pratica_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pratica->delete();

        return back();
    }

    public function massDestroy(MassDestroyPraticaRequest $request)
    {
        Pratica::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('pratica_create') && Gate::denies('pratica_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Pratica();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
