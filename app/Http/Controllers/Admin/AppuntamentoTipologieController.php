<?php

namespace App\Http\Controllers\Admin;

use App\AppuntamentoTipologie;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAppuntamentoTipologieRequest;
use App\Http\Requests\StoreAppuntamentoTipologieRequest;
use App\Http\Requests\UpdateAppuntamentoTipologieRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AppuntamentoTipologieController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('appuntamento_tipologie_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $appuntamentoTipologies = AppuntamentoTipologie::all();

        return view('admin.appuntamentoTipologies.index', compact('appuntamentoTipologies'));
    }

    public function create()
    {
        abort_if(Gate::denies('appuntamento_tipologie_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.appuntamentoTipologies.create');
    }

    public function store(StoreAppuntamentoTipologieRequest $request)
    {
        $appuntamentoTipologie = AppuntamentoTipologie::create($request->all());

        return redirect()->route('admin.appuntamento-tipologies.index');
    }

    public function edit(AppuntamentoTipologie $appuntamentoTipologie)
    {
        abort_if(Gate::denies('appuntamento_tipologie_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.appuntamentoTipologies.edit', compact('appuntamentoTipologie'));
    }

    public function update(UpdateAppuntamentoTipologieRequest $request, AppuntamentoTipologie $appuntamentoTipologie)
    {
        $appuntamentoTipologie->update($request->all());

        return redirect()->route('admin.appuntamento-tipologies.index');
    }

    public function show(AppuntamentoTipologie $appuntamentoTipologie)
    {
        abort_if(Gate::denies('appuntamento_tipologie_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.appuntamentoTipologies.show', compact('appuntamentoTipologie'));
    }

    public function destroy(AppuntamentoTipologie $appuntamentoTipologie)
    {
        abort_if(Gate::denies('appuntamento_tipologie_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $appuntamentoTipologie->delete();

        return back();
    }

    public function massDestroy(MassDestroyAppuntamentoTipologieRequest $request)
    {
        AppuntamentoTipologie::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
