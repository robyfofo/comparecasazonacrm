<?php

namespace App\Http\Requests;

use App\PianoImmobile;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPianoImmobileRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('piano_immobile_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:piano_immobiles,id',
        ];
    }
}
