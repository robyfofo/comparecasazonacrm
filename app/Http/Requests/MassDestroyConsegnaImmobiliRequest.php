<?php

namespace App\Http\Requests;

use App\ConsegnaImmobili;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyConsegnaImmobiliRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('consegna_immobili_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:consegna_immobilis,id',
        ];

    }
}
