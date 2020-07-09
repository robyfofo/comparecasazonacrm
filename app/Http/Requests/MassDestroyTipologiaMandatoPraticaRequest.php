<?php

namespace App\Http\Requests;

use App\TipologiaMandatoPratica;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTipologiaMandatoPraticaRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('tipologia_mandato_pratica_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:tipologia_mandato_praticas,id',
        ];

    }
}
