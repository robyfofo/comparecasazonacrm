<?php

namespace App\Http\Requests;

use App\SecretaryProfile;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreSecretaryProfileRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('secretary_profile_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'nome'             => [
                'required',
            ],
            'cap'              => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'lunedi_inizio'    => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
            'lunedi_fine'      => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
            'martedi_inizio'   => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
            'martedi_fine'     => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
            'mercoledi_inizio' => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
            'mercoledi_fine'   => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
            'giovedi_inizio'   => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
            'giovedi_fine'     => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
            'venerdi_inizio'   => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
            'venerdi_fine'     => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
            'sabato_inizio'    => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
            'sabato_fine'      => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
            'domenica_inizio'  => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
            'domenica_fine'    => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
        ];
    }
}
