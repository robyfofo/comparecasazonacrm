<?php

namespace App\Http\Requests;

use App\Appuntamenti;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAppuntamentiRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('appuntamenti_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:appuntamentis,id',
        ];
    }
}
