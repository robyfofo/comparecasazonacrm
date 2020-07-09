<?php

namespace App\Http\Requests;

use App\TipologiaImmobili;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateTipologiaImmobiliRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('tipologia_immobili_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    public function rules()
    {
        return [
            'insieme' => [
                'max:20'],
            'nome'    => [
                'max:50',
                'required'],
        ];

    }
}
