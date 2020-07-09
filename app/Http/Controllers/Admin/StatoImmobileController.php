<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyStatoImmobileRequest;
use App\Http\Requests\StoreStatoImmobileRequest;
use App\Http\Requests\UpdateStatoImmobileRequest;
use App\StatoImmobile;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StatoImmobileController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('stato_immobile_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $statoImmobiles = StatoImmobile::all();

        return view('admin.statoImmobiles.index', compact('statoImmobiles'));
    }

    public function create()
    {
        abort_if(Gate::denies('stato_immobile_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.statoImmobiles.create');
    }

    public function store(StoreStatoImmobileRequest $request)
    {
        $statoImmobile = StatoImmobile::create($request->all());

        return redirect()->route('admin.stato-immobiles.index');
    }

    public function edit(StatoImmobile $statoImmobile)
    {
        abort_if(Gate::denies('stato_immobile_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.statoImmobiles.edit', compact('statoImmobile'));
    }

    public function update(UpdateStatoImmobileRequest $request, StatoImmobile $statoImmobile)
    {
        $statoImmobile->update($request->all());

        return redirect()->route('admin.stato-immobiles.index');
    }

    public function show(StatoImmobile $statoImmobile)
    {
        abort_if(Gate::denies('stato_immobile_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.statoImmobiles.show', compact('statoImmobile'));
    }

    public function destroy(StatoImmobile $statoImmobile)
    {
        abort_if(Gate::denies('stato_immobile_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $statoImmobile->delete();

        return back();
    }

    public function massDestroy(MassDestroyStatoImmobileRequest $request)
    {
        StatoImmobile::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
