<?php

namespace App\Http\Requests;

use App\UserAlert;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateUserAlertRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('user_alert_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'alert_text'      => [
                'required',
            ],
            'users.*'         => [
                'integer',
            ],
            'users'           => [
                'array',
            ],
            'scadenza_evento' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
        ];
    }
}
