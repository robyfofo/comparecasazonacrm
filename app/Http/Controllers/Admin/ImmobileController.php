<?php

namespace App\Http\Controllers\Admin;

use App\AgentClient;
use App\AgentProfile;
use App\Comuni;
use App\Filiali;
use App\GarageImmobile;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyImmobileRequest;
use App\Http\Requests\StoreImmobileRequest;
use App\Http\Requests\UpdateImmobileRequest;
use App\Immobile;
use App\Province;
use App\TipologiaImmobili;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ImmobileController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('immobile_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $immobiles = Immobile::all();

        return view('admin.immobiles.index', compact('immobiles'));
    }

    public function create()
    {
        abort_if(Gate::denies('immobile_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clientes = AgentClient::all()->pluck('ruolo', 'id')->prepend(trans('global.pleaseSelect'), '');

        $agentes = AgentProfile::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $filiales = Filiali::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tipologia_immobiles = TipologiaImmobili::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $provincias = Province::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $comunes = Comuni::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $garages = GarageImmobile::all()->pluck('garage', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.immobiles.create', compact('clientes', 'agentes', 'filiales', 'tipologia_immobiles', 'provincias', 'comunes', 'garages'));
    }

    public function store(StoreImmobileRequest $request)
    {
        $immobile = Immobile::create($request->all());

        foreach ($request->input('foto', []) as $file) {
            $immobile->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('foto');
        }

        foreach ($request->input('planimetrie', []) as $file) {
            $immobile->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('planimetrie');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $immobile->id]);
        }

        return redirect()->route('admin.immobiles.index');
    }

    public function edit(Immobile $immobile)
    {
        abort_if(Gate::denies('immobile_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clientes = AgentClient::all()->pluck('ruolo', 'id')->prepend(trans('global.pleaseSelect'), '');

        $agentes = AgentProfile::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $filiales = Filiali::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tipologia_immobiles = TipologiaImmobili::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $provincias = Province::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $comunes = Comuni::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $garages = GarageImmobile::all()->pluck('garage', 'id')->prepend(trans('global.pleaseSelect'), '');

        $immobile->load('cliente', 'agente', 'filiale', 'tipologia_immobile', 'provincia', 'comune', 'garage');

        return view('admin.immobiles.edit', compact('clientes', 'agentes', 'filiales', 'tipologia_immobiles', 'provincias', 'comunes', 'garages', 'immobile'));
    }

    public function update(UpdateImmobileRequest $request, Immobile $immobile)
    {
        $immobile->update($request->all());

        if (count($immobile->foto) > 0) {
            foreach ($immobile->foto as $media) {
                if (!in_array($media->file_name, $request->input('foto', []))) {
                    $media->delete();
                }
            }
        }

        $media = $immobile->foto->pluck('file_name')->toArray();

        foreach ($request->input('foto', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $immobile->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('foto');
            }
        }

        if (count($immobile->planimetrie) > 0) {
            foreach ($immobile->planimetrie as $media) {
                if (!in_array($media->file_name, $request->input('planimetrie', []))) {
                    $media->delete();
                }
            }
        }

        $media = $immobile->planimetrie->pluck('file_name')->toArray();

        foreach ($request->input('planimetrie', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $immobile->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('planimetrie');
            }
        }

        return redirect()->route('admin.immobiles.index');
    }

    public function show(Immobile $immobile)
    {
        abort_if(Gate::denies('immobile_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $immobile->load('cliente', 'agente', 'filiale', 'tipologia_immobile', 'provincia', 'comune', 'garage');

        return view('admin.immobiles.show', compact('immobile'));
    }

    public function destroy(Immobile $immobile)
    {
        abort_if(Gate::denies('immobile_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $immobile->delete();

        return back();
    }

    public function massDestroy(MassDestroyImmobileRequest $request)
    {
        Immobile::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('immobile_create') && Gate::denies('immobile_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Immobile();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
