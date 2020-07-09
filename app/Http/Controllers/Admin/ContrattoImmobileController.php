<?php

namespace App\Http\Controllers\Admin;

use App\ContrattoImmobile;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyContrattoImmobileRequest;
use App\Http\Requests\StoreContrattoImmobileRequest;
use App\Http\Requests\UpdateContrattoImmobileRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ContrattoImmobileController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('contratto_immobile_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contrattoImmobiles = ContrattoImmobile::all();

        return view('admin.contrattoImmobiles.index', compact('contrattoImmobiles'));
    }

    public function create()
    {
        abort_if(Gate::denies('contratto_immobile_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.contrattoImmobiles.create');
    }

    public function store(StoreContrattoImmobileRequest $request)
    {
        $contrattoImmobile = ContrattoImmobile::create($request->all());

        return redirect()->route('admin.contratto-immobiles.index');
    }

    public function edit(ContrattoImmobile $contrattoImmobile)
    {
        abort_if(Gate::denies('contratto_immobile_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.contrattoImmobiles.edit', compact('contrattoImmobile'));
    }

    public function update(UpdateContrattoImmobileRequest $request, ContrattoImmobile $contrattoImmobile)
    {
        $contrattoImmobile->update($request->all());

        return redirect()->route('admin.contratto-immobiles.index');
    }

    public function show(ContrattoImmobile $contrattoImmobile)
    {
        abort_if(Gate::denies('contratto_immobile_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.contrattoImmobiles.show', compact('contrattoImmobile'));
    }

    public function destroy(ContrattoImmobile $contrattoImmobile)
    {
        abort_if(Gate::denies('contratto_immobile_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contrattoImmobile->delete();

        return back();
    }

    public function massDestroy(MassDestroyContrattoImmobileRequest $request)
    {
        ContrattoImmobile::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
