<?php

namespace App\Http\Controllers\Admin;

use App\Fattura;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyFatturaRequest;
use App\Http\Requests\StoreFatturaRequest;
use App\Http\Requests\UpdateFatturaRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FatturaController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('fattura_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fatturas = Fattura::all();

        return view('admin.fatturas.index', compact('fatturas'));
    }

    public function create()
    {
        abort_if(Gate::denies('fattura_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.fatturas.create');
    }

    public function store(StoreFatturaRequest $request)
    {
        $fattura = Fattura::create($request->all());

        return redirect()->route('admin.fatturas.index');
    }

    public function edit(Fattura $fattura)
    {
        abort_if(Gate::denies('fattura_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.fatturas.edit', compact('fattura'));
    }

    public function update(UpdateFatturaRequest $request, Fattura $fattura)
    {
        $fattura->update($request->all());

        return redirect()->route('admin.fatturas.index');
    }

    public function show(Fattura $fattura)
    {
        abort_if(Gate::denies('fattura_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.fatturas.show', compact('fattura'));
    }

    public function destroy(Fattura $fattura)
    {
        abort_if(Gate::denies('fattura_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fattura->delete();

        return back();
    }

    public function massDestroy(MassDestroyFatturaRequest $request)
    {
        Fattura::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
