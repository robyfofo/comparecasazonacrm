<?php

namespace App\Http\Requests;

use App\Fattura;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateFatturaRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('fattura_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'cliente_nome'            => [
                'max:50',
                'required',
            ],
            'cliente_cognome'         => [
                'max:50',
            ],
            'cliente_ragione_sociale' => [
                'max:50',
            ],
            'cliente_codice_fiscale'  => [
                'max:30',
            ],
            'cliente_partita_iva'     => [
                'max:30',
            ],
            'cliente_indirizzo'       => [
                'max:100',
                'required',
            ],
            'filiale_agenzia_nome'    => [
                'max:100',
            ],
            'fattura_numero'          => [
                'max:50',
                'required',
            ],
            'fattura_anno'            => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'data_emissione'          => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
