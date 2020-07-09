<?php

namespace App\Http\Requests;

use App\ContrattoImmobile;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyContrattoImmobileRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('contratto_immobile_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:contratto_immobiles,id',
        ];

    }
}
