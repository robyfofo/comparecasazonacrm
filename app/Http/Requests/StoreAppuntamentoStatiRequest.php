<?php

namespace App\Http\Requests;

use App\AppuntamentoStati;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreAppuntamentoStatiRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('appuntamento_stati_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    public function rules()
    {
        return [
            'nome' => [
                'max:100',
                'required'],
        ];

    }
}
