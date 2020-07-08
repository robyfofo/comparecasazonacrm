<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTipologiaMandatoPraticaRequest;
use App\Http\Requests\StoreTipologiaMandatoPraticaRequest;
use App\Http\Requests\UpdateTipologiaMandatoPraticaRequest;
use App\TipologiaMandatoPratica;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TipologiaMandatoPraticaController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('tipologia_mandato_pratica_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tipologiaMandatoPraticas = TipologiaMandatoPratica::all();

        return view('admin.tipologiaMandatoPraticas.index', compact('tipologiaMandatoPraticas'));
    }

    public function create()
    {
        abort_if(Gate::denies('tipologia_mandato_pratica_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tipologiaMandatoPraticas.create');
    }

    public function store(StoreTipologiaMandatoPraticaRequest $request)
    {
        $tipologiaMandatoPratica = TipologiaMandatoPratica::create($request->all());

        return redirect()->route('admin.tipologia-mandato-praticas.index');
    }

    public function edit(TipologiaMandatoPratica $tipologiaMandatoPratica)
    {
        abort_if(Gate::denies('tipologia_mandato_pratica_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tipologiaMandatoPraticas.edit', compact('tipologiaMandatoPratica'));
    }

    public function update(UpdateTipologiaMandatoPraticaRequest $request, TipologiaMandatoPratica $tipologiaMandatoPratica)
    {
        $tipologiaMandatoPratica->update($request->all());

        return redirect()->route('admin.tipologia-mandato-praticas.index');
    }

    public function show(TipologiaMandatoPratica $tipologiaMandatoPratica)
    {
        abort_if(Gate::denies('tipologia_mandato_pratica_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tipologiaMandatoPraticas.show', compact('tipologiaMandatoPratica'));
    }

    public function destroy(TipologiaMandatoPratica $tipologiaMandatoPratica)
    {
        abort_if(Gate::denies('tipologia_mandato_pratica_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tipologiaMandatoPratica->delete();

        return back();
    }

    public function massDestroy(MassDestroyTipologiaMandatoPraticaRequest $request)
    {
        TipologiaMandatoPratica::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
