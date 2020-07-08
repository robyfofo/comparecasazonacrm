<?php

namespace App\Http\Requests;

use App\Richiestum;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyRichiestumRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('richiestum_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:richiesta,id',
        ];

    }
}
