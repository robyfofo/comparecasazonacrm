<?php

namespace App\Http\Controllers\Admin;

use App\Agenzie;
use App\Comuni;
use App\Filiali;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyFilialiRequest;
use App\Http\Requests\StoreFilialiRequest;
use App\Http\Requests\UpdateFilialiRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FilialiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('filiali_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $filialis = Filiali::all();

        return view('admin.filialis.index', compact('filialis'));
    }

    public function create()
    {
        abort_if(Gate::denies('filiali_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agenzias = Agenzie::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $comunes = Comuni::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.filialis.create', compact('agenzias', 'comunes'));
    }

    public function store(StoreFilialiRequest $request)
    {
        $filiali = Filiali::create($request->all());

        return redirect()->route('admin.filialis.index');
    }

    public function edit(Filiali $filiali)
    {
        abort_if(Gate::denies('filiali_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agenzias = Agenzie::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $comunes = Comuni::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $filiali->load('agenzia', 'comune');

        return view('admin.filialis.edit', compact('agenzias', 'comunes', 'filiali'));
    }

    public function update(UpdateFilialiRequest $request, Filiali $filiali)
    {
        $filiali->update($request->all());

        return redirect()->route('admin.filialis.index');
    }

    public function show(Filiali $filiali)
    {
        abort_if(Gate::denies('filiali_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $filiali->load('agenzia', 'comune');

        return view('admin.filialis.show', compact('filiali'));
    }

    public function destroy(Filiali $filiali)
    {
        abort_if(Gate::denies('filiali_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $filiali->delete();

        return back();
    }

    public function massDestroy(MassDestroyFilialiRequest $request)
    {
        Filiali::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
