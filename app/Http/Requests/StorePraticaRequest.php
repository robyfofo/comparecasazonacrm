<?php

namespace App\Http\Requests;

use App\Pratica;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StorePraticaRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('pratica_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'pratica'               => [
                'max:150',
                'required',
            ],
            'tipologia'             => [
                'required',
            ],
            'cliente_id'            => [
                'required',
                'integer',
            ],
            'agente_id'             => [
                'required',
                'integer',
            ],
            'filiale_id'            => [
                'required',
                'integer',
            ],
            'tipologia_immobile_id' => [
                'required',
                'integer',
            ],
            'immobile_id'           => [
                'required',
                'integer',
            ],
            'stato'                 => [
                'required',
            ],
            'contratto_id'          => [
                'required',
                'integer',
            ],
            'spese_condominio'      => [
                'max:100',
            ],
            'data_consegna'         => [
                'max:100',
            ],
            'mandato_inizio'        => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'mandato_fine'          => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'mandato_rinnovo'       => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'inizio_affitto'        => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'scadenza_affitto'      => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'data_vendita'          => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
