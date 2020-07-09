<?php

namespace App\Http\Controllers\Admin;

use App\AgentClient;
use App\AgentProfile;
use App\Appuntamenti;
use App\AppuntamentoStati;
use App\AppuntamentoTipologie;
use App\Filiali;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAppuntamentiRequest;
use App\Http\Requests\StoreAppuntamentiRequest;
use App\Http\Requests\UpdateAppuntamentiRequest;
use App\Pratica;
use App\Richiestum;
use App\UserAlert;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AppuntamentiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('appuntamenti_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $appuntamentis = Appuntamenti::all();

        return view('admin.appuntamentis.index', compact('appuntamentis'));
    }

    public function create()
    {
        abort_if(Gate::denies('appuntamenti_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tipologias = AppuntamentoTipologie::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $statoapps = AppuntamentoStati::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $filiales = Filiali::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $praticas = Pratica::all()->pluck('pratica', 'id')->prepend(trans('global.pleaseSelect'), '');

        $richiestas = Richiestum::all()->pluck('prezzo', 'id')->prepend(trans('global.pleaseSelect'), '');

        $clientes = AgentClient::all()->pluck('ruolo', 'id')->prepend(trans('global.pleaseSelect'), '');

        $agentes = AgentProfile::all()->pluck('nome', 'id');

        $alerts = UserAlert::all()->pluck('alert_text', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.appuntamentis.create', compact('tipologias', 'statoapps', 'filiales', 'praticas', 'richiestas', 'clientes', 'agentes', 'alerts'));
    }

    public function store(StoreAppuntamentiRequest $request)
    {
        $appuntamenti = Appuntamenti::create($request->all());
        $appuntamenti->agentes()->sync($request->input('agentes', []));

        return redirect()->route('admin.appuntamentis.index');
    }

    public function edit(Appuntamenti $appuntamenti)
    {
        abort_if(Gate::denies('appuntamenti_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tipologias = AppuntamentoTipologie::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $statoapps = AppuntamentoStati::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $filiales = Filiali::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $praticas = Pratica::all()->pluck('pratica', 'id')->prepend(trans('global.pleaseSelect'), '');

        $richiestas = Richiestum::all()->pluck('prezzo', 'id')->prepend(trans('global.pleaseSelect'), '');

        $clientes = AgentClient::all()->pluck('ruolo', 'id')->prepend(trans('global.pleaseSelect'), '');

        $agentes = AgentProfile::all()->pluck('nome', 'id');

        $appuntamenti->load('tipologia', 'statoapp', 'filiale', 'pratica', 'richiesta', 'cliente', 'agentes', 'alert');

        return view('admin.appuntamentis.edit', compact('tipologias', 'statoapps', 'filiales', 'praticas', 'richiestas', 'clientes', 'agentes', 'appuntamenti'));
    }

    public function update(UpdateAppuntamentiRequest $request, Appuntamenti $appuntamenti)
    {
        $appuntamenti->update($request->all());
        $appuntamenti->agentes()->sync($request->input('agentes', []));

        return redirect()->route('admin.appuntamentis.index');
    }

    public function show(Appuntamenti $appuntamenti)
    {
        abort_if(Gate::denies('appuntamenti_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $appuntamenti->load('tipologia', 'statoapp', 'filiale', 'pratica', 'richiesta', 'cliente', 'agentes', 'alert');

        return view('admin.appuntamentis.show', compact('appuntamenti'));
    }

    public function destroy(Appuntamenti $appuntamenti)
    {
        abort_if(Gate::denies('appuntamenti_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $appuntamenti->delete();

        return back();
    }

    public function massDestroy(MassDestroyAppuntamentiRequest $request)
    {
        Appuntamenti::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
