<?php

namespace App\Http\Controllers\Admin;

use App\AgentClient;
use App\AgentProfile;
use App\Agenzie;
use App\Comuni;
use App\ContrattoImmobile;
use App\GarageImmobile;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRichiestumRequest;
use App\Http\Requests\StoreRichiestumRequest;
use App\Http\Requests\UpdateRichiestumRequest;
use App\Province;
use App\Richiestum;
use App\TipologiaImmobili;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class RichiestaController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('richiestum_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Richiestum::with(['agente', 'agenzia', 'cliente', 'contratto', 'provincia', 'comune', 'garage', 'tipologia_immobile', 'tipologia_immobile_2', 'tipologia_immobile_3', 'tipologia_immobile_4', 'comune_2', 'comune_3', 'comune_4', 'comune_5', 'comune_6'])->select(sprintf('%s.*', (new Richiestum)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'richiestum_show';
                $editGate      = 'richiestum_edit';
                $deleteGate    = 'richiestum_delete';
                $crudRoutePart = 'richiesta';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            $table->addColumn('agente_telefono', function ($row) {
                return $row->agente ? $row->agente->telefono : '';
            });

            $table->addColumn('agenzia_nome', function ($row) {
                return $row->agenzia ? $row->agenzia->nome : '';
            });

            $table->addColumn('cliente_ruolo', function ($row) {
                return $row->cliente ? $row->cliente->ruolo : '';
            });

            $table->addColumn('provincia_nome', function ($row) {
                return $row->provincia ? $row->provincia->nome : '';
            });

            $table->editColumn('prezzo', function ($row) {
                return $row->prezzo ? $row->prezzo : "";
            });
            $table->addColumn('tipologia_immobile_insieme', function ($row) {
                return $row->tipologia_immobile ? $row->tipologia_immobile->insieme : '';
            });

            $table->editColumn('priorita', function ($row) {
                return $row->priorita ? Richiestum::PRIORITA_SELECT[$row->priorita] : '';
            });
            $table->editColumn('destinazione', function ($row) {
                return $row->destinazione ? Richiestum::DESTINAZIONE_SELECT[$row->destinazione] : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'agente', 'agenzia', 'cliente', 'provincia', 'tipologia_immobile']);

            return $table->make(true);
        }

        return view('admin.richiesta.index');
    }

    public function create()
    {
        abort_if(Gate::denies('richiestum_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agentes = AgentProfile::all()->pluck('telefono', 'id')->prepend(trans('global.pleaseSelect'), '');

        $agenzias = Agenzie::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $clientes = AgentClient::all()->pluck('ruolo', 'id')->prepend(trans('global.pleaseSelect'), '');

        $contrattos = ContrattoImmobile::all()->pluck('contratto', 'id')->prepend(trans('global.pleaseSelect'), '');

        $provincias = Province::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $comunes = Comuni::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $garages = GarageImmobile::all()->pluck('garage', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tipologia_immobiles = TipologiaImmobili::all()->pluck('insieme', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tipologia_immobile_2s = TipologiaImmobili::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tipologia_immobile_3s = TipologiaImmobili::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tipologia_immobile_4s = TipologiaImmobili::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $comune_2s = Comuni::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $comune_3s = Comuni::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $comune_4s = Comuni::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $comune_5s = Comuni::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $comune_6s = Comuni::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.richiesta.create', compact('agentes', 'agenzias', 'clientes', 'contrattos', 'provincias', 'comunes', 'garages', 'tipologia_immobiles', 'tipologia_immobile_2s', 'tipologia_immobile_3s', 'tipologia_immobile_4s', 'comune_2s', 'comune_3s', 'comune_4s', 'comune_5s', 'comune_6s'));
    }

    public function store(StoreRichiestumRequest $request)
    {
        $richiestum = Richiestum::create($request->all());

        return redirect()->route('admin.richiesta.index');
    }

    public function edit(Richiestum $richiestum)
    {
        abort_if(Gate::denies('richiestum_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agentes = AgentProfile::all()->pluck('telefono', 'id')->prepend(trans('global.pleaseSelect'), '');

        $agenzias = Agenzie::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $clientes = AgentClient::all()->pluck('ruolo', 'id')->prepend(trans('global.pleaseSelect'), '');

        $contrattos = ContrattoImmobile::all()->pluck('contratto', 'id')->prepend(trans('global.pleaseSelect'), '');

        $provincias = Province::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $comunes = Comuni::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $garages = GarageImmobile::all()->pluck('garage', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tipologia_immobiles = TipologiaImmobili::all()->pluck('insieme', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tipologia_immobile_2s = TipologiaImmobili::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tipologia_immobile_3s = TipologiaImmobili::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tipologia_immobile_4s = TipologiaImmobili::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $comune_2s = Comuni::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $comune_3s = Comuni::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $comune_4s = Comuni::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $comune_5s = Comuni::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $comune_6s = Comuni::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $richiestum->load('agente', 'agenzia', 'cliente', 'contratto', 'provincia', 'comune', 'garage', 'tipologia_immobile', 'tipologia_immobile_2', 'tipologia_immobile_3', 'tipologia_immobile_4', 'comune_2', 'comune_3', 'comune_4', 'comune_5', 'comune_6');

        return view('admin.richiesta.edit', compact('agentes', 'agenzias', 'clientes', 'contrattos', 'provincias', 'comunes', 'garages', 'tipologia_immobiles', 'tipologia_immobile_2s', 'tipologia_immobile_3s', 'tipologia_immobile_4s', 'comune_2s', 'comune_3s', 'comune_4s', 'comune_5s', 'comune_6s', 'richiestum'));
    }

    public function update(UpdateRichiestumRequest $request, Richiestum $richiestum)
    {
        $richiestum->update($request->all());

        return redirect()->route('admin.richiesta.index');
    }

    public function show(Richiestum $richiestum)
    {
        abort_if(Gate::denies('richiestum_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $richiestum->load('agente', 'agenzia', 'cliente', 'contratto', 'provincia', 'comune', 'garage', 'tipologia_immobile', 'tipologia_immobile_2', 'tipologia_immobile_3', 'tipologia_immobile_4', 'comune_2', 'comune_3', 'comune_4', 'comune_5', 'comune_6');

        return view('admin.richiesta.show', compact('richiestum'));
    }

    public function destroy(Richiestum $richiestum)
    {
        abort_if(Gate::denies('richiestum_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $richiestum->delete();

        return back();
    }

    public function massDestroy(MassDestroyRichiestumRequest $request)
    {
        Richiestum::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
