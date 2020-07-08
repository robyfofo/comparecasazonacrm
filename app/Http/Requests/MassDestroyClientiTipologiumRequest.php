<?php

namespace App\Http\Requests;

use App\ClientiTipologium;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyClientiTipologiumRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('clienti_tipologium_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:clienti_tipologia,id',
        ];
    }
}
