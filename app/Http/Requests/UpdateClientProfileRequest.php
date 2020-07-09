<?php

namespace App\Http\Requests;

use App\ClientProfile;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateClientProfileRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('client_profile_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'agente_id'   => [
                'required',
                'integer',
            ],
            'filiale_id'  => [
                'required',
                'integer',
            ],
            'ruolo'       => [
                'max:50',
            ],
            'settore'     => [
                'max:50',
            ],
            'indirizzo'   => [
                'max:80',
            ],
            'civico'      => [
                'max:10',
            ],
            'azienda'     => [
                'max:50',
            ],
            'piva'        => [
                'max:50',
            ],
            'telefono'    => [
                'max:50',
            ],
            'cellulare'   => [
                'max:50',
            ],
            'fax'         => [
                'max:50',
            ],
            'livello'     => [
                'max:50',
            ],
            'birthday'    => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'nazione'     => [
                'max:50',
            ],
            'nome_2'      => [
                'max:50',
            ],
            'cognome_2'   => [
                'max:50',
            ],
            'affinita'    => [
                'max:50',
            ],
            'email_2'     => [
                'max:50',
            ],
            'indirizzo_2' => [
                'max:50',
            ],
            'civico_2'    => [
                'max:10',
            ],
            'cap_2'       => [
                'max:50',
            ],
            'telefono_2'  => [
                'max:50',
            ],
            'cellulare_2' => [
                'max:50',
            ],
            'fax_2'       => [
                'max:20',
            ],
            'stato'       => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
