<?php

namespace App\Http\Controllers\Admin;

use App\ConsegnaImmobili;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyConsegnaImmobiliRequest;
use App\Http\Requests\StoreConsegnaImmobiliRequest;
use App\Http\Requests\UpdateConsegnaImmobiliRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ConsegnaImmobiliController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('consegna_immobili_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $consegnaImmobilis = ConsegnaImmobili::all();

        return view('admin.consegnaImmobilis.index', compact('consegnaImmobilis'));
    }

    public function create()
    {
        abort_if(Gate::denies('consegna_immobili_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.consegnaImmobilis.create');
    }

    public function store(StoreConsegnaImmobiliRequest $request)
    {
        $consegnaImmobili = ConsegnaImmobili::create($request->all());

        return redirect()->route('admin.consegna-immobilis.index');
    }

    public function edit(ConsegnaImmobili $consegnaImmobili)
    {
        abort_if(Gate::denies('consegna_immobili_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.consegnaImmobilis.edit', compact('consegnaImmobili'));
    }

    public function update(UpdateConsegnaImmobiliRequest $request, ConsegnaImmobili $consegnaImmobili)
    {
        $consegnaImmobili->update($request->all());

        return redirect()->route('admin.consegna-immobilis.index');
    }

    public function show(ConsegnaImmobili $consegnaImmobili)
    {
        abort_if(Gate::denies('consegna_immobili_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.consegnaImmobilis.show', compact('consegnaImmobili'));
    }

    public function destroy(ConsegnaImmobili $consegnaImmobili)
    {
        abort_if(Gate::denies('consegna_immobili_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $consegnaImmobili->delete();

        return back();
    }

    public function massDestroy(MassDestroyConsegnaImmobiliRequest $request)
    {
        ConsegnaImmobili::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
