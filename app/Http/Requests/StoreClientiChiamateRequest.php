<?php

namespace App\Http\Requests;

use App\ClientiChiamate;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreClientiChiamateRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('clienti_chiamate_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'data_ora'      => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'agente_id'     => [
                'required',
                'integer',
            ],
            'testo'         => [
                'required',
            ],
            'stato'         => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'direzione'     => [
                'required',
            ],
            'nome'          => [
                'max:50',
            ],
            'cognome'       => [
                'max:50',
            ],
            'telefono'      => [
                'max:50',
            ],
            'cellulare'     => [
                'max:50',
            ],
            'email'         => [
                'max:50',
            ],
            'data_risposta' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
