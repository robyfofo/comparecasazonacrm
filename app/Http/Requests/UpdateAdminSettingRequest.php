<?php

namespace App\Http\Requests;

use App\AdminSetting;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateAdminSettingRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('admin_setting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'alert_pratica_scadenza_incarico'    => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'alert_pratica_scadenza_incarico_on' => [
                'required',
            ],
            'alert_appuntamento'                 => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'agenzia_id'                         => [
                'required',
                'integer',
            ],
            'alert_pratica_scadenza_affitto'     => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'obiettivo_venduto'                  => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'alert_richiamata_cliente'           => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
