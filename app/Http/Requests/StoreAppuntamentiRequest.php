<?php

namespace App\Http\Requests;

use App\Appuntamenti;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreAppuntamentiRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('appuntamenti_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'tipologia_id' => [
                'required',
                'integer',
            ],
            'statoapp_id'  => [
                'required',
                'integer',
            ],
            'filiale_id'   => [
                'required',
                'integer',
            ],
            'data_ora'     => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'luogo'        => [
                'max:100',
                'required',
            ],
            'pratica_id'   => [
                'required',
                'integer',
            ],
            'cliente_id'   => [
                'required',
                'integer',
            ],
            'agentes.*'    => [
                'integer',
            ],
            'agentes'      => [
                'required',
                'array',
            ],
            'durata'       => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
