<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePianoImmobileRequest;
use App\Http\Requests\UpdatePianoImmobileRequest;
use App\Http\Resources\Admin\PianoImmobileResource;
use App\PianoImmobile;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PianoImmobileApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('piano_immobile_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PianoImmobileResource(PianoImmobile::all());
    }

    public function store(StorePianoImmobileRequest $request)
    {
        $pianoImmobile = PianoImmobile::create($request->all());

        return (new PianoImmobileResource($pianoImmobile))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(PianoImmobile $pianoImmobile)
    {
        abort_if(Gate::denies('piano_immobile_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PianoImmobileResource($pianoImmobile);
    }

    public function update(UpdatePianoImmobileRequest $request, PianoImmobile $pianoImmobile)
    {
        $pianoImmobile->update($request->all());

        return (new PianoImmobileResource($pianoImmobile))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(PianoImmobile $pianoImmobile)
    {
        abort_if(Gate::denies('piano_immobile_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pianoImmobile->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
