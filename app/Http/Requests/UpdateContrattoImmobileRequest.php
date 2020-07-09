<?php

namespace App\Http\Requests;

use App\ContrattoImmobile;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateContrattoImmobileRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('contratto_immobile_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    public function rules()
    {
        return [
            'contratto' => [
                'max:100',
                'required'],
        ];

    }
}
