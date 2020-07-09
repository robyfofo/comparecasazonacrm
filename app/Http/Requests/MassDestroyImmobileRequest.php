<?php

namespace App\Http\Requests;

use App\Immobile;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyImmobileRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('immobile_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:immobiles,id',
        ];

    }
}
