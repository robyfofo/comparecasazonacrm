<?php

namespace App\Http\Requests;

use App\GarageImmobile;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyGarageImmobileRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('garage_immobile_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:garage_immobiles,id',
        ];

    }
}
