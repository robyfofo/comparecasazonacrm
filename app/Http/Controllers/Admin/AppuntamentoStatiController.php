<?php

namespace App\Http\Controllers\Admin;

use App\AppuntamentoStati;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAppuntamentoStatiRequest;
use App\Http\Requests\StoreAppuntamentoStatiRequest;
use App\Http\Requests\UpdateAppuntamentoStatiRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AppuntamentoStatiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('appuntamento_stati_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $appuntamentoStatis = AppuntamentoStati::all();

        return view('admin.appuntamentoStatis.index', compact('appuntamentoStatis'));
    }

    public function create()
    {
        abort_if(Gate::denies('appuntamento_stati_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.appuntamentoStatis.create');
    }

    public function store(StoreAppuntamentoStatiRequest $request)
    {
        $appuntamentoStati = AppuntamentoStati::create($request->all());

        return redirect()->route('admin.appuntamento-statis.index');
    }

    public function edit(AppuntamentoStati $appuntamentoStati)
    {
        abort_if(Gate::denies('appuntamento_stati_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.appuntamentoStatis.edit', compact('appuntamentoStati'));
    }

    public function update(UpdateAppuntamentoStatiRequest $request, AppuntamentoStati $appuntamentoStati)
    {
        $appuntamentoStati->update($request->all());

        return redirect()->route('admin.appuntamento-statis.index');
    }

    public function show(AppuntamentoStati $appuntamentoStati)
    {
        abort_if(Gate::denies('appuntamento_stati_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.appuntamentoStatis.show', compact('appuntamentoStati'));
    }

    public function destroy(AppuntamentoStati $appuntamentoStati)
    {
        abort_if(Gate::denies('appuntamento_stati_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $appuntamentoStati->delete();

        return back();
    }

    public function massDestroy(MassDestroyAppuntamentoStatiRequest $request)
    {
        AppuntamentoStati::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
