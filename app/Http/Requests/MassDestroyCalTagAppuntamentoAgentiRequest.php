<?php

namespace App\Http\Requests;

use App\CalTagAppuntamentoAgenti;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCalTagAppuntamentoAgentiRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('cal_tag_appuntamento_agenti_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:cal_tag_appuntamento_agentis,id',
        ];

    }
}
