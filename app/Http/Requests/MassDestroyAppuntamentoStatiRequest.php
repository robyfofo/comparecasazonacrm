<?php

namespace App\Http\Requests;

use App\AppuntamentoStati;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAppuntamentoStatiRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('appuntamento_stati_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:appuntamento_statis,id',
        ];

    }
}
