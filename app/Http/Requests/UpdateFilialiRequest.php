<?php

namespace App\Http\Requests;

use App\Filiali;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateFilialiRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('filiali_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'agenzia_id'      => [
                'required',
                'integer',
            ],
            'nome'            => [
                'max:100',
                'required',
            ],
            'comune_id'       => [
                'required',
                'integer',
            ],
            'indirizzo'       => [
                'max:100',
            ],
            'cap'             => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'telefono'        => [
                'max:50',
            ],
            'fax'             => [
                'max:50',
            ],
            'cellulare'       => [
                'max:50',
            ],
            'web'             => [
                'max:100',
            ],
            'codice_fiscale'  => [
                'max:50',
            ],
            'partita_iva'     => [
                'max:50',
            ],
            'ccia_numero_rea' => [
                'max:50',
            ],
        ];
    }
}
