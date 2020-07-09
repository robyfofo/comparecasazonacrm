<?php

namespace App\Http\Requests;

use App\AppuntamentoTipologie;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAppuntamentoTipologieRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('appuntamento_tipologie_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:appuntamento_tipologies,id',
        ];

    }
}
