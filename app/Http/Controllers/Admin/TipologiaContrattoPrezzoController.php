<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTipologiaContrattoPrezzoRequest;
use App\Http\Requests\StoreTipologiaContrattoPrezzoRequest;
use App\Http\Requests\UpdateTipologiaContrattoPrezzoRequest;
use App\TipologiaContrattoPrezzo;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TipologiaContrattoPrezzoController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('tipologia_contratto_prezzo_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tipologiaContrattoPrezzos = TipologiaContrattoPrezzo::all();

        return view('admin.tipologiaContrattoPrezzos.index', compact('tipologiaContrattoPrezzos'));
    }

    public function create()
    {
        abort_if(Gate::denies('tipologia_contratto_prezzo_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tipologiaContrattoPrezzos.create');
    }

    public function store(StoreTipologiaContrattoPrezzoRequest $request)
    {
        $tipologiaContrattoPrezzo = TipologiaContrattoPrezzo::create($request->all());

        return redirect()->route('admin.tipologia-contratto-prezzos.index');
    }

    public function edit(TipologiaContrattoPrezzo $tipologiaContrattoPrezzo)
    {
        abort_if(Gate::denies('tipologia_contratto_prezzo_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tipologiaContrattoPrezzos.edit', compact('tipologiaContrattoPrezzo'));
    }

    public function update(UpdateTipologiaContrattoPrezzoRequest $request, TipologiaContrattoPrezzo $tipologiaContrattoPrezzo)
    {
        $tipologiaContrattoPrezzo->update($request->all());

        return redirect()->route('admin.tipologia-contratto-prezzos.index');
    }

    public function show(TipologiaContrattoPrezzo $tipologiaContrattoPrezzo)
    {
        abort_if(Gate::denies('tipologia_contratto_prezzo_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tipologiaContrattoPrezzos.show', compact('tipologiaContrattoPrezzo'));
    }

    public function destroy(TipologiaContrattoPrezzo $tipologiaContrattoPrezzo)
    {
        abort_if(Gate::denies('tipologia_contratto_prezzo_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tipologiaContrattoPrezzo->delete();

        return back();
    }

    public function massDestroy(MassDestroyTipologiaContrattoPrezzoRequest $request)
    {
        TipologiaContrattoPrezzo::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
