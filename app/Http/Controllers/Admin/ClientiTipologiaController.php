<?php

namespace App\Http\Controllers\Admin;

use App\ClientiTipologium;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyClientiTipologiumRequest;
use App\Http\Requests\StoreClientiTipologiumRequest;
use App\Http\Requests\UpdateClientiTipologiumRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClientiTipologiaController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('clienti_tipologium_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clientiTipologia = ClientiTipologium::all();

        return view('admin.clientiTipologia.index', compact('clientiTipologia'));
    }

    public function create()
    {
        abort_if(Gate::denies('clienti_tipologium_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.clientiTipologia.create');
    }

    public function store(StoreClientiTipologiumRequest $request)
    {
        $clientiTipologium = ClientiTipologium::create($request->all());

        return redirect()->route('admin.clienti-tipologia.index');
    }

    public function edit(ClientiTipologium $clientiTipologium)
    {
        abort_if(Gate::denies('clienti_tipologium_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.clientiTipologia.edit', compact('clientiTipologium'));
    }

    public function update(UpdateClientiTipologiumRequest $request, ClientiTipologium $clientiTipologium)
    {
        $clientiTipologium->update($request->all());

        return redirect()->route('admin.clienti-tipologia.index');
    }

    public function show(ClientiTipologium $clientiTipologium)
    {
        abort_if(Gate::denies('clienti_tipologium_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.clientiTipologia.show', compact('clientiTipologium'));
    }

    public function destroy(ClientiTipologium $clientiTipologium)
    {
        abort_if(Gate::denies('clienti_tipologium_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clientiTipologium->delete();

        return back();
    }

    public function massDestroy(MassDestroyClientiTipologiumRequest $request)
    {
        ClientiTipologium::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
