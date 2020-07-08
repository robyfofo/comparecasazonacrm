<?php

namespace App\Http\Controllers\Admin;

use App\Comuni;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyComuniRequest;
use App\Http\Requests\StoreComuniRequest;
use App\Http\Requests\UpdateComuniRequest;
use App\Province;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ComuniController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('comuni_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $comunis = Comuni::all();

        return view('admin.comunis.index', compact('comunis'));
    }

    public function create()
    {
        abort_if(Gate::denies('comuni_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $provs = Province::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.comunis.create', compact('provs'));
    }

    public function store(StoreComuniRequest $request)
    {
        $comuni = Comuni::create($request->all());

        return redirect()->route('admin.comunis.index');
    }

    public function edit(Comuni $comuni)
    {
        abort_if(Gate::denies('comuni_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $provs = Province::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $comuni->load('prov');

        return view('admin.comunis.edit', compact('provs', 'comuni'));
    }

    public function update(UpdateComuniRequest $request, Comuni $comuni)
    {
        $comuni->update($request->all());

        return redirect()->route('admin.comunis.index');
    }

    public function show(Comuni $comuni)
    {
        abort_if(Gate::denies('comuni_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $comuni->load('prov');

        return view('admin.comunis.show', compact('comuni'));
    }

    public function destroy(Comuni $comuni)
    {
        abort_if(Gate::denies('comuni_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $comuni->delete();

        return back();
    }

    public function massDestroy(MassDestroyComuniRequest $request)
    {
        Comuni::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
