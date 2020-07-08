<?php

namespace App\Http\Controllers\Admin;

use App\Comuni;
use App\Filiali;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySecretaryProfileRequest;
use App\Http\Requests\StoreSecretaryProfileRequest;
use App\Http\Requests\UpdateSecretaryProfileRequest;
use App\SecretaryProfile;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SecretaryProfileController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('secretary_profile_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $secretaryProfiles = SecretaryProfile::all();

        return view('admin.secretaryProfiles.index', compact('secretaryProfiles'));
    }

    public function create()
    {
        abort_if(Gate::denies('secretary_profile_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $comunes = Comuni::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $filiales = Filiali::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.secretaryProfiles.create', compact('comunes', 'filiales'));
    }

    public function store(StoreSecretaryProfileRequest $request)
    {
        $secretaryProfile = SecretaryProfile::create($request->all());

        return redirect()->route('admin.secretary-profiles.index');
    }

    public function edit(SecretaryProfile $secretaryProfile)
    {
        abort_if(Gate::denies('secretary_profile_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $comunes = Comuni::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $filiales = Filiali::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $secretaryProfile->load('comune', 'filiale');

        return view('admin.secretaryProfiles.edit', compact('comunes', 'filiales', 'secretaryProfile'));
    }

    public function update(UpdateSecretaryProfileRequest $request, SecretaryProfile $secretaryProfile)
    {
        $secretaryProfile->update($request->all());

        return redirect()->route('admin.secretary-profiles.index');
    }

    public function show(SecretaryProfile $secretaryProfile)
    {
        abort_if(Gate::denies('secretary_profile_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $secretaryProfile->load('comune', 'filiale');

        return view('admin.secretaryProfiles.show', compact('secretaryProfile'));
    }

    public function destroy(SecretaryProfile $secretaryProfile)
    {
        abort_if(Gate::denies('secretary_profile_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $secretaryProfile->delete();

        return back();
    }

    public function massDestroy(MassDestroySecretaryProfileRequest $request)
    {
        SecretaryProfile::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
