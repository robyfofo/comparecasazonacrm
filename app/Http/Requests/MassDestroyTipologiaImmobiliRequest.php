<?php

namespace App\Http\Requests;

use App\TipologiaImmobili;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTipologiaImmobiliRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('tipologia_immobili_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:tipologia_immobilis,id',
        ];

    }
}
