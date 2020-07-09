<?php

namespace App\Http\Controllers\Admin;

use App\AgentClient;
use App\AgentProfile;
use App\ClientiChiamate;
use App\Filiali;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyClientiChiamateRequest;
use App\Http\Requests\StoreClientiChiamateRequest;
use App\Http\Requests\UpdateClientiChiamateRequest;
use App\Pratica;
use App\Richiestum;
use App\UserAlert;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ClientiChiamateController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('clienti_chiamate_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clientiChiamates = ClientiChiamate::all();

        return view('admin.clientiChiamates.index', compact('clientiChiamates'));
    }

    public function create()
    {
        abort_if(Gate::denies('clienti_chiamate_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $filiales = Filiali::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $agentes = AgentProfile::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $clientes = AgentClient::all()->pluck('nome_2', 'id')->prepend(trans('global.pleaseSelect'), '');

        $praticas = Pratica::all()->pluck('pratica', 'id')->prepend(trans('global.pleaseSelect'), '');

        $richiestas = Richiestum::all()->pluck('destinazione', 'id')->prepend(trans('global.pleaseSelect'), '');

        $alerts = UserAlert::all()->pluck('alert_text', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.clientiChiamates.create', compact('filiales', 'agentes', 'clientes', 'praticas', 'richiestas', 'alerts'));
    }

    public function store(StoreClientiChiamateRequest $request)
    {
        $clientiChiamate = ClientiChiamate::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $clientiChiamate->id]);
        }

        return redirect()->route('admin.clienti-chiamates.index');
    }

    public function edit(ClientiChiamate $clientiChiamate)
    {
        abort_if(Gate::denies('clienti_chiamate_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $filiales = Filiali::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $agentes = AgentProfile::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $clientes = AgentClient::all()->pluck('nome_2', 'id')->prepend(trans('global.pleaseSelect'), '');

        $praticas = Pratica::all()->pluck('pratica', 'id')->prepend(trans('global.pleaseSelect'), '');

        $richiestas = Richiestum::all()->pluck('destinazione', 'id')->prepend(trans('global.pleaseSelect'), '');

        $clientiChiamate->load('filiale', 'agente', 'cliente', 'pratica', 'richiesta', 'alert');

        return view('admin.clientiChiamates.edit', compact('filiales', 'agentes', 'clientes', 'praticas', 'richiestas', 'clientiChiamate'));
    }

    public function update(UpdateClientiChiamateRequest $request, ClientiChiamate $clientiChiamate)
    {
        $clientiChiamate->update($request->all());

        return redirect()->route('admin.clienti-chiamates.index');
    }

    public function show(ClientiChiamate $clientiChiamate)
    {
        abort_if(Gate::denies('clienti_chiamate_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clientiChiamate->load('filiale', 'agente', 'cliente', 'pratica', 'richiesta', 'alert');

        return view('admin.clientiChiamates.show', compact('clientiChiamate'));
    }

    public function destroy(ClientiChiamate $clientiChiamate)
    {
        abort_if(Gate::denies('clienti_chiamate_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clientiChiamate->delete();

        return back();
    }

    public function massDestroy(MassDestroyClientiChiamateRequest $request)
    {
        ClientiChiamate::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('clienti_chiamate_create') && Gate::denies('clienti_chiamate_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new ClientiChiamate();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
