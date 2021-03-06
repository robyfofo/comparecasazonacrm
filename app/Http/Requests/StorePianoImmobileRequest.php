<?php

namespace App\Http\Requests;

use App\PianoImmobile;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StorePianoImmobileRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('piano_immobile_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'piano' => [
                'max:50',
                'required'],
        ];
    }
}
