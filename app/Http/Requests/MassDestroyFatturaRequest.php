<?php

namespace App\Http\Requests;

use App\Fattura;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyFatturaRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('fattura_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:fatturas,id',
        ];
    }
}
