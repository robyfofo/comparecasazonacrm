<?php

namespace App\Http\Controllers\Admin;

use App\GarageImmobile;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyGarageImmobileRequest;
use App\Http\Requests\StoreGarageImmobileRequest;
use App\Http\Requests\UpdateGarageImmobileRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GarageImmobileController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('garage_immobile_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $garageImmobiles = GarageImmobile::all();

        return view('admin.garageImmobiles.index', compact('garageImmobiles'));
    }

    public function create()
    {
        abort_if(Gate::denies('garage_immobile_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.garageImmobiles.create');
    }

    public function store(StoreGarageImmobileRequest $request)
    {
        $garageImmobile = GarageImmobile::create($request->all());

        return redirect()->route('admin.garage-immobiles.index');

    }

    public function edit(GarageImmobile $garageImmobile)
    {
        abort_if(Gate::denies('garage_immobile_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.garageImmobiles.edit', compact('garageImmobile'));
    }

    public function update(UpdateGarageImmobileRequest $request, GarageImmobile $garageImmobile)
    {
        $garageImmobile->update($request->all());

        return redirect()->route('admin.garage-immobiles.index');

    }

    public function show(GarageImmobile $garageImmobile)
    {
        abort_if(Gate::denies('garage_immobile_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.garageImmobiles.show', compact('garageImmobile'));
    }

    public function destroy(GarageImmobile $garageImmobile)
    {
        abort_if(Gate::denies('garage_immobile_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $garageImmobile->delete();

        return back();

    }

    public function massDestroy(MassDestroyGarageImmobileRequest $request)
    {
        GarageImmobile::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }
}
