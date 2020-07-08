<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPianoImmobileRequest;
use App\Http\Requests\StorePianoImmobileRequest;
use App\Http\Requests\UpdatePianoImmobileRequest;
use App\PianoImmobile;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PianoImmobileController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('piano_immobile_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pianoImmobiles = PianoImmobile::all();

        return view('admin.pianoImmobiles.index', compact('pianoImmobiles'));
    }

    public function create()
    {
        abort_if(Gate::denies('piano_immobile_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pianoImmobiles.create');
    }

    public function store(StorePianoImmobileRequest $request)
    {
        $pianoImmobile = PianoImmobile::create($request->all());

        return redirect()->route('admin.piano-immobiles.index');
    }

    public function edit(PianoImmobile $pianoImmobile)
    {
        abort_if(Gate::denies('piano_immobile_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pianoImmobiles.edit', compact('pianoImmobile'));
    }

    public function update(UpdatePianoImmobileRequest $request, PianoImmobile $pianoImmobile)
    {
        $pianoImmobile->update($request->all());

        return redirect()->route('admin.piano-immobiles.index');
    }

    public function show(PianoImmobile $pianoImmobile)
    {
        abort_if(Gate::denies('piano_immobile_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pianoImmobiles.show', compact('pianoImmobile'));
    }

    public function destroy(PianoImmobile $pianoImmobile)
    {
        abort_if(Gate::denies('piano_immobile_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pianoImmobile->delete();

        return back();
    }

    public function massDestroy(MassDestroyPianoImmobileRequest $request)
    {
        PianoImmobile::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
