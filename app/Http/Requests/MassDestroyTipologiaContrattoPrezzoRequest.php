<?php

namespace App\Http\Requests;

use App\TipologiaContrattoPrezzo;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTipologiaContrattoPrezzoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('tipologia_contratto_prezzo_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:tipologia_contratto_prezzos,id',
        ];

    }
}
