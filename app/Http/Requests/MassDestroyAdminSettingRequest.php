<?php

namespace App\Http\Requests;

use App\AdminSetting;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAdminSettingRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('admin_setting_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:admin_settings,id',
        ];
    }
}
