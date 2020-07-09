<?php

namespace App\Http\Controllers\Admin;

use App\AdminSetting;
use App\Agenzie;
use App\Filiali;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAdminSettingRequest;
use App\Http\Requests\StoreAdminSettingRequest;
use App\Http\Requests\UpdateAdminSettingRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminSettingsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('admin_setting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $adminSettings = AdminSetting::all();

        return view('admin.adminSettings.index', compact('adminSettings'));
    }

    public function create()
    {
        abort_if(Gate::denies('admin_setting_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agenzias = Agenzie::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $filiales = Filiali::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.adminSettings.create', compact('agenzias', 'filiales'));
    }

    public function store(StoreAdminSettingRequest $request)
    {
        $adminSetting = AdminSetting::create($request->all());

        return redirect()->route('admin.admin-settings.index');
    }

    public function edit(AdminSetting $adminSetting)
    {
        abort_if(Gate::denies('admin_setting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agenzias = Agenzie::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $filiales = Filiali::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $adminSetting->load('agenzia', 'filiale');

        return view('admin.adminSettings.edit', compact('agenzias', 'filiales', 'adminSetting'));
    }

    public function update(UpdateAdminSettingRequest $request, AdminSetting $adminSetting)
    {
        $adminSetting->update($request->all());

        return redirect()->route('admin.admin-settings.index');
    }

    public function show(AdminSetting $adminSetting)
    {
        abort_if(Gate::denies('admin_setting_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $adminSetting->load('agenzia', 'filiale');

        return view('admin.adminSettings.show', compact('adminSetting'));
    }

    public function destroy(AdminSetting $adminSetting)
    {
        abort_if(Gate::denies('admin_setting_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $adminSetting->delete();

        return back();
    }

    public function massDestroy(MassDestroyAdminSettingRequest $request)
    {
        AdminSetting::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
