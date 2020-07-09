<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTipologiaImmobiliRequest;
use App\Http\Requests\StoreTipologiaImmobiliRequest;
use App\Http\Requests\UpdateTipologiaImmobiliRequest;
use App\TipologiaImmobili;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TipologiaImmobiliController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('tipologia_immobili_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tipologiaImmobilis = TipologiaImmobili::all();

        return view('admin.tipologiaImmobilis.index', compact('tipologiaImmobilis'));
    }

    public function create()
    {
        abort_if(Gate::denies('tipologia_immobili_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tipologiaImmobilis.create');
    }

    public function store(StoreTipologiaImmobiliRequest $request)
    {
        $tipologiaImmobili = TipologiaImmobili::create($request->all());

        return redirect()->route('admin.tipologia-immobilis.index');
    }

    public function edit(TipologiaImmobili $tipologiaImmobili)
    {
        abort_if(Gate::denies('tipologia_immobili_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tipologiaImmobilis.edit', compact('tipologiaImmobili'));
    }

    public function update(UpdateTipologiaImmobiliRequest $request, TipologiaImmobili $tipologiaImmobili)
    {
        $tipologiaImmobili->update($request->all());

        return redirect()->route('admin.tipologia-immobilis.index');
    }

    public function show(TipologiaImmobili $tipologiaImmobili)
    {
        abort_if(Gate::denies('tipologia_immobili_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tipologiaImmobilis.show', compact('tipologiaImmobili'));
    }

    public function destroy(TipologiaImmobili $tipologiaImmobili)
    {
        abort_if(Gate::denies('tipologia_immobili_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tipologiaImmobili->delete();

        return back();
    }

    public function massDestroy(MassDestroyTipologiaImmobiliRequest $request)
    {
        TipologiaImmobili::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
